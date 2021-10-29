<?php include_once 'page/header.php' ?>
<?php
checkLogToDashbord();
$showadmininf = showadmininf();
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
                    لیست مدیران وب سایت
                </div>

                <?php if (isset($_GET['adminupdate'])){ ?>
                <div class="alert alert-success text-center">
                    اطلاعات حساب کاربری مدیر بروزرسانی شد!
                </div>
                <?php } ?>
                <table class="table table-striped table-dark table-bordered table-hover text-center rounded-sm">
                    <thead>
                    <tr>
                        <th>آیدی</th>
                        <th>نام کاربری مدیر</th>
                        <!--<th>حذف ردیف</th>-->
                        <th>ویرایش اطلاعات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($showadmininf){
                    foreach ($showadmininf as $value){
                    ?>
                    <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['username']; ?></td>
                        <!--<td><a href="<?php /*echo 'showcategory.php?deletecategory='.$value['id']; */?>" class="btn btn-outline-danger">حذف</a></td>-->
                        <td><a href="<?php echo 'editadmininfo.php?editadmin='.$value['id']; ?>" class="btn btn-outline-warning">ویرایش</a></td>
                    </tr>
                    <?php } } ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>

    </div>
<?php include_once 'page/footer.php' ?>