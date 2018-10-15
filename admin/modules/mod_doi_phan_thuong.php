<table id="myTable" class="table table-hover table-responsive table-striped">
    <thead>
        <tr>
            <th>ID người dùng</th>
            <th>Tên người dùng</th>
            <th>Email người dùng</th>
            <th>Tổng điểm</th>
            <th>Xử lý</th>
        </tr>
    </thead>
    <tbody>
            <?php
                foreach($danh_sach_nguoi_dung as $nguoi_dung)
                {
            ?>
            <tr>
                <form action="index.php?task=xy_ly_phan_thuong" method="post">
                <td style="background-color: #fff; color:black;">
                    <?php echo $nguoi_dung->id; ?> 
                    <input type="hidden" value="<?php echo $nguoi_dung->id; ?>" name="id">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $nguoi_dung->ho_ten; ?>
                    <input type="hidden" value="<?php echo $nguoi_dung->ho_ten; ?>" name="ho_ten">
                        
                    </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $nguoi_dung->email; ?> 
                    <input type="hidden" value="<?php echo $nguoi_dung->email; ?>" name="email">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $nguoi_dung->diem_tich_luy; ?>
                    <input type="hidden" value="<?php echo $nguoi_dung->diem_tich_luy; ?>" name="diem_tich_luy">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php
                    if($nguoi_dung->diem_tich_luy >= 40)
                    {
                    ?>
                    <input style=" border:0 ; font-weight: bold; background-color: transparent;" type="submit" name="doi_phan_thuong" value="Đổi phần thưởng">
                    <?php
                    }
                    ?>
                </td> 
                </form>
            </tr>
            <?php
            }
            ?>
    </tbody>
</table>


<script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
