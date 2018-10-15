<div class="container single-item">
    <ul>
        <?php
            foreach($ds_slide as $slide)
            {
        ?>
        <li>
            <img src="images/slide/<?php echo $slide->hinh;?>" class="img-responsive" style="margin: 0 auto" alt="<?php echo $slide->ten_slide; ?>">

        </li>
        <?php 
        }
        ?>
    </ul>  
</div>