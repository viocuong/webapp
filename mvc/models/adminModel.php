<?php
    class adminModel extends DataBase{
        public function getAllListOrder(){
            $result=$this->conn->query("SELECT tb_account.userName,tb_order.id_order,tb_order.content,tb_order.date,tb_order.price,tb_order.status_tranport,tb_order.status_pay,tb_order.link_fb from tb_order,tb_account where tb_order.userName=tb_account.userName");
            return $result;
        }
    }
?>