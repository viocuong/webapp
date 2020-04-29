<?php
    class admin extends Controller{
        function default(){
            if(empty($_SESSION['user'])){
                header('Location: login');
            }
            //$md=$this->requireModel('AdminModel');
            $this->view('layoutadmin');
        }
    }
?>
