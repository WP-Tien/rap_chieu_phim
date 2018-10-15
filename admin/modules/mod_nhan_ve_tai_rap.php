<table id="myTable" class="table table-hover table-responsive table-striped">
    <thead>
        <tr>
            <th>ID vé</th>
            <th>Tên rạp chiếu</th>
            <th>Tên phòng chiếu</th>
            <th>Vị trí ghế</th>
            <th>Giá vé</th>
            <th>Người mua</th>
            <th>Ngày đặt</th>
            <th>Xử lý</th>
        </tr>
    </thead>
    <tbody>
            <?php 
            foreach($danh_sach_ve_phim_nguoi_dung_nhan_ve as $ve_nhan)
            {
            ?>
            <tr>
                <form action="" method="post">
                <td style="background-color: #fff; color:black;">
                    <?php echo $ve_nhan->id_ve_phim; ?>
                    <input type="hidden" value="<?php echo $ve_nhan->id_ve_phim; ?>" name="id_ve">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $ve_nhan->ten_rap_chieu; ?>
                    <input type="hidden" value="<?php echo $ve_nhan->ten_rap_chieu; ?>" name="ten_rap_chieu">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $ve_nhan->ten_phong_chieu; ?>
                    <input type="hidden" value="<?php echo $ve_nhan->ten_phong_chieu; ?>" name="ten_phong_chieu">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $ve_nhan->vi_tri_hang_ghe .' - '. $ve_nhan->vi_tri_cot_ghe; ?>
                    <input type="hidden" value="<?php echo $ve_nhan->vi_tri_hang_ghe; ?>" name="hang_ghe">
                    <input type="hidden" value="<?php echo $ve_nhan->vi_tri_cot_ghe; ?>" name="cot_ghe">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $ve_nhan->gia_ve ," VNĐ"; ?>
                    <input type="hidden" value="<?php echo $ve_nhan->gia_ve; ?>" name="gia_ve">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $ve_nhan->ho_ten_nguoi_mua; ?>
                    <input type="hidden" value="<?php echo $ve_nhan->ho_ten_nguoi_mua; ?>" name="ho_ten_nguoi_mua">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $ve_nhan->ngay_gio_dat_ve; ?>
                </td>
                <td style="background-color: #fff; color:black;">
                    <input style=" border:0 ; font-weight: bold; background-color: transparent;" type="submit" name="nhan" value="Nhận">
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
