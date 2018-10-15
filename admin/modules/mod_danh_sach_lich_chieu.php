<table id="myTable" class="table table-hover table-responsive table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Phim</th>
            <th>Phòng</th>
            <th>Ngày giò chiếu</th>
            <th>Ngày giò kết thúc</th>
            <th>Xử lý</th>
        </tr>
    </thead>
    <tbody>
            <?php 
            foreach($danh_sach_lich_chieu as $lich_chieu)
            {
            ?>
            <tr>
                <form action="index.php?task=xu_ly_lich_chieu" method="post">
                <td style="background-color: #fff; color:black;">
                    <?php echo $lich_chieu->id; ?>
                    <input type="hidden" value="<?php echo $lich_chieu->id; ?>" name="id">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $lich_chieu->ten_phim; ?>
                    <input type="hidden" value="<?php echo $lich_chieu->ten_phim; ?>" name="ten_phim">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $lich_chieu->ten_phong_chieu; ?>
                    <input type="hidden" value="<?php echo $lich_chieu->ten_phong_chieu; ?>" name="ten_phong_chieu">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $lich_chieu->ngay_gio_chieu; ?>
                    <input type="hidden" value="<?php echo $lich_chieu->ngay_gio_chieu; ?>" name="ngay_gio_chieu">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $lich_chieu->ngay_gio_ket_thuc; ?>
                    <input type="hidden" value="<?php echo $lich_chieu->ngay_gio_ket_thuc; ?>" name="ngay_gio_ket_thuc">
                </td>

                <td style="background-color: #fff; color:black;">
                    <input style=" border:0 ; font-weight: bold; background-color: transparent;" type="submit" name="huy_lich" value="Hủy">
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
