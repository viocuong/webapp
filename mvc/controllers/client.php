<?php
class client extends Controller
{
    public $md;
    public $user;
    function __construct()
    {
        $this->md = $this->requireModel('clientModel');
        if (isset($_SESSION['user'])) {
            $this->user = $_SESSION['user'];
            if (!$this->md->isClient($this->user)) {
                header("Location:http://{$GLOBALS['HOST']}/webapp/admin");
            }
        }
        if (!isset($_SESSION['user'])) {
            header("Location:http://{$GLOBALS['HOST']}/webapp/login");
        } else {
        }
    }
    public function
    default($param)
    {

        $Notices = $this->md->getNotices($this->user);
        if ($param == "") $data = $this->md->getAllListOrder($this->user);
        else if ($param == "unsent") $data = $this->md->getListUnsent($this->user);
        else if ($param == "yetpay") $data = $this->md->getListYetPay($this->user);
        if ($param == "createorder") {
            $this->view('layoutclient', ['page' => 'managercreateorder', 'notice' => $Notices]);
        } else $this->view('layoutclient', ['page' => 'managerclientbill', 'data' => $data, 'notice' => $Notices]);
    }
    public function send($idOrder)
    {
        $this->md->excute("update tb_order set status_tranport=2 where id_order={$idOrder}");
        header("Location:../../client");
    }
    public function payed($idOrder)
    {
        $this->md->excute("update tb_order set status_pay=2 where id_order={$idOrder}");
        header('Location:../../client');
    }
    public function cancel($idOrder)
    {
        $this->md->excute("DELETE FROM tb_order where id_order={$idOrder}");
        header('Location:../../client');
    }
    public function home()
    {
        if (empty($_SESSION['user'])) {
            header("Location:../login");
        }
        $data = $this->md->getAllListOrder();
        if (!isset($pram)) $pram = "";
        $this->view('layoutadmin', ['page' => 'managerbill', 'data' => $data]);
    }
    public function search()
    {
        $str = trim(htmlspecialchars(filter_var($_POST['search'], FILTER_SANITIZE_STRING)));
        $data = $this->md->getSearch($str, $this->user);
        if (empty($_SESSION['user'])) {
            header("Location:http://{$GLOBALS['HOST']}/webapp/login");
        }
        $Notices = $this->md->getNotices($this->user);
        $this->view('layoutclient', ['page' => 'managerclientbill', 'data' => $data, 'notice' => $Notices]);
    }
    public function performcreateorder()
    {
        if (!empty($_POST['contentorder']) && !empty($_POST['linkfb']) && !empty($_POST['price'])) {
            
            //send EMAIL
           
            // $html="
            //     <html>
            //         <body>
            //             <h2 style='color:red;padding-bottom:6px;'>Tài khoản: {$_SESSION['user']}<h2>
            //             <h3 style='font-weight: bold;margin:10px 0px 10px 0px;'>Nội dung: {$content}</h3>
            //             <h3 style='margin-bottom'>Giá: {$price}</h3>
            //             <a href='http://3.22.79.240/webapp/redirect/check/d033e22ae348aeb5660fc2140aec35850c4da997'>Trang web</a>
            //         </body>
            //     </html>
            // ";
            // $to="a01036601381@gmail.com";
            // functions::sendMail($html,$to)



            $content = trim($_POST['contentorder']);
            $linkfb = trim($_POST['linkfb']);
            $price = trim($_POST['price']);
            $this->md->createorder($content, $price, $linkfb, $this->user);
            // ////////// Send massage//////////////////////////
            $ch = curl_init();
            //** Bước 2: Thiết lập các tuỳ chọn
            //Thiết lập URL trong request
            curl_setopt($ch, CURLOPT_URL, "https://fchat.vn/api/send?user_id=4051670644857979&block_id=5f2a968143c4c82786360a2b&token=d91b38526113f560b063af5f9b1d514850c96290");

            // Thiết lập để trả về dữ liệu request thay vì hiển thị dữ liệu ra màn hình
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // ** Bước 3: thực hiện việc gửi request
            $output = curl_exec($ch);
            echo $output; // hiển thị nội dung

            // ** Bước 4 (tuỳ chọn): Đóng request để giải phóng tài nguyên trên hệ thống
            curl_close($ch);
            echo "
                    <script>
                        alert('Tạo đơn thành công');
                        setTimeout(function(){
                            window.location = 'http://{$GLOBALS['HOST']}/webapp/client';
                        }, 500);

                    </script>
                ";
        } else {
            echo "
                    <script>
                        alert('Tạo đơn thất bại, vui lòng nhập đủ thông tin');
                        setTimeout(function(){
                            window.location = 'http://{$GLOBALS['HOST']}/webapp/client/default/createorder';
                        }, 1000);
                    </script>
                ";
        }
    }
    public function statistical()
    {
        $data = [];
        $Notices = $this->md->getNotices($this->user);
        $orders = $this->md->getListOrder($this->user);
        $sumorder = $sent = $paid  = 0;
        $arr = [];
        if ($orders->num_rows > 0) {
            $sumorder = $orders->num_rows;
            while ($order = $orders->fetch_assoc()) {
                if ($order['status_tranport'] == 2) $sent++;
                if ($order['status_pay'] == 2) $paid++;
            }
            $arr['user'] = $this->user;
            $arr['sumorder'] = $sumorder;
            $arr['sent'] = $sent;
            $arr['paid'] = $paid;
        }
        $data = $arr;
        $this->view('layoutclient', ['page' => 'managerstatisticalclient', 'data' => $data, 'notice' => $Notices]);
    }
}
