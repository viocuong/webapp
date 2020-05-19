<div class="row">


</div>
<div class="row">
    <div class="col-md-4 p-0 d-flex">
        <a href="http://<?php echo $GLOBALS['HOST']; ?>/webapp/admin" class="button container p-3 d-flex justify-content-center">

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
    <div class="col-md-4 p-0 d-flex">
        <a href="http://<?php echo $GLOBALS['HOST']; ?>/webapp/admin/default/unsent" class="button container p-3 d-flex justify-content-center ">
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
    <div class="col-md-4 p-0 d-flex">
        <a href="http://<?php echo $GLOBALS['HOST']; ?>/webapp/admin/default/yetpay" class="button container p-3 d-flex justify-content-center ">

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
<div style="text-align:center;">


</div>
<div class="container-md container-fluid">
    <div class="row pt-5">
        <h3 style="color:#222831">Chú thích</h3>
        <div class="col-12 mb-3 d-flex p-2 rounded-lg note-success">
            <p>Số tiền lương ứng với số đơn đã trả tiền</p>
        </div>
        <div class="col-12 mb-3 p-2 rounded-lg note-danger">
            <p>Sau khi ấn nút trả lương sẽ xóa toàn bộ các đơn đã gửi và đơn đã trả tiền, các đơn chưa gửi hoặc chưa trả tiền vẫn tồn tại, doanh thu sẽ được đặt lại thành 0</p>
        </div>
    </div>
    <?php
    $data = $arr['data'];
    if (count($data) > 0) {

        for ($i = 0; $i < count($data); $i++) {
            $salary = $data[$i]['paid'] * 40000;
            echo "
                <div class='row statistical mt-5 pl-md-5'>
                <div class='col-md-6 mb-2 mt-2'>
                    <p>Tài khoản: {$data[$i]['user']}</p>
                    <p>Tổng số đơn: {$data[$i]['sumorder']}</p>
                    <p>Số đơn đã gửi: {$data[$i]['sent']}<p>
                    <p>Số đơn đã thanh toán: {$data[$i]['paid']}</p>
                    <div style='font-size: 24px'>
                        <span style='color:#384259;' class='material-icons'>monetization_on</span>Doanh thu: {$salary}
                    </div>
                </div>
                <div class='mb-2 col-md-6 align-self-center justify-content-center' >
                    
                    <div class='d-flex justify-content-center' style='text-align: center;'>
                    <button href='' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal{$data[$i]['user']}'>Trả lương</button>    
                    <div class='modal fade' id='myModal{$data[$i]['user']}' role='dialog'>
                    <div class='modal-dialog'>
                    
                      <!-- Modal content-->
                      <div class='modal-content'>
                        <div class='modal-header'>
                            <h4 class='modal-title'>Xác nhận</h4>
                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                          
                        </div>
                        <div class='modal-body'>
                          <p>Xác nhận trả lương cho {$data[$i]['user']}</p>
                        </div>
                        <div class='modal-footer'>
                            <a onclick='paysalary({{$data[$i]['user']}})' id='btn{$data[$i]['user']}' href='http://{$GLOBALS['HOST']}/webapp/admin/paysalary/{$data[$i]['user']}' class='btn btn-success'>Đồng ý</a>
                            <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                        
                    </div>
                </div>
            </div>
            ";
        }
    }
    ?>
</div>
<script>
    function paysalary(user){
        var url="http://<?php echo $GLOBALS['HOST']; ?>/webapp/admin/paysalary/"+user;
        window.location.href=url;
    }
</script>