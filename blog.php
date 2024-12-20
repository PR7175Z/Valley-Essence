<?php include('theme-parts/header.php') ?>

<?php
$blogs = get_blogs($conn);
?>

<section class="innerBanner-section section-gaps">
    <div class="container">
        <div class="main-title">
            <h1>Blogs</h1>
        </div>
    </div>
</section>

<?php if($blogs){ ?>
<section class="blog-listing section-gaps">
    <div class="container-fluid">
        <div class="blog-page-layout isotope-wrapper">
            <div class="filter-section mb-5 text-center">
                <div class="category-filter isotope-tabs d-flex row-gap-2 column-gap-3 justify-content-center align-items-center flex-wrap mb-4">
                    <button class="isotope-tab-btn" data-filter="*">All</button>
                    <button class="isotope-tab-btn" data-filter=".food">Foods</button>
                    <button class="isotope-tab-btn" data-filter=".travel">Travel</button>
                    <button class="isotope-tab-btn" data-filter=".temples">Temples</button>
                    <button class="isotope-tab-btn" data-filter=".nature">Nature</button>
                </div>
                <div class="search-field">
                    <input type="search" placeholder="Search Here">
                </div>
            </div>
            <div class="blog-listing isotope-item-wrapper row gy-4">
                <?php foreach($blogs as $blog){ $url = SITEURL.'blog-single.php?id='. $blog['id']; ?>
                <div class="col-3 isotope-item food">
                <div class="blog-item ">
                    <div class="img-holder">
                        <a href="<?php echo $url; ?>"><img src="<?php echo $blog['image']; ?>"
                                alt="img"></a>
                    </div>
                    <div class="blog-content">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="published-date">
                                    <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 448 512"><path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L64 64C28.7 64 0 92.7 0 128l0 16 0 48L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-256 0-48 0-16c0-35.3-28.7-64-64-64l-40 0 0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L152 64l0-40zM48 192l352 0 0 256c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256z"/></svg></span>
                                    <?php echo explode(' ',$blog['published_date'])[0]; ?>
                            </div>
                            <div class="published-author">
                                <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M373.5 27.1C388.5 9.9 410.2 0 433 0c43.6 0 79 35.4 79 79c0 22.8-9.9 44.6-27.1 59.6L277.7 319l-10.3-10.3-64-64L193 234.3 373.5 27.1zM170.3 256.9l10.4 10.4 64 64 10.4 10.4-19.2 83.4c-3.9 17.1-16.9 30.7-33.8 35.4L24.3 510.3l95.4-95.4c2.6 .7 5.4 1.1 8.3 1.1c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32c0 2.9 .4 5.6 1.1 8.3L1.7 487.6 51.5 310c4.7-16.9 18.3-29.9 35.4-33.8l83.4-19.2z"/></svg></span>
                                by <?php $user = get_user($conn, $blog['uid'])[0]; 
                                    echo $user['username'];
                                ?>
                            </div>
                        </div>
                        <h3>
                            <a href="#">
                                <?php echo $blog['title']; ?>
                            </a>
                        </h3>
                        
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