<section id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
	<?php if ($block->subject) echo render($title_prefix).'<h2>'.$block->subject.'</h2>'.render($title_suffix); ?>
	<?php echo '<div class="content">'.$content.'</div>'; ?>
</section>