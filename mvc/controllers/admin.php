<?php
    class admin extends Controller{
        public $md;
        public function default(){
            if(empty($_SESSION['user'])){
                header("Location:login");
            }
            else{
                $md=$this->requireModel('adminModel');
                $this->view('layoutadmin',['page'=>'mainadmin']);
            }
        }
        public function home(){
            if(empty($_SESSION['user'])){
                header("Location:login");
            }
            $this->view('layoutadmin',['page'=>'managerbill']); 

        }
    }
?>