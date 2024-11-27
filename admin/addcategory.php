<?php include('theme-parts/header.php');
if(isset($_SESSION['message'])){
    echo '<div>' . $_SESSION['message'] . '</div>';
}?>
<section class="add-category">
    <div class="container">
        <form id="categoryaddform" method="post">
            <input type="text" name="category_title" placeholder="Title">
            <div class="form-field category-image">
            <label class="category-featured-img" for="categoryimg">
                Featured image 
                <input type="file" style="visibility: hidden;" name="categoryimg" id="categoryimg" accept="image/*">
                <img src="http://matters.cloud392.com/wp-content/uploads/2024/06/camera-icon.png" id="fimg" alt="img">
            </label>
            <button id="removeimg">Remove Image</button>
            </div>
            <textarea name="categoryimgblob" id="categoryimgblob" class="d-none"></textarea>
            <textarea name="description" placeholder="Your message"></textarea>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</section>

<?php
date_default_timezone_set('Asia/Kathmandu');
if(isset($_POST['submit'])){
    $cattitle = $_POST['category_title'];
    $catdescription = $_POST['description'];
    $publishedtime = date("Y-m-d h:i:sa");
    $featuredimg = $_POST['categoryimgblob'];

    $insert_query = "INSERT INTO `category`(`name`, `description`, `image`, `published_date`) VALUES ('$cattitle', '$catdescription', '$featuredimg','$publishedtime')";
    $result = mysqli_query($conn, $insert_query);

    if( mysqli_affected_rows($conn)){
        $_SESSION['message'] = "<div class='success'>Category added successfully.</div>";
        $_SESSION['message_creation_time'] = time();
    }else{
        $_SESSION['login'] = "<div class='error'>Category addition failed</div>";
    }
}
?>

<?php include('theme-parts/footer.php') ?>