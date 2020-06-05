<?php if (isset($_SESSION['message'])): ?>
<div class='msg <?php echo $_SESSION['type'];?>'>
<?php foreach($errors as $_SESSION['message']):?>
<li><?php echo $_SESSION['message'];?></li>
<?php endforeach;?>
</div>
<?php 
unset($_SESSION['message']);
unset($_SESSION['type']);
?>
<?php endif; ?>