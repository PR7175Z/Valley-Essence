<?php include('theme-parts/header.php') ?>
    <?php if(isset($_SESSION['logout_msg'])){
        echo '<div>' . $_SESSION['logout_msg'] . '</div>';
    }else{
        echo '<div> not initialized</div>';
    }?>
<?php include('theme-parts/footer.php') ?>