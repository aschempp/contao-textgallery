
<?php $total = 0; ?>
<?php foreach ($this->body as $class=>$row): foreach ($row as $col): ?>
<?php if ($col->addImage): ?>
<?php if ($total++ == 0): ?>
  <div class="image_container"<?php if ($col->margin): ?> style="<?php echo $col->margin; ?>"<?php endif; ?>>
<?php if ($col->href): ?>
    <a href="<?php echo $col->href; ?>"<?php echo $col->attributes; ?> title="<?php echo $col->alt; ?>"><img src="<?php echo $col->src; ?>"<?php echo $col->imgSize; ?> alt="<?php echo $col->alt; ?>" /></a>
<?php else: ?>
    <img src="<?php echo $col->src; ?>"<?php echo $col->imgSize; ?> alt="<?php echo $col->alt; ?>" />
<?php endif; ?>
<?php if ($col->caption): ?>
    <div class="caption"><?php echo $col->caption; ?></div>
<?php endif; ?>
  </div>
<?php elseif ($col->href): ?>
    <a href="<?php echo $col->href; ?>"<?php echo $col->attributes; ?> title="<?php echo $col->alt; ?>" style="display:none">&nbsp;</a>
<?php endif; ?>
<?php endif; ?>
<?php endforeach; endforeach; ?>
