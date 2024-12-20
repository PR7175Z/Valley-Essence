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
<section class="bloglisting mb-3">
<div class="dashboard-head">
        <div class="mb-4 d-flex gap-5 align-items-center">
            <h2 class="mb-0">Posts</h2>
            <a href="#" class="dashboard-btn">Add New Posts</a>
        </div>
    </div>
    <?php if($message){ ?>
    <div class="output-report-message">
        <p>
            <?php echo $message; ?>
        </p>
    </div>
    <?php }?>
    <div class="blog-tab">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Approved</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Pending</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                    type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Rejected</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <div class="blog-list approved-list">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Comments</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($blogs as $blog){
                                if($blog['status'] == 1){ ?>
                                <tr>
                                    <td class="blog-id">
                                        <?php echo '#'.$blog['id']; ?>
                                    </td>
                                    <td class="blog-title">
                                        <a href="/phpsite/blogsite/admin/editblog.php?id=<?php echo $blog['id']; ?>">
                                            <?php echo $blog['title']; ?>
                                        </a>
                                    </td>
                                    <td class="blog-category">
                                        <?php 
                                        if($blog['cat_id']){
                                            $cat = get_blog_category($conn, $blog['cat_id']);
                                            foreach($cat as $c){
                                                echo $c['name'] . ' ';
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td class="blog-comments">10 <span class="icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9l.3-.5z" />
                                            </svg></span></td>
                                    <!-- <td class="blog-review">4.3 <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg></span></td> -->
                                    <td class="blog-date">
                                        <?php echo explode(' ',$blog['published_date'])[0]; ?>
                                    </td>
                                </tr>
                                <?php } 
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="blog-list pending-list">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Allow Post</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($blogs as $blog){
                                if($blog['status'] == 0){ ?>
                                <tr>
                                    <td class="blog-id">
                                        <?php echo $blog['id']; ?>
                                    </td>
                                    <td class="blog-title">
                                        <a href="/phpsite/blogsite/admin/editblog.php?id=<?php echo $blog['id']; ?>" target="_blank">
                                            <?php echo $blog['title']; ?>
                                        </a>
                                    </td>
                                    <td class="blog-category">
                                        <?php $user = get_user($conn, $blog['uid'])[0]; 
                                        echo '<a href="#">' . $user['first_name'].' '.$user['last_name']. '</a>';
                                        ?>
                                    </td>
                                    <td class="blog-status">
                                        <button class="approved status">
                                            <span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                            </span>
                                        </button>
                                        <button class="reject status">
                                            <span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <?php }
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                <div class="blog-list rejected-list">
                <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //print_r($blogs); ?>
                            <?php foreach($blogs as $blog){
                                if($blog['status'] == 2){ ?>
                                <tr>
                                    <td class="blog-id">
                                        <?php echo $blog['id']; ?>
                                    </td>
                                    <td class="blog-title">
                                        <a href="/phpsite/blogsite/admin/editblog.php?id=<?php echo $blog['id']; ?>" target="_blank">
                                            <?php echo $blog['title']; ?>
                                        </a>
                                    </td>
                                    <td class="blog-category">
                                        <?php $user = get_user($conn, $blog['uid'])[0]; 
                                        echo '<a href="#">' . $user['first_name'].' '.$user['last_name']. '</a>';
                                        ?>
                                    </td>
                                    <td class="blog-status">
                                        <button class="delete">
                                            <span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <?php }
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
<?php }?>

<?php include('theme-parts/footer.php') ?>