<table id="myTable" class="table table-hover table-responsive table-striped">
    <thead>
        <tr>
            <th>Id </th>
            <th>Tên phòng chiếu</th>
            <th>Số ghế </th>
            <th>Tên rạp chiếu</th>
            <th>Trạng thái</th>
            <th>Số hàng cột</th>
            <th>Lối đi</th>
            <th>Xử lý</th>
        </tr>
    </thead>
    <tbody>


        <?php 
            foreach($danh_sach_phong_chieu as $phong)
            {
        ?>
            <tr>
                <form action="index.php?task=xu_ly_phong" method="post">
                <td style="background-color: #fff; color:black;">
                    <?php echo $phong->id; ?> 
                    <input type="hidden" value="<?php echo $phong->id; ?>" name="id">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $phong->ten_phong_chieu; ?> 
                    <input type="hidden" value="<?php echo $phong->ten_phong_chieu; ?>" name="ten_phong_chieu">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $phong->so_ghe; ?> 
                    <input type="hidden" value="<?php echo $phong->so_ghe; ?>" name="so_ghe">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $phong->id_rap_chieu; ?> 
                    <input type="hidden" value="<?php echo $phong->id_rap_chieu; ?>" name="id_rap_chieu">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $phong->trang_thai; ?> 
                    <input type="hidden" value="<?php echo $phong->trang_thai; ?>" name="trang_thai">
                </td>                
                <td style="background-color: #fff; color:black;">
                    <?php echo $phong->so_hang_cot; ?> 
                    <input type="hidden" value="<?php echo $phong->so_hang_cot; ?>" name="so_hang_cot">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $phong->loi_di; ?> 
                    <input type="hidden" value="<?php echo $phong->loi_di; ?>" name="loi_di">
                </td>
                <td style="background-color: #fff; color:black;">
                    <input style=" border:0 ; font-weight: bold; background-color: transparent;" type="submit" name="cap_nhat" value="Cập nhật">
                    <input style=" border:0 ; font-weight: bold; background-color: transparent;" type="submit" name="xoa" value="Xóa">
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
