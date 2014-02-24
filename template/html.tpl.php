<!DOCTYPE HTML>
<html xml:lang="it">
	<head profile="<?php echo $grddl_profile; ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<?php 
  			echo $head;
  			echo '<title>'.$head_title .'</title>';
  			echo $styles;
  			echo $scripts;
  		?>
	</head>
	<body class="<?php echo $classes; ?>" <?php echo $attributes;?>>
	  <?php 
	  	echo $page_top;
	  	echo $page;
	  	echo $page_bottom;
	  ?>
	</body>
</html>