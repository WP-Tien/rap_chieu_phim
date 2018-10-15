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
            foreach($danh_sach_ve_phim_nguoi_dung_muon_huy as $ve_huy)
            {
            ?>
            <tr>
                <form action="index.php?task=xu_ly_ve" method="post">
                <td style="background-color: #fff; color:black;">
                    <?php echo $ve_huy->id_ve_phim; ?>
                    <input type="hidden" value="<?php echo $ve_huy->id_ve_phim; ?>" name="id_ve">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $ve_huy->ten_rap_chieu; ?>
                    <input type="hidden" value="<?php echo $ve_huy->ten_rap_chieu; ?>" name="ten_rap_chieu">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $ve_huy->ten_phong_chieu; ?>
                    <input type="hidden" value="<?php echo $ve_huy->ten_phong_chieu; ?>" name="ten_phong_chieu">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $ve_huy->vi_tri_hang_ghe .' - '. $ve_huy->vi_tri_cot_ghe; ?>
                    <input type="hidden" value="<?php echo $ve_huy->vi_tri_hang_ghe; ?>" name="hang_ghe">
                    <input type="hidden" value="<?php echo $ve_huy->vi_tri_cot_ghe; ?>" name="cot_ghe">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $ve_huy->gia_ve ," VNĐ"; ?>
                    <input type="hidden" value="<?php echo $ve_huy->gia_ve; ?>" name="gia_ve">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $ve_huy->ho_ten_nguoi_mua; ?>
                    <input type="hidden" value="<?php echo $ve_huy->ho_ten_nguoi_mua; ?>" name="ho_ten_nguoi_mua">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $ve_huy->ngay_gio_dat_ve; ?>
                </td>
                <td style="background-color: #fff; color:black;">
                    <input style=" border:0 ; font-weight: bold; background-color: transparent;" type="submit" name="huy" value="Hủy">
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
