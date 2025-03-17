<?php
function get_records_count($table_name, $link) {
    $query = "SELECT COUNT(id) AS number from $table_name";
    $query_result = mysqli_query($link, $query);

    if ($query_result) {
        $row = mysqli_fetch_array($query_result);
        return $row['number'];
    } else {
        echo '<script>console.log("Помилка запиту на отримання кількості записів")</script>';
    }
}

function get_records_for_last_month($table_name, $link) {
    $date_arr = getdate();
    $start_date = date("Y-m-d", mktime(0, 0, 0, $date_arr['mon'] - 1, $date_arr['mday'], $date_arr['year']));
    $end_date = date("Y-m-d", mktime(0, 0, 0, $date_arr['mon'], $date_arr['mday'], $date_arr['year']));

    $query = "SELECT COUNT(id) AS number from $table_name WHERE sent_date BETWEEN '$start_date' AND '$end_date'";
    $query_result = mysqli_query($link, $query);

    if ($query_result) {
        $row = mysqli_fetch_array($query_result);
        return $row['number'];
    } else {
        echo '<script>console.log("Помилка запиту на отримання кількості записів")</script>';
    }
}

function get_last_record($table_name, $link)
{
    $query = "SELECT * FROM $table_name ORDER BY id DESC LIMIT 1";
    $query_result = mysqli_query($link, $query);

    return mysqli_fetch_assoc($query_result);
}

function get_most_popular_record($table_name, $link)
{
    $first_query = "SELECT emails.id, emails.subject, emails.content, emails.sent_date
            FROM emails
            JOIN subscribers ON subscribers.email_id = emails.id
            GROUP BY emails.id
            ORDER BY COUNT(subscribers.email_id) DESC
            LIMIT 1;";
    $query_result = mysqli_query($link, $first_query);

    return mysqli_fetch_assoc($query_result);
}

function db_find_by_keyword($keyword, $link) {
    $query = "SELECT * FROM emails WHERE subject LIKE '%$keyword%' or content LIKE '%$keyword%'";
    return mysqli_query($link, $query);
}

function db_find_by_pattern($pattern, $link) {
    $query = "SELECT * FROM emails WHERE subject REGEXP '$pattern' or content REGEXP '%$pattern%'";
    return mysqli_query($link, $query);
}

function db_find_by_diapason($diapason, $link) {
    $diapason_array = explode(",", $diapason);
    $query = "SELECT * FROM emails WHERE sent_date BETWEEN '$diapason_array[0]' AND '$diapason_array[1]'";
    return mysqli_query($link, $query);
}

function db_find($search_type, $options, $link) {
    if($search_type == "key"){
        return db_find_by_keyword($options, $link);
    }
    else if ($search_type == "pattern"){
        return db_find_by_pattern($options, $link);
    }
    else if ($search_type == "diapason"){
        return db_find_by_diapason($options, $link);
    }
}