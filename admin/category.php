<?php 
include('theme-parts/header.php');
$message='';
if ( isset( $_SESSION['message'] ) ) {
    $message = $_SESSION['message'];
    kill_session();
}
$categories = get_category($conn);
if($categories){
?>
<section class="bloglisting mb-3">
    <h2 class="mb-4">Your Blogs</h2>
    <?php if($message){ ?>
    <div class="output-report-message">
        <p>
            <?php echo $message; ?>
        </p>
    </div>
    <?php }?>
    <div class="blog-tab">
        <div class="blog-list approved-list">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $cat){?>
                        <tr>
                            <td class="blog-id">
                                <?php echo '#'.$cat['id']; ?>
                            </td>
                            <td class="blog-title">
                                <a href="/phpsite/blogsite/admin/editcategory.php?id=<?php echo $cat['id']; ?>">
                                    <?php echo $cat['name']; ?>
                                </a>
                            </td>
                            <td class="blog-date">
                                <?php echo explode(' ',$cat['published_date'])[0]; ?>
                            </td>
                        </tr>
                        <?php }?>
                </tbody>
            </table>
        </div>
    </div>

</section>
<?php }?>

<?php include('theme-parts/footer.php') ?>