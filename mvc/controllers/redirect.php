<?php
    class redirect extends Controller{
        public function check($id){
            if($id=="d033e22ae348aeb5660fc2140aec35850c4da997"){
                $_SESSION['user']="admin";
                header("Location:http://{$GLOBALS['HOST']}/webapp/admin/default/unsent");
            }
            else if($id="9482e0b822adcb6341266ca852960e0c3a953294"){
                //Cuong
                $_SESSION['user']="nguyencuong";
                header("Location:http://{$GLOBALS['HOST']}/webapp/client/default/createorder");
            }
            else header("Location:http://{$GLOBALS['HOST']}/webapp/login");
        }
    }
?>