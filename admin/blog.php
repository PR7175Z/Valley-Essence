<?php 
include('theme-parts/header.php');
$message='';
if ( isset( $_SESSION['message'] ) ) {
    $message = $_SESSION['message'];
    kill_session();
}
$blogs = get_blogs($conn);
if($blogs){
?>
<section class="bloglisting">
    <div class="container">
        <?php if($message){ ?>
        <div class="output-report-message">
            <p><?php echo $message; ?></p>
        </div>
        <?php }?>
        <div class="blog-list">
            <ul>
                <?php //print_r($blogs); ?>
                <?php foreach($blogs as $blog){?>
                <li><a href="/phpsite/blogsite/admin/editblog.php?id=<?php echo $blog['id']; ?>"><?php echo $blog['title']; ?></a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</section>
<?php }?>

<?php include('theme-parts/footer.php') ?>