<!DOCTYPE html>
<html lang="vi">
    <?php
        require_once './includes/header.php';
    ?>
    <body class="container">
        <div class="row main justify-content-center">
            <div class="col-10 col-md-6 rounded main-conten p-5 m-5">
                <form action="register" method="POST">
                    <div class="form-group">
                        <label for="inpUser">Tên tài khoản</label><span style="color:red;"><?php echo $arr['erroruser']; ?></span>
                        <input type="text" class="form-control" name="user">
                    </div>
                    <div class="form-group">
                        <label for="inpPass">Mật khẩu</label><span style="color: red;"><?php echo $arr['errorpass'];?></span>
                        <input type="password" class="form-control" name="pass">
                    </div>
                    <div class="form-group">
                        <label for="inpPass"> nhập lại mật khẩu</label><span style="color:red;"><?php echo $arr['errorrepass'];?></span>
                        <input type="password" class="form-control" name="repass">
                    </div>
                    <div class="form-group">
                        <label for="inpPass">email</label><span style="color:red;"><?php echo $arr['erroremail']; ?></span>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <button type="submit" class="btn btn-danger">Đăng ký</button>
                    
                </form>
            </div>
        </div>
    </body>
</html>