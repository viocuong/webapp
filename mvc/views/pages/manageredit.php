<div class="row">
    <div class="col-md-3 p-0 d-flex">
        <a href="http://<?php echo $GLOBALS['HOST']; ?>/webapp/client/default/createorder" class="button container p-3 d-flex justify-content-center ">
            <div class="row">
                <div class="col align-self-center">
                    <span class="material-icons">
                        control_point
                    </span>
                    Tạo đơn
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 p-0 d-flex">
        <a href="http://<?php echo $GLOBALS['HOST']; ?>/webapp/client" class="button container p-3 d-flex justify-content-center ">

            <div class="row">
                <div class="col align-self-center">
                    <span class="material-icons">
                        timeline
                    </span>
                    Tổng đơn
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 p-0 d-flex">
        <a href="http://<?php echo $GLOBALS['HOST']; ?>/webapp/client/default/unsent" class="button container p-3 d-flex justify-content-center ">

            <div class="row">
                <div class="col align-self-center">
                    <span class="material-icons">airport_shuttle</span>
                    Đơn chưa gửi
                </div>
                <div class="d-flex">
                    <div id="unsent" class="bg-danger rounded-lg">
                        <?php
                        if ($arr['notice']['usent'] != 0) {
                            echo "
                                    <script>
                                        var element=document.getElementById('unsent');
                                        element.classList.add('p-1');
                                    </script>
                                ";
                            echo $arr['notice']['usent'];
                        }
                        ?>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 p-0 d-flex">
        <a href="http://<?php echo $GLOBALS['HOST']; ?>/webapp/client/default/yetpay" class="button container p-3 d-flex justify-content-center ">

            <div class="row">
                <div class="col align-self-center">
                    <span class="material-icons">
                        money_off
                    </span>
                    Đơn chưa trả tiền
                </div>
                <div class="d-flex">
                    <div id="yetpay" class="bg-danger rounded-lg">

                        <?php
                        if ($arr['notice']['upay'] != 0) {
                            echo "
                                    <script>
                                        var element=document.getElementById('yetpay');
                                        element.classList.add('p-1');
                                    </script>
                                ";
                            echo $arr['notice']['upay'];
                        }
                        ?>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="container-fuilt pt-5">
    <div class="container bg-dark rounded-lg pt-5 pb-5">
        <form  id="createorder" action="http://<?php echo $GLOBALS['HOST']; ?>/webapp/admin/editOrder" method="POST">
            <div class="w-100" style="text-align: center;">
                <H2>Chỉnh sửa đơn</H2>
            </div>
            <div class="form-group pb-3">
                <label style="font-size: 24px" for="inp">Id đơn</label>
                <input class="w-100" type="text" value="<?php echo $arr['idorder']; ?>" readonly class="mb-3" name="iddon">
            </div>
            <p style="font-size: 24px;color:white">Nội dung đơn</p>
            <textarea class="w-100 mb-md-4 mb-3 rounded-lg" name="contentorder" form="createorder"><?php echo $arr['dataOrder']['content']; ?></textarea>
            <div class="form-group pb-3">
                <label style="font-size: 24px" for="inp">Giá</label>
                <input type="text" class="form-control" id="fb" name="price" value="<?php echo $arr['dataOrder']['price']; ?>">
            </div>
            <button form="createorder" type="submit" class="btn buttoncreate">Cập nhật</button>
        </form>
    </div>
</div>