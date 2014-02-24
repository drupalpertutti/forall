<section id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<hgroup class="clearfix">
		<div class="left">
			<?php echo $user_picture; ?>
		</div>
		<div>
			<?php 
				echo render($title_prefix);
				if(!$page) echo '<h3 '.$title_attributes.'><a href="'.$node_url.'">'.$title.'</a></h3>';
				//if($page) echo '<h3 '.$title_attributes.'>'.$title.'</h3>';
				echo render($title_suffix);
				if ($display_submitted) echo '<h5>'.$submitted.'</h5>';
			?>
		</div>
	</hgroup>
	<article <?php print $content_attributes; ?>>
		<?php
			hide($content['comments']);
			hide($content['links']);
			echo render($content);
		?>	
	</article>
	<div class="node-links">
		<?php echo render($content['links']); ?>
	</div>
	<div class="comment">
		<?php echo render($content['comments']); ?>
	</div>
</section>