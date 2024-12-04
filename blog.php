<?php include('theme-parts/header.php') ?>

<?php
$sql = "SELECT * FROM blog'";
?>

<section class="innerBanner-section">
    <div class="container">
        <div class="main-title">
            <h1>Blogs</h1>
        </div>
    </div>
</section>

<section class="blog-listing section-gaps">
    <div class="container">
        <div class="blog-listing">
            <div class="row gy-4">
                <div class="col-3">
                    <div class="blog-item">
                        <div class="img-holder">
                            <a href="#"><img src="" alt="img"></a>
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
                            <a href="#" class="read-more-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('theme-parts/footer.php') ?>