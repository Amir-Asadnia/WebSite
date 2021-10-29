<?php include_once 'page/header.php' ?>
<?php
checkLogToDashbord();
$showcategory = showcategory();
addpost();
?>
<?php if (isset($_SESSION['usernameadmin'])) {

    } else {
    header('location:index.php?ebteda=vorod');
}
?>
    <div class="boxfather">
        <?php include_once 'page/sidebar.php' ?>
        <div class="container-fluid custom_container_post">
            <div class="row">
            <div class="col-sm-11 leftbox rounded-sm">
                <div class="alert alert-primary text-center mt-4">
                    مشخصات پست را وارد کنید
                </div>
                <?php if (isset($_GET['sendpost'])){ ?>
                <div class="alert alert-success text-center mr-3 ml-3">
                    پست مورد نظر اضافه شد
                </div>
                <?php } ?>
                <?php if (isset($_GET['post'])){ ?>
                <div class="alert alert-danger text-center mr-3 ml-3">
                    فرمت فایل آپلودی شما مجاز نمی باشد
                </div>
                <?php } ?>
                <form method="post" enctype="multipart/form-data">
                    <select class="form-control mb-3" name="category">
                        <option selected disabled>انتخاب دسته بندی</option>
                        <?php foreach ($showcategory as $value){ ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                        <?php } ?>
                    </select>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 pr-0">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="عنوان پست">
                                </div>
                            </div>

                            <div class="col-sm-6 pl-0">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="author" placeholder="نویسنده مطلب">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="tags" placeholder="نام برچسب خود را بر اساس - وارد کنید، حداقل پنج برچسب!">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" cols="5" rows="5" name="content">

                        </textarea>
                        <script>
                            CKEDITOR.replace('content',{
                                language:'fa'
                            });
                        </script>
                    </div>
                    <div class="form-group">
                        <input type="file" name="file" class="form-control" style="padding-top: 3.5px !important;">
                    </div>

                    <button type="submit" class="btn btn-success btn-block mb-4" name="btnaddpost">ثبت پست</button>

                </form>
            </div>
            </div>
        </div>

    </div>
<?php include_once 'page/footer.php' ?>