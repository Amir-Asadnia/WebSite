<?php include_once 'page/header.php' ?>
<?php
checkLogToDashbord();
$selectuserforupdate = selectuserforupdate($_GET['edituser']);
edituser($_GET['edituser']);

?>
<?php if (isset($_SESSION['usernameadmin'])) {

    } else {
    header('location:index.php?ebteda=vorod');
}
?>
    <div class="boxfather">
        <?php include_once 'page/sidebar.php' ?>
        <div class="container custom_container">
            <div class="row">
            <div class="col-sm-8 leftbox rounded-sm">
                <div class="alert alert-primary text-center mt-4">
                    فرم زیر را تکمیل کنید
                </div>

                <form method="post">

                    <div class="form-group">
                        <input type="text" class="form-control pr-3" name="name" value="<?php echo $selectuserforupdate['name']; ?>" placeholder="نام و نام خانوادگی">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control pr-3" name="username" value="<?php echo $selectuserforupdate['username']; ?>" placeholder="نام کاربری">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control pr-3" name="email" value="<?php echo $selectuserforupdate['email']; ?>" placeholder="ایمیل">
                    </div>

                    <button type="submit" class="btn btn-success btn-block mb-4" name="btnedituser">ثبت ویرایش</button>
                </form>
            </div>
            </div>
        </div>

    </div>
<?php include_once 'page/footer.php' ?>