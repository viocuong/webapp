<?php
    class  AdminModel extends DataBase{
        function excute($stringSql){
            return $this->conn->query($stringSql);
        }
    }
?>