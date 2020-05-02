<?php
    class logout extends Controller{
        public function default(){
            if(isset($_SESSION['user'])){
                unset($_SESSION['user']);
                header("Location:http://3.22.79.240/webapp/login");
            }
        }
    }
?>