<?php
    class sinhvien{
        private $hoten;
        private $tuoi;
        function echo(){
            echo $this->hoten.'<br>'.$this->tuoi;
        }
    }
    $a="/hello/cuonwh";
    echo trim($a,"/");
?>