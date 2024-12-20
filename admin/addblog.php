<?php include('theme-parts/header.php');
$message='';
if ( isset( $_SESSION['message'] ) ) {
    $message = $_SESSION['message'];
    kill_session();
}
?>
<section class="add-blog">
    <h2 class="mb-4">Add New Blog</h2>
    <?php if($message){ ?>
    <div class="output-report-message">
        <p>
            <?php echo $message; ?>
        </p>
    </div>
    <?php }?>
    <form id="blogaddform" method="post">
        <div class="dashboard-blog-layout row">
            <div class="main-column col-8">
                <div class="post-title">
                    <input type="text" name="blog_title" placeholder="Title">
                </div>
                <div class="post-content">
                    <div id="editor" style="height: 300px;"></div>
                    <textarea name="description" name="editorContent" id="editorContent" placeholder="Your message"></textarea>
                </div>
                <div class="post-category">
                    <?php 
                    $categories = get_category($conn);
                    if($categories){ ?>
                    <div>
                        <label>Categories</label>
                        <?php $i=0; foreach($categories as $cat){ $i++; ?>
                        <div>
                            <input type="checkbox" id="type<?php echo $i; ?>" name="category[]" value="<?php echo $cat['id']; ?>" />
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
                            <img src="http://matters.cloud392.com/wp-content/uploads/2024/06/camera-icon.png" id="fimg" alt="img">
                        </label>
                        <button id="removeimg">Remove Image</button>
                    </div>
                    <textarea name="blogimgblob" id="blogimgblob" class="d-none"></textarea>
                </div>
            </div>
        </div>
        
        
        
        
    </form>
</section>

<?php
date_default_timezone_set('Asia/Kathmandu');

if (isset($_POST['submit'])) {
    $userid = $_SESSION['user_id'];
    $posttitle = $_POST['blog_title'];
    $postdescription = $_POST['description'];
    $publishedtime = date("Y-m-d h:i:sa");
    $featuredimg = $_POST['blogimgblob'];

    $selectedCategories = $_POST['category'];
    $status = ($userrole == 1) ? 1 : 0;
    $cat_array = [];
    if ($selectedCategories) {
        foreach ($selectedCategories as $categoryId) {
            array_push($cat_array, $categoryId);
        }
    }
    $catids = implode(', ', $cat_array);

    // Use prepared statement to insert blog
    $stmt = $conn->prepare(
        "INSERT INTO `blog`(`title`, `content`, `image`, `published_date`, `uid`, `cat_id`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("sssssi", $posttitle, $postdescription, $featuredimg, $publishedtime, $userid, $catids, $status);

    if ($stmt->execute()) {
        $msg = "<div class='success'>Blog added successfully.</div>";
        session_message($msg);
    } else {
        $msg = "<div class='error'>Blog addition failed: " . $stmt->error . "</div>";
        session_message($msg);
    }

    $stmt->close();
}
?>

<?php include('theme-parts/footer.php') ?>