<?php if (isset($errors)): ?>

	 <?php if(count($errors) > 0): ?>
    <div class="error" style="background-color: #FE6453;color: white;border-radius: 3px;padding: 5px;padding-left: 20px">
      <?php foreach ($errors as $error):?>

      	<?php echo $error; ?>
      	<?php echo '<br>' ?>
      <?php endforeach ?>
    </div>
  <?php endif ?>
  <?php echo '<br>'; ?>
	
<?php endif ?>