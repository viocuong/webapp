<?php
    class admin extends Controller{
        public function default(){
            if(empty($_SESSION['user'])){
                header("Location:login");
            }
            else{
                $md=$this->requireModel('adminModel');
                $this->view('layoutadmin');
            }
        }
    }
?>