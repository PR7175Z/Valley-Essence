<?php
function get_blogs($conn) {
    $sql = "SELECT * FROM blog";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $blogs = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $blogs[] = $row; // Add each row to the blogs array
        }
        return $blogs; // Return the array of blogs
    } else {
        // Return an error message or handle the error
        return 'Query failed: ' . mysqli_error($conn);
    }
}

function get_category($conn) {
    $sql = "SELECT * FROM category";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $categories = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $categories[] = $row; // Add each row to the categories array
        }
        return $categories; // Return the array of blogs
    } else {
        // Return an error message or handle the error
        return 'Query failed: ' . mysqli_error($conn);
    }
}

function session_message($message){
    $_SESSION['message'] = $message;
    $_SESSION['message_creation_time'] = time();
}

function kill_session(){
    if (time() - intval($_SESSION['message_creation_time']) > 2) {
        unset($_SESSION['message']);
    }
}

function test(){
    echo 'test';
}