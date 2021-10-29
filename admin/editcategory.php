<?php include_once 'page/header.php' ?>
<?php
checkLogToDashbord();
$selectcategoryforupdate = selectcategoryforupdate($_GET['editcategory']);
editcategory($_GET['editcategory']);
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
                    ویرایش دسته بندی
                </div>

                <form method="post">
                    <div class="form-group">
                        <input type="text" class="form-control text-center" name="name" value="<?php echo $selectcategoryforupdate['name']; ?>" placeholder="نام جدید را وارد کنید">
                    </div>
                    <button type="submit" class="btn btn-success btn-block mb-4" name="btneditcategory">ویرایش</button>
                </form>
            </div>
            </div>
        </div>

    </div>
<?php include_once 'page/footer.php' ?>