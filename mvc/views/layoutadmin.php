<?php
    $HOST='3.22.79.240';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <?php include_once './includes/header.php'; ?>
</head>
<header style="background-color:#3b3b3b;">
    <div class="row d-flex">
        <div>
            <a id="menu" href="#" class="p-3">
                <span id="iconmenu" class="material-icons" style="vertical-align: middle;font-size:50px;">view_headline</span>
            </a>
        </div>
        <!--HIDENT ------------------------------------------------------------------------->
        <!--END HIDENT-->
        <div class="col d-flex justify-content-center pt-md-2 pt-2">
            <p class="h3" style="color:#ffffff;font-family:'Bangers', cursive;">Bán hàng năm châu</p>
        </div>
    </div>
</header>

<body style="color:white;">
    <div id="menuleft" class="menu">

        <div class="col p-2 d-flex align-content-center">
            <a class="" href="" style="color:#ffffff;text-decoration: none;"><span style="vertical-align: middle;" class="material-icons">person</span>xin chào <?php echo $_SESSION['user'] ?></a>
        </div>

        <nav>
            <ul class="p-2">
                <li><a href="" class="btn-menu p-3">Duyệt Đơn</a></li>
                <li><a href="" class="btn-menu p-3">Thanh toán</a></li>
                <li><a href="" class="btn-menu p-3">Trả lương</a></li>
                <li><a href="http://<?php echo $HOST; ?>/webapp/logout" class="btn-menu p-3">Đăng xuất</a></li>
            </ul>
        </nav>

    </div>
    <div class="container-fluid p-0">
        <div class="bg-light rounded bodyadmin">
            <div class="container-fluid">
                <?php include_once './mvc/views/pages/' . $arr['page'] . '.php'; ?>
            </div>
        </div>
    </div>
</body>
<script>
    var count = 1;
    $(document).ready(function() {
        $("#menu").click(function() {
            if (count % 2) {
                $("#iconmenu").text("close");
            } else $("#iconmenu").text("view_headline");
            $("#menuleft").slideToggle();
            count++;
        })
    });
</script>
</html>