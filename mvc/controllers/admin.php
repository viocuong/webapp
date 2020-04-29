<?php
    class admin extends Controller{
        function default(){
            
            $md=$this->requireModel('AdminModel');
            $this->view('layoutadmin');
        }
    }
?>