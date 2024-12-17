<?php include('theme-parts/header.php');
?>

<section class="innerBanner-section">
    <div class="container">
        <div class="main-title">
            <h1>Blogs</h1>
        </div>
        <div class="breadcrumbs">
            <a href="#">Home</a> / <a href="#">Blog</a> / <span>Blog Title</span>
        </div>
    </div>
</section>

<section class="blog-single">
    <div class="container">
        <div class="main-title">
            <h2>BLog Title</h2>
        </div>
        <div class="feature-img">
            <img src="" alt="">
        </div>
        <div class="text-wrapper">
            <div class="content">

            </div>
        </div>
        <div class="comments-section">
            <h3>Leave a Comment</h3>
            <form class="comment-form" action="/submit-comment" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea id="comment" name="comment" rows="4" placeholder="Write your comment here..."
                        required></textarea>
                </div>
                <button type="submit" class="submit-btn">Submit Comment</button>
            </form>

            <div class="comments-list">
                <h4>Comments</h4>
                <!-- Example of a comment -->
                <div class="comment">
                    <div class="comment-img">
                        <img src="" alt="">
                    </div>
                    <p><strong>John Doe</strong> <span>on Dec 18, 2024</span></p>
                    <p>This is a great blog post! Thanks for sharing.</p>
                </div>
                <!-- Additional comments can be dynamically added here -->
            </div>
        </div>

    </div>
</section>




<?php include('theme-parts/footer.php') ?>