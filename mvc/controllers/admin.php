<?php
    class admin extends Controller{
        public function default(){
            $md=$this->requireModel('admmodel');
            $this->view('layoutadmin');
        }
    }
?>