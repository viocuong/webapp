<?php
    class admin extends Controller{
        public $md;
        function __construct()
        {
            $this->md=$this->requireModel('adminModel');
        }
        public function default(){
            if(empty($_SESSION['user'])){
                header("Location:../login");
            }
            $data=$this->md->getAllListOrder();
            if(!isset($pram)) $pram="";
            $this->view('layoutadmin',['page'=>'managerbill','data'=>$data]);
        }
        public function unsent(){
            
        }
        public function send($idOrder){
            $this->md->excute("update tb_order set status_tranport=2 where id_order={$idOrder}");
            header("Location:../../admin");
            
        }
        public function payed($idOrder){
            $this->md->excute("update tb_order set status_pay=2 where id_order={$idOrder}");
            header('Location:../../admin');
        }
        public function cancel($idOrder){
            $this->md->excute("DELETE FROM tb_order where id_order={$idOrder}");
            header('Location:../../admin');
        }
        public function home(){
            if(empty($_SESSION['user'])){
                header("Location:../login");
            }
            $data=$this->md->getAllListOrder();
            if(!isset($pram)) $pram="";
            $this->view('layoutadmin',['page'=>'managerbill','data'=>$data]);
        }
    }
?>