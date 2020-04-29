<?php
    class client extends Controller{
        public function default(){
            $md=$this->requireModel('clientModel');
            $this->view('layoutclient');
        }
    }
?>