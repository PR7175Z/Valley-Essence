<?php include('theme-parts/header.php') ?>

<?php
$blogs = get_blogs($conn);
?>

<section class="innerBanner-section">
    <div class="container">
        <div class="main-title">
            <h1>Blogs</h1>
        </div>
    </div>
</section>

<?php if($blogs){ ?>
<section class="blog-listing section-gaps">
    <div class="container">
        <div class="blog-listing">
            <div class="row gy-4">
                <?php foreach($blogs as $blog){ ?>
                <div class="col-3">
                    <div class="blog-item">
                        <div class="img-holder">
                            <a href="#"><img src="./Valley_Essence/images/bhaktapur.jpg" alt="img"></a>
                        </div>
                        <div class="blog-content">
                            <h3>
                                <a href="#">
                                    <?php echo $blog['title']; ?>
                                </a>
                            </h3>
                            <p>
                                <?php echo $blog['content']; ?>
                            </p>
                            <p?>Author: <?php echo $blog['uid']; ?></p>
                            <a href="#" class="read-more-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>
<?php }?>

<?php include('theme-parts/footer.php') ?>