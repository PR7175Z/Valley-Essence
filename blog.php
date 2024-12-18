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
        <div class="blog-page-layout isotope-wrapper">
            <div class="filter-section">
                <div class="category-filter isotope-tabs">
                    <button class="isotope-tab-btn" data-filter="*">All</button>
                    <button class="isotope-tab-btn" data-filter=".food">Foods</button>
                    <button class="isotope-tab-btn" data-filter=".travel">Travel</button>
                    <button class="isotope-tab-btn" data-filter=".temples">Temples</button>
                    <button class="isotope-tab-btn" data-filter=".nature">Nature</button>
                </div>
            </div>
            <div class="blog-listing isotope-item-wrapper">
                <div class="row gy-4">
                    <?php foreach($blogs as $blog){ $url = SITEURL.'blog-single.php?id='. $blog['id']; ?>
                    <div class="col-4 isotope-item food">
                        <div class="blog-item ">
                            <div class="img-holder">
                                <a href="<?php echo $url; ?>"><img src="<?php echo $blog['image']; ?>" alt="img"></a>
                            </div>
                            <div class="blog-content">
                                <h3>
                                    <a href="#">
                                        <?php echo $blog['title']; ?>
                                    </a>
                                </h3>
                                <p>
                                    <?php echo except($blog['content']); ?>
                                </p>
                                <p>
                                    Author:
                                    <?php $user = get_user($conn, $blog['uid'])[0]; 
                                        echo $user['username'];
                                        ?>
                                </p>
                                <a href="<?php echo $url; ?>" class="read-more-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>

    </div>
</section>
<?php }?>

<?php include('theme-parts/footer.php') ?>