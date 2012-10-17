<?php include('../header.php'); ?>


<?php if(DEVICE_TYPE == 'phone') : ?>
    <div id="dynamic">
        <?php include('movement-mobile.php'); ?>
    </div>
<?php else : ?>
    <div id="dynamic">
        <?php include('movement-mobile.php'); ?>
    </div>
<?php endif; ?>


<?php include('../footer.php'); ?>

