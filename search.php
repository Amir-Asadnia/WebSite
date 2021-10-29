<?php include_once 'page/header.php';
if (isset($_POST['btnsearch'])) {
    $searchpost = search($_POST['search']);
}
?>


    <div id="search">
        <div class="search">
        </div>
        <div class="search1">
            <form method="post">
                <input type="text" placeholder="آموزش مورد نظر خود را جستجو کنید..." name="search">
                <button type="submit" name="btnsearch"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>


    <div class="boxheader">
        <p>جدیدترین مطالب سایت</p>
    </div>

    <div class="boxfader" style="padding-bottom: 24px"><br>

            <?php if (@$searchpost){
            foreach ($searchpost as $value){ ?>
            <div class="box box1">
                <img src="admin/image/<?php echo $value->picture; ?>">
                <div class="matnbox">
                    <p><?php echo $value->title; ?></p>
                </div>
                <div class="matnbtn">
                    <a href="<?php echo 'page.php?id='.$value->id; ?>">
                        <button class="button">ادامه مطلب</button>
                    </a>
                </div>
            </div>
            <?php } }else{ ?>
        <div class="alertinfolog">
            مطلبی برای نمایش پیدا نشد!
        </div>
            <?php } ?>

    </div>


<?php include_once 'page/footer.php' ?>