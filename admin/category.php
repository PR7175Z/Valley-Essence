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
    <div class="dashboard-head">
        <div class="mb-4 d-flex gap-5 align-items-center">
            <h2 class="mb-0">Categories</h2>
            <a href="#" class="primary-btn">Add New Category</a>
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
        <div class="blog-list approved-list">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Delete</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $cat){?>
                        <tr>
                            <td class="blog-id">
                                <?php echo '0'.$cat['id']; ?>
                            </td>
                            <td class="blog-title">
                                <a href="/phpsite/blogsite/admin/editcategory.php?id=<?php echo $cat['id']; ?>">
                                    <?php echo $cat['name']; ?>
                                </a>
                            </td>
                            <td class="blog-date">
                                <?php echo explode(' ',$cat['published_date'])[0]; ?>
                            </td>
                            <td class="text-center">
                                <a href="#" class="delete-icon">
                                    <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span>
                                </a>
                            </td>
                            
                            <td class="text-center">
                                <a href="#" class="edit-icon">
                                    <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg></span>
                                </a>
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