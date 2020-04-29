<?php
    class admin extends Controller{
        public function default(){
            $md=$this->requireModel('AdminModel');
            $this->view('layoutadmin');
        }
    }
?>