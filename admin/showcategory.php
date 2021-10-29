<?php include_once 'page/header.php' ?>
<?php
checkLogToDashbord();
$showcategory = showcategory();
deletecategory();
?>

<?php if (isset($_SESSION['usernameadmin'])) {

    } else {
    header('location:index.php?ebteda=vorod');
}
?>
    <div class="boxfather">
        <?php include_once 'page/sidebar.php' ?>
        <div class="container-fluid pt-3">
            <div style="padding: 4px 15px" class="leftbox rounded-sm">
                <div class="alert alert-secondary text-center mt-4">
                    لیست دسته بندی های ثبت شده
                </div>
                <?php if (isset($_GET['deletecat'])){ ?>
                <div class="alert alert-success text-center">
                    حذف دسته بندی با موفقیت انجام شد
                </div>
                <?php } ?>

                <?php if (isset($_GET['editcat'])){ ?>
                <div class="alert alert-success text-center">
                    دسته بندی مورد نظر با موفقیت ویرایش شد
                </div>
                <?php } ?>
                <table class="table table-striped table-bordered table-dark table-hover text-center rounded-sm">
                    <thead>
                    <tr>
                        <th>آیدی</th>
                        <th>نام دسته بندی</th>
                        <th>حذف ردیف</th>
                        <th>ویرایش ردیف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($showcategory){
                    foreach ($showcategory as $value){
                    ?>
                    <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><a href="<?php echo 'showcategory.php?deletecategory='.$value['id']; ?>" class="btn btn-outline-danger">حذف</a></td>
                        <td><a href="<?php echo 'editcategory.php?editcategory='.$value['id']; ?>" class="btn btn-outline-warning">ویرایش</a></td>
                    </tr>
                    <?php } } ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>

    </div>
<?php include_once 'page/footer.php' ?>