<!DOCTYPE html>
<html lang="vi">
    <head>
        <?php include_once './includes/header.php';?>
    </head>
    <body style="color:white;background-image: linear-gradient(to top, #090e14, #181d23, #252b33, #323a44, #3f4955);background-repeat: no-repeat;">
        <div class="container-fluid p-md-5 p-3">
            <div class="row d-flex" >
                <div class="col d-flex justify-content-center p-md-5 p-0" >
                    <p class="h1" style="color:#ffffff;font-family:'Bangers', cursive;">Bán hàng năm châu</p>
                </div>
            </div>
            <div class="container-md container-fluid">
                <div class="row">
                    <div class="col p-2 d-flex align-content-center">
                        <a href="" style="text-decoration: none;color:white;"><span style="vertical-align: middle;" class="material-icons">person</span>xin chào <?php echo $_SESSION['user'] ?></a>
                    </div>
                </div>
                <?php include_once './mvc/views/pages/'.$arr['page'].'.php'; ?>
            </div>
        </div>
    </body>
</html>