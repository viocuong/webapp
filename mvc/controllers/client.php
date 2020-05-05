<?php
    class client extends Controller{
        public $md;
        public $user;
        function __construct()
        {
            $this->md=$this->requireModel('clientModel');
            if(isset($_SESSION['user'])){
                $this->user=$_SESSION['user'];
                if(!$this->md->isClient($this->user)){
                    header("Location:http://{$GLOBALS['HOST']}/webapp/admin");
                }
            }
            if(!isset($_SESSION['user'])){
                header("Location:http://{$GLOBALS['HOST']}/webapp/login");
                
            }
            else{

            }

        }
        public function default($param){
            
            $Notices=$this->md->getNotices($this->user);
            if($param=="") $data=$this->md->getAllListOrder($this->user);
            else if($param=="unsent") $data=$this->md->getListUnsent($this->user);
            else if($param=="yetpay") $data=$this->md->getListYetPay($this->user);
            if($param=="createorder"){
                $this->view('layoutclient',['page'=>'managercreateorder','notice'=>$Notices]);
            }
            else $this->view('layoutclient',['page'=>'managerclientbill','data'=>$data,'notice'=>$Notices]);
        }
        public function send($idOrder){
            $this->md->excute("update tb_order set status_tranport=2 where id_order={$idOrder}");
            header("Location:../../client");
        }
        public function payed($idOrder){
            $this->md->excute("update tb_order set status_pay=2 where id_order={$idOrder}");
            header('Location:../../client');
        }
        public function cancel($idOrder){
            $this->md->excute("DELETE FROM tb_order where id_order={$idOrder}");
            header('Location:../../client');
        }
        public function home(){
            if(empty($_SESSION['user'])){
                header("Location:../login");
            }
            $data=$this->md->getAllListOrder();
            if(!isset($pram)) $pram="";
            $this->view('layoutadmin',['page'=>'managerbill','data'=>$data]);
        }
        public function search(){
            $str=trim(htmlspecialchars(filter_var($_POST['search'],FILTER_SANITIZE_STRING)));
            $data=$this->md->getSearch($str,$this->user);
            if(empty($_SESSION['user'])){
                header("Location:http://{$GLOBALS['HOST']}/webapp/login");
            }
            $Notices=$this->md->getNotices($this->user);
            $this->view('layoutclient',['page'=>'managerclientbill','data'=>$data,'notice'=>$Notices]);
        }
        public function performcreateorder(){
            if(!empty($_POST['contentorder']) && !empty($_POST['linkfb']) && !empty($_POST['price'])){
                $content=trim($_POST['contentorder']);
                $linkfb=trim($_POST['linkfb']);
                $price=trim($_POST['price']);
                $this->md->createorder($content,$price,$linkfb,$this->user);
                echo "
                    <script>
                        alert('Tạo đơn thành công');
                        setTimeout(function(){
                            window.location = 'http://{$GLOBALS['HOST']}/webapp/client';
                        }, 1000);

                    </script>
                ";   
            }
            else{
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
        
    }
