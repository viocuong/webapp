<?php
    class admin extends Controller{
        public function default(){
            $md=$this->requireModel('clientModel');
            $this->view('layoutadmin');
        }
    }
?>