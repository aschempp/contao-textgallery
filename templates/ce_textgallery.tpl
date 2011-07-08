
<div class="<?php echo $this->class; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
<?php if ($this->headline): ?>

<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
<?php endif; ?>
<?php if (!$this->addBefore): ?>

<?php echo $this->text; ?>
<?php endif; ?>

<div class="gallery<?php echo $this->floatClass; ?>"<?php if ($this->margin || $this->float): ?> style="<?php echo trim($this->margin . $this->float); ?>"<?php endif; ?>>
	<?php echo $this->images; ?>
	<?php echo $this->pagination; ?>
</div>

<?php if ($this->addBefore): ?>

<?php echo $this->text; ?>
<?php endif; ?>

</div>
