<table id="myTable" class="table table-hover table-responsive table-striped">
    <thead>
        <tr>
            <th>Id </th>
            <th>Tên rạp chiếu</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Hình rạp chiếu</th>
            <th>Xử lý</th>
        </tr>
    </thead>
    <tbody>


        <?php 
            foreach($hien_thi_trang_rap_chieu as $rap)
            {
        ?>
            <tr>
                <form action="index.php?task=xu_ly_rap" method="post">
                <td style="background-color: #fff; color:black;">
                    <?php echo $rap->id; ?> 
                    <input type="hidden" value="<?php echo $rap->id; ?>" name="id">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $rap->ten_rap_chieu; ?> 
                    <input type="hidden" value="<?php echo $rap->ten_rap_chieu; ?>" name="ten_rap_chieu">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $rap->dia_chi; ?> 
                    <input type="hidden" value="<?php echo $rap->dia_chi; ?>" name="dia_chi">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $rap->so_dien_thoai; ?> 
                    <input type="hidden" value="<?php echo $quan_tri->so_dien_thoai; ?>" name="so_dien_thoai">
                </td>                
                <td style="background-color: #fff; color:black;">
                    <?php echo $rap->hinh_rap_chieu; ?> 
                    <input type="hidden" value="<?php echo $quan_tri->hinh_rap_chieu; ?>" name="hinh_rap_chieu">
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
