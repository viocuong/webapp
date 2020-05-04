<?php
    class adminModel extends DataBase{
        public function getAllListOrder(){
            $result=$this->conn->query("SELECT tb_account.userName,tb_order.id_order,tb_order.content,tb_order.date,tb_order.price,tb_order.status_tranport,tb_order.status_pay,tb_order.link_fb from tb_order,tb_account where tb_order.userName=tb_account.userName");
            return $result;
        }
        public function getListUnsent(){
            $result=$this->conn->query("SELECT tb_account.userName,tb_order.id_order,tb_order.content,tb_order.date,tb_order.price,tb_order.status_tranport,tb_order.status_pay,tb_order.link_fb from tb_order,tb_account where tb_order.userName=tb_account.userName and tb_order.status_tranport=1");
            return $result;
        }
        public function getListYetPay(){
            $result=$this->conn->query("SELECT tb_account.userName,tb_order.id_order,tb_order.content,tb_order.date,tb_order.price,tb_order.status_tranport,tb_order.status_pay,tb_order.link_fb from tb_order,tb_account where tb_order.userName=tb_account.userName and tb_order.status_pay=1");
            return $result;
        }
        public function excute($sql){
            $this->conn->query($sql);
        }
        public function getNotices(){
            $unsent=$yetpay=0;
            $data=$this->conn->query("SELECT tb_account.userName,tb_order.id_order,tb_order.content,tb_order.date,tb_order.price,tb_order.status_tranport,tb_order.status_pay,tb_order.link_fb from tb_order,tb_account where tb_order.userName=tb_account.userName");
            if($data->num_rows>0){
                while($row=$data->fetch_assoc()){
                    if($row['status_tranport']==1) $unsent++;
                    if($row['status_pay']==1) $yetpay++;
                }
            }
            $ans=[];
            $ans['usent']=$unsent;
            $ans['upay']=$yetpay;
            return $ans;
        }
        public function getSearch($str){
            $id=$str;
            $str="%{$str}%";
            if($stmt=$this->conn->prepare("SELECT tb_account.userName,tb_order.id_order,tb_order.content,tb_order.date,tb_order.price,tb_order.status_tranport,tb_order.status_pay,tb_order.link_fb from tb_order,tb_account where (tb_order.userName=tb_account.userName) and(tb_order.id_order=? or tb_order.userName like ? or tb_order.date like ? or tb_order.link_fb like ? or tb_order.content like ?)")){
                $stmt->bind_param("issss",$id,$str,$str,$str,$str);
                $stmt->execute();
                $result=$stmt->get_result();
                $stmt->fetch();
                $stmt->close();
                return $result;
            }

        }
    }
?>