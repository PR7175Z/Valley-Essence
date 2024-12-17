<?php 
$url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
parse_str($parts['query'], $query);
$blog_id =  $query['id'];

if(!$blog_id){
    header("Location: http://localhost/phpsite/blogsite/blog.php");
    exit;
}

include('theme-parts/header.php');
$message='';
if ( isset( $_SESSION['message'] ) ) {
    $message = $_SESSION['message'];
    kill_session();
}
$current_blog = get_blogs($conn, $blog_id)[0];
if($current_blog){
?>
<section class="edit-blog">
    <div class="container">
        <?php if($message){ ?>
        <div class="output-report-message">
            <p>
                <?php echo $message; ?>
            </p>
        </div>
        <?php }?>
        <form id="blogeditform" method="post">
            <div class="dashboard-blog-layout row">
                <div class="main-column col-8">
                    <div class="post-title">
                        <input type="text" name="blog_title" placeholder="Title"
                            value="<?php echo $current_blog['title'];?>">
                        <div class="status-field">
                            <select id="blog-stauts">
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Reject">Reject</option>
                            </select>
                        </div>
                    </div>
                    <div class="post-content">
                        <div id="editor" style="height: 300px;"></div>
                        <input type="hidden" name="editorContent" id="editorContent"
                            value="<?php echo $current_blog['content']; ?>">
                    </div>
                    <div class="post-category">
                        <?php 
                        $categories = get_category($conn);

                        $currentcats = explode(',',$current_blog['cat_id']);
                        if($categories){ ?>
                        <div>
                            <label>Categories</label>
                            <?php $i=0; foreach($categories as $cat){ $i++; ?>
                            <div>
                                <input type="checkbox" id="type<?php echo $i; ?>" name="category[]"
                                    value="<?php echo $cat['id']; ?>" <?php echo (in_array($cat['id'],
                                    $currentcats))? 'checked' : '' ; ?> />
                                <label for="type<?php echo $i; ?>">
                                    <?php echo $cat['name']; ?>
                                </label>
                            </div>
                            <?php }?>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <div class="side-column col-4">

                    <div class="post-publish">
                        <input type="submit" name="submit" value="Submit">

                    </div>
                    <div class="post-image">
                        <div class="form-field blog-image">
                            <label class="blog-featured-img" for="blogimg">
                                Featured image
                                <input type="file" style="visibility: hidden;" name="blogimg" id="blogimg" accept="image/*">
                                <img src="<?php if($current_blog['image']){ echo $current_blog['image']; }else{ ?>http://matters.cloud392.com/wp-content/uploads/2024/06/camera-icon.png<?php }?>"
                                    id="fimg" alt="img">
                            </label>
                            <button id="removeimg">Remove Image</button>
                            <textarea name="blogimgblob" id="blogimgblob" class="d-none"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php }?>

<?php
date_default_timezone_set('Asia/Kathmandu');
if(isset($_POST['submit'])){
    $userid = $_SESSION['user_id'];
    $posttitle = $_POST['blog_title'];
    $postdescription = $_POST['description'];
    $publishedtime = date("Y-m-d h:i:sa");
    $featuredimg = $_POST['blogimgblob'];

    $selectedCategories = $_POST['category'];
    $cat_array = [];
    if($selectedCategories){
        foreach ($selectedCategories as $categoryId) {
            array_push($cat_array, $categoryId);
        }
    }
    $catids = implode(', ', $cat_array);

    $insert_query = "INSERT INTO `blog`(`title`, `content`, `image`, `published_date`, `uid`, `cat_id`) VALUES ('$posttitle', '$postdescription', '$featuredimg','$publishedtime','$userid', '$catids')";
    $result = mysqli_query($conn, $insert_query);

    if( mysqli_affected_rows($conn)){
        $msg = "<div class='success'>Blog edited successfully.</div>";
        session_message($msg);
    }else{
        $msg = "<div class='error'>Blog editition failed</div>";
        session_message($msg);
    }
}
?>

<?php include('theme-parts/footer.php') ?>