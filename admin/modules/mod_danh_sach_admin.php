<table id="myTable" class="table table-hover table-responsive table-striped">
    <thead>
        <tr>
            <th>Id </th>
            <th>Username</th>
            <th>Trạng thái</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Quyền trị rạp</th>
            <th>Xử lý</th>
        </tr>
    </thead>
    <tbody>


        <?php 
            foreach($danh_sach_quan_tri as $quan_tri)
            {
        ?>
            <tr>
                <form action="index.php?task=xy_ly_admin" method="post">
                <td style="background-color: #fff; color:black;">
                    <?php echo $quan_tri->id; ?> 
                    <input type="hidden" value="<?php echo $quan_tri->id; ?>" name="id">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $quan_tri->username; ?> 
                    <input type="hidden" value="<?php echo $quan_tri->username; ?>" name="username">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $quan_tri->trang_thai; ?> 
                    <input type="hidden" value="<?php echo $quan_tri->trang_thai; ?>" name="trang_thai">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $quan_tri->ho_ten; ?> 
                    <input type="hidden" value="<?php echo $quan_tri->ho_ten; ?>" name="ho_ten">
                </td>
                <td style="background-color: #fff; color:black;">
                    <?php echo $quan_tri->email; ?> 
                    <input type="hidden" value="<?php echo $quan_tri->email; ?>" name="email">
                </td>                
                <td style="background-color: #fff; color:black;">
                    <?php echo $quan_tri->quan_tri_rap; ?> 
                    <input type="hidden" value="<?php echo $quan_tri->quan_tri_rap; ?>" name="quan_tri_rap">
                </td>
                <?php
                if($quan_tri->quan_tri_rap == 0)
                {
                    ?>
                    <td style="background-color: #fff; color:black;"></td>
                    <?php
                }
                else
                {
                ?>
                <td style="background-color: #fff; color:black;">
                    <input style=" border:0 ; font-weight: bold; background-color: transparent;" type="submit" name="cap_nhat" value="Cập nhật">
                    <input style=" border:0 ; font-weight: bold; background-color: transparent;" type="submit" name="xoa" value="Xóa">
                </td>
                <?php 
                }
                ?>
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
