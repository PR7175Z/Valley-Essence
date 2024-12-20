<?php 
include('theme-parts/header.php');
$message='';
if ( isset( $_SESSION['message'] ) ) {
    $message = $_SESSION['message'];
    kill_session();
}
$pending = get_blog_comments($conn, null,'0');
$approved = get_blog_comments($conn, null, 1);
$rejected = get_blog_comments($conn, null, 2);
?>
<section class="bloglisting mb-3">
<div class="dashboard-head">
        <div class="mb-4 d-flex gap-5 align-items-center">
            <h2 class="mb-0">Comments</h2>
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
                <?php if($approved){ ?>
                <div class="blog-list approved-list">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Comment</th>
                                <th>Author</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($approved as $cmt){
                            $author = get_user($conn, $cmt['authorid'])[0];?>
                            <tr>
                                <td class="comment-id">
                                    <?php echo '#'.$cmt['id']; ?>
                                </td>
                                <td class="comment-title">
                                    <a href="/phpsite/blogsite/admin/editcomment.php?id=<?php echo $cmt['id']; ?>">
                                        <?php echo $cmt['comment']; ?>
                                    </a>
                                </td>
                                <td class="comment-author"><?php echo $author['first_name'] . ' '. $author['last_name']; ?></td>
                                <td class="comment-date">
                                    <?php echo explode(' ',$cmt['published_date'])[0]; ?>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                <?php }?>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <?php if($pending){ ?>
                <div class="blog-list pending-list">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Comment</th>
                                <th>Author</th>
                                <th>Published Date</th>
                                <th>Allow Post</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($pending as $cmt){
                            $author = get_user($conn, $cmt['authorid'])[0];?>
                            <tr>
                                <td class="comment-id">
                                    <?php echo '#'.$cmt['id']; ?>
                                </td>
                                <td class="comment-title">
                                    <a href="/phpsite/blogsite/admin/editcomment.php?id=<?php echo $cmt['id']; ?>">
                                        <?php echo $cmt['comment']; ?>
                                    </a>
                                </td>
                                <td class="comment-author"><?php echo $author['first_name'] . ' '. $author['last_name']; ?></td>
                                <td class="comment-date">
                                    <?php echo explode(' ',$cmt['published_date'])[0]; ?>
                                </td>
                                <td></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                <?php }?>
            </div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                <?php if($rejected){ ?>
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
                            <?php foreach($rejected as $cmt){
                            $author = get_user($conn, $cmt['authorid'])[0];?>
                            <tr>
                                <td class="comment-id">
                                    <?php echo '#'.$cmt['id']; ?>
                                </td>
                                <td class="comment-title">
                                    <a href="/phpsite/blogsite/admin/editcomment.php?id=<?php echo $cmt['id']; ?>">
                                        <?php echo $cmt['comment']; ?>
                                    </a>
                                </td>
                                <td class="comment-author"><?php echo $author['first_name'] . ' '. $author['last_name']; ?></td>
                                <td class="comment-date">
                                    <?php echo explode(' ',$cmt['published_date'])[0]; ?>
                                </td>
                                <td></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                <?php }?>
            </div>
        </div>
    </div>

</section>

<?php include('theme-parts/footer.php') ?>