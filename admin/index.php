<?php include('theme-parts/header.php') ?>

<form id="blogaddform" method="post">
    <input type="text" name="blog_title" placeholder="Title">
    <input type="file" name="blog_image">
    <textarea name="description" placeholder="Your message"></textarea>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
date_default_timezone_set('Asia/Kathmandu');
if(isset($_POST['submit'])){
    $posttitle = $_POST['blog_title'];
    $postdescription = $_POST['description'];
    $publishedtime = date("Y-m-d h:i:sa");

}
?>

<?php include('theme-parts/footer.php') ?>