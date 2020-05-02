
<div class="row">
    <div class="col-md-3 col-3 p-0 d-flex">
        <a href="" class="button container p-3 d-flex justify-content-center ">
            <div class="row">
                <div class="col align-self-center">
                    <span class="material-icons">insert_chart</span>
                </div>
            </div>    
            <div class="row">
                <div class="col align-self-center">
                    Tổng đơn
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-3 p-0 d-flex">
        <a href="" class="button container p-3 d-flex justify-content-center ">
            <div class="row">
                <div class="col align-self-center">
                    <span class="material-icons">insert_chart</span>
                </div>
            </div>    
            <div class="row">
                <div class="col align-self-center">
                    Tổng đơn
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-3 p-0 d-flex">
        <a href="" class="button container p-3 d-flex justify-content-center ">
            <div class="row">
                <div class="col align-self-center">
                    <span class="material-icons">insert_chart</span>
                </div>
            </div>    
            <div class="row">
                <div class="col align-self-center">
                    Tổng đơn
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-3 p-0 d-flex">
        <a href="" class="button container p-3 d-flex justify-content-center ">
            <div class="row">
                <div class="col align-self-center">
                    <span class="material-icons">insert_chart</span>
                </div>
            </div>    
            <div class="row">
                <div class="col align-self-center">
                    Tổng đơn
                </div>
            </div>
        </a>
    </div>  
</div>
<script>
    var a=document.getElementsByClassName("button");
    $(document).ready(function(){
        $(".button").first().addClass("boderleft");
        $(".button").last().addClass("boderright");
    });
    var length=a.length;
    for(let i=0;i<length;i++){
        if(i<length-1) a[i].style.borderRight="1.5px solid #112d4e";
        if(i>0) a[i].style.borderLeft="1.5px solid #112d4e";
    }
</script>
<div class="row pt-5">
    <div class="col overflow-auto">
        <table class="table table-light table-hover">
            <thead class="bg-secondary thead-dark">
                <tr>
                    <th scope="col">Tài khoản</th>
                    <th scope="col">Id đơn</th>
                    <th scope="col">nội dung</th>
                    <th scope="col">Ngày</th>
                    <th scope="col">giá</th>
                    <th scope="col">Vận chuyển</th>
                    <th scooe="col">Thanh toán</th>
                    <th scope>Link facebook</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $data=$arr['data'];
                    if($data->num_rows>0){
                        while($row=$data->fetch_assoc()){
                            echo "<tr onclick='clickrow({$row['id_order']})'>";
                            foreach($row as $key=> $value){
                                if($key=="status_tranport"){
                                    $colorStatus="text-danger";
                                    $content="Chưa gửi";
                                    if($value==2){
                                        $colorStatus="text-success";
                                        $content="Đã gửi";
                                    }
                                    echo "<td class={$colorStatus}>$content</td>";
                                }
                                else if($key=="status_pay"){
                                    $content="Chưa thanh toán";
                                    $colorStatus="text-danger";
                                    if($value==2){
                                        $content="Đã thanh toán";
                                        $colorStatus="text-success";
                                    }
                                    echo "<td class={$colorStatus}>$content</td>";
                                }
                                else if($key=="link_fb"){
                                    echo "<td><a href='https://{$value}' target='_blank'>Link face khach</a></td>";
                                }
                                else echo "<td>{$value}</td>";
                            }
                            echo "</tr><br>";
                            echo "<tr id='option{$row['id_order']}' class='tb_option'>
                                <td>
                                    <a href='' class='btn btn-success'>Xác nhận đã thanh toán</a>
                                </td>
                                <td>
                                    <a href='' class='btn btn-success'>xác nhận vận chuyển</a>
                                </td>
                                <td>
                                    <a href='' class='btn btn-danger'>Hủy đơn</a>
                                </td>
                            </tr>";
                        }
                    }
                ?>
                <script>
                    function clickrow(idorder){
                        $(document).ready(function(){
                            
                            var s2="#option"+idorder;
                            $(s2).toggle();
                        
                        });
                    }
                </script>
            </tbody>

        </table>
    </div>

</div>