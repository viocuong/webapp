<div class="row">
    <div class="col-md-4 p-0 d-flex">
        <a href="./admin" class="button container p-3 d-flex justify-content-center ">
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
    <div class="col-md-4 p-0 d-flex">
        <a href="" class="button container p-3 d-flex justify-content-center ">
            <div class="row">
                <div class="col align-self-center">
                    <span class="material-icons">insert_chart</span>
                </div>
            </div>
            <div class="row">
                <div class="col align-self-center">
                    Đơn chưa gửi
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 p-0 d-flex">
        <a href="" class="button container p-3 d-flex justify-content-center ">
            <div class="row">
                <div class="col align-self-center">
                    <span class="material-icons">insert_chart</span>
                </div>
            </div>
            <div class="row">
                <div class="col align-self-center">
                    Đơn chưa trả tiền
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row pt-5">
    <div class="bg-light rounded p-md-2 p-0 container-fluid">
        <div class="col overflow-auto p-0 m-0">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th class="pl-5 pr-5" scope="col">Tài khoản</th>
                        <th class="pl-5 pr-5" scope="col">Id đơn</th>
                        <th class="pl-5 pr-5" scope="col">nội dung</th>
                        <th class="pl-5 pr-5" scope="col">Ngày</th>
                        <th class="pl-5 pr-5" scope="col">giá</th>
                        <th class="pl-5 pr-5" scope="col">Vận chuyển</th>
                        <th class="pl-5 pr-5" scooe="col">Thanh toán</th>
                        <th class="pl-5 pr-5" scope="col">Link facebook</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $phpself=$_SERVER['PHP_SELF'];
                    $data = $arr['data'];
                    if ($data->num_rows > 0) {
                        while ($row = $data->fetch_assoc()) {
                            $status=[];
                            echo "<tr onclick='clickrow({$row['id_order']})'>";
                            foreach ($row as $key => $value) {
                                if ($key == "status_tranport") {
                                    $colorStatus = "text-danger";
                                    $content = "Chưa gửi";
                                    $check=0;
                                    if ($value == 2) {
                                        $colorStatus = "text-success";
                                        $content = "Đã gửi";
                                        $check=1;
                                    }
                                    if($check==0){
                                        array_push($status,'gửi hàng');
                                    }
                                    echo "<td class={$colorStatus}>$content</td>";
                                } else if ($key == "status_pay") {
                                    $check=0;
                                    $content = "Chưa thanh toán";
                                    $colorStatus = "text-danger";
                                    if ($value == 2) {
                                        $content = "Đã thanh toán";
                                        $colorStatus = "text-success";
                                        $check=1;
                                    }
                                    if($check==0){
                                        array_push($status,"nhận tiền");
                                    }
                                    echo "<td class={$colorStatus}>$content</td>";
                                } else if ($key == "link_fb") {
                                    echo "<td><a href='https://{$value}' target='_blank'>Link face khach</a></td>";
                                } else echo "<td>{$value}</td>";
                            }
                            echo "</tr>";
                            echo "<tr id='option{$row['id_order']}' class='tb_option'><td class='d-flex flex-column'>";
                                    for($idx=0;$idx<count($status);$idx++){
                                        $type="send";
                                        if($status[$idx]=="nhận tiền") $type="payed";
                                        echo "<a href='http://3.22.79.240/webapp/admin/{$type}/{$row['id_order']}' id='status{$row['id_order']}' class='m-2 btn btn-success'>{$status[$idx]}</a>";
                                    }
                                    echo "<a href='http://3.22.79.240/admin/cancel/{$row['id_order']}' class='m-2 btn btn-danger'>Hủy đơn</a>";
                            echo "</td></tr>";
                        }
                    }
                    ?>
                    <script>
                        function clickrow(idorder) {
                            $(document).ready(function() {
                                var s2 = "#option" + idorder;
                                $(s2).toggle();
                            });
                        }
                    </script>
                </tbody>

            </table>
        </div>

    </div>

</div>