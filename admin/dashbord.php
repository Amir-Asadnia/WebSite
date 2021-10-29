<?php include_once 'page/header.php' ?>
<?php checkLogToDashbord(); ?>
<?php if (isset($_SESSION['usernameadmin'])) {

    } else {
    header('location:index.php?ebteda=vorod');
}
?>
    <div class="boxfather">
        <?php include_once 'page/sidebar.php' ?>
        <div class="leftbox">
        </div>
    </div>
<?php include_once 'page/footer.php' ?>