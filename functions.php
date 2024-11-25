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