<?php include('theme-parts/header.php');
$url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
parse_str($parts['query'], $query);
$blog_id =  $query['id'];
$blog = get_blogs($conn, $blog_id)[0];

$comments = get_blog_comments($conn, $blog_id, 1);

$message = '';

if ( isset( $_SESSION['message'] ) ) {
    $message = $_SESSION['message'];
    kill_session();
}

date_default_timezone_set('Asia/Kathmandu');

if (isset($_POST['submit'])) {
    $userid = $_SESSION['user_id'];
    $cmt = $_POST['comment'];
    $publishedtime = date("Y-m-d h:i:sa");
    $status = ($userrole == 1) ? 1 : 0;
    $blogid = $blog_id;
    $stmt = $conn->prepare(
        "INSERT INTO `comments`(`comment`, `authorid`, `status`, `published_date`, `blogid`) VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("siisi", $cmt, $userid, $status, $publishedtime, $blogid);

    if ($stmt->execute()) {
        $msg = "<div class='success'>Comment added successfully.</div>";
        session_message($msg);
    } else {
        $msg = "<div class='error'>Comment addition failed: " . $stmt->error . "</div>";
        session_message($msg);
    }

    $stmt->close();
}
?>

<section class="innerBanner-section">
    <div class="container">
        <div class="main-title">
            <h1><?php echo $blog['title']; ?></h1>
        </div>
        <div class="breadcrumbs">
            <a href="<?php echo SITEURL; ?>">Home</a> / <a href="<?php echo SITEURL . 'blog.php'; ?>">Blog</a> / <span><?php echo $blog['title']; ?></span>
        </div>
    </div>
</section>

<section class="blog-single">
    <div class="container">
        <div class="main-title">
            <h2><?php echo $blog['title']; ?></h2>
        </div>
        <div class="feature-img">
            <img src="<?php echo $blog['image'] ?>" alt="<?php echo $blog['title']; ?> image">
        </div>
        <div class="text-wrapper">
            <div class="content">
                <?php echo $blog['content']; ?>
            </div>
        </div>
        <div class="comments-section">
            <?php if($userrole){
            echo $message; ?>
            <h3>Leave a Comment</h3>
            <form class="comment-form" method="post">
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea id="comment" name="comment" rows="4" placeholder="Write your comment here..."
                        required></textarea>
                </div>
                <button type="submit" name="submit" class="submit-btn">Submit Comment</button>
            </form>
            <?php }?>

            <div class="comments-list">
                <h4>Comments</h4>
                <?php if($comments){
                    foreach($comments as $cmt){
                    $author = get_user($conn, $cmt['authorid'])[0];?>
                    <div class="comment">
                        <div class="comment-img">
                            <img src="" alt="">
                        </div>
                        <p><strong><?php echo $author['first_name'] . ' '. $author['last_name']; ?></strong> <span>on <?php echo changedateformat($cmt['published_date'], 'M d, Y' ); ?></span></p>
                        <p><?php echo $cmt['comment']; ?></p>
                    </div>
                <?php } }else{ ?>
                <div>
                    <p>No Comments</p>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>
<?php include('theme-parts/footer.php') ?>