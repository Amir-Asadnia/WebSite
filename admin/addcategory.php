<?php include_once 'page/header.php' ?>
<?php
checkLogToDashbord();
addcategory();
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
                    لطفا دسته بندی خود را به فارسی وارد کنید
                </div>
                <?php if (isset($_GET['addcategory'])){ ?>
                <div class="alert alert-success text-center">
                    دسته بندی با موفقیت ثبت شد
                </div>
                <?php } ?>
                <form method="post">
                    <div class="form-group">
                        <input type="text" class="form-control text-center" name="name" placeholder="افزودن دسته بندی">
                    </div>
                    <button type="submit" class="btn btn-success btn-block mb-4" name="btncategory">افزودن</button>
                </form>
            </div>
            </div>
        </div>

    </div>
<?php include_once 'page/footer.php' ?>