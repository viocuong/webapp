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