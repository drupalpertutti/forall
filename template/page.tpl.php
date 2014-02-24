<?php 
/*
 * Per questo file abbiamo introdotto delle varaibili allo scopo di semplificare 
 * il lavoro di chi vuole sviluppare un tema responsive.
 * Le varaibli aggiunte sono: 
 *
 * - $sidebar_first: Questa varaibile contiene l'output html della regione $page['sidebar_first']
 * restituisce una stringa vuota nel caso la regione non abbia contenuti, questo fa si che non
 * serva verificare nuovamente se la regione è vuota o meno prima di stamparla.
 *
 * - $sidebar_second: Questa varaibile contiene l'output html della regione $page['sidebar_second']
 * restituisce una stringa vuota nel caso la regione non abbia contenuti, questo fa si che non
 * serva verificare nuovamente se la regione è vuota o meno prima di stamparla.
 *
 * - $content_class: Restituisce la classe del contenuto principale calcolata in base alla presenza
 * o meno delle sidebar laterali.
 *
 * - $wrapper_class: Restituisce una stringa con le classi da assegnare al contenitore generale 
 * del sito (per ora le classi sono .container, e in pagine amministrative si aggiunge .admin).
 *
 * - $mobile_menu_button: Restituisce i bottoni che verranno poi ulizzati dal sistema per i
 * dispositivi mobile.
 *
 * - $site_header: Restituisce una stringa html con l'output di un ipotetica header del sito,
 * contenente il logo (linkato alla home) il nome del sito e lo slogan
 *
 * Le uniche altre varaibili sono quelle fornite dal core di Drupal
 *
 * Regioni:
 * - $page['help']: Testo di aiuto per le pagine amministrative.
 * - $page['highlighted']: Per mettere oggetti in evidenza.
 * - $page['content']: Il contenuto principale della pagina.
 * - $page['sidebar_first']: Gli oggetti nella prima sidebar.
 * - $page['sidebar_second']: Gli oggetti nella seconda sidebar.
 * - $page['header']: Gli oggetti nella testata delle pagina.
 * - $page['footer']: Gli oggetti nel footer delle pagina.
 * - $page['copy']: Area dedicata ai crediti.
 *
 * @see template.php
 * @see template_preprocess_page()
 * @see html.tpl.php
 */
?>

<!-- <div id="page-wrapper" class="<?php echo $wrapper_class; ?>">  -->
<header class="wrapper">
	<div class="wrapper-content <?php echo $wrapper_class; ?>">
	<?php
		echo $site_header;
		// se invece di $site_header si desidera usare le varibili standardi di Drupal per la stesura dell'header si potrebbe voler procedere in questo modo:
		// if($page['logo']) echo '<a id="site_logo" href="'.$page['front_page'].'" title="'.t('Home').'" rel="home"><img src="'.$page['logo'].'" alt="'.t('Home').'" /></a>';
		// if($page['site_name']) echo '<h1>'.$page['site_name'].'</h1>';
		// if($page['site_slogan']) echo '<h1>'.$page['site_slogan'].'</h1>';
		// 
		// verifichiamo l'esistenza e stampiamo i contenuti della regione header
		if($page['header']) echo render($page['header']);
	?>
	</div>
</header>

<?php
	// verifichiamo l'esistenza e stampiamo i contenuti delle regioni nav e highlighted
	if($page['nav']) echo '<nav id="main-menu" class="wrapper" role="navigation"><div class="wrapper-content <?php echo $wrapper_class; ?>">'.render($page['nav']).'</div></nav>';
	if($page['highlighted']) echo '<section id="highlighted" class="wrapper"><div class="wrapper-content <?php echo $wrapper_class; ?>">'.render($page['highlighted']).'</div></section>';
?>
<section id="main" class="wrapper">
	<div class="wrapper-content <?php echo $wrapper_content_class; ?> <?php echo $wrapper_class; ?>" role="main">
		<article id="content">
			<?php 

				// verifichiamo l'esistenza e stampiamo i messaggi di sistema ($messages) e della breadcrumb
				if($messages) echo $messages;
				if($breadcrumb) echo $breadcrumb;

				// verifichiamo l'esistenza del titolo e ne stampiamo il contenuto con relativi prefisso e suffisso
				if ($title) echo '<hgroup>'.render($title_prefix).'<h1 class="title" id="page-title">'.$title.'</h1>'.render($title_suffix).'</hgroup>'; 

				// verifichiamo l'esistenza e stampiamo le tabs, gli aiuti (regione help) e i link di azione di sistema ($action_links)
				if($tabs) echo render($tabs);
				if($page['help']) echo render($page['help']);
				if($action_links) echo render($action_links);

				// stampiamo il contenuto principale della pagina
				echo render($page['content']);
			?>
		</article>
		<?php 
			// stampiamo la variabile $sidebar_first (sarà una stringa vuota se non vi sono contenuti)
			echo $sidebar_first; 
			// si potrebbe decidere di utilizzare anche qui un metodo più classico, si procederà quindi come segue:
			// if($page['sidebar_first']) echo '<aside id="sidebar_first" class="'.$sidebar_first_class.'">'.drupal_render($page['sidebar_first']).'</aside>';
		?>
		<?php
			// stampiamo la variabile $sidebar_second (sarà una stringa vuota se non vi sono contenuti)
			echo $sidebar_second;
			// si potrebbe decidere di utilizzare anche qui un metodo più classico, si procederà quindi come segue:
			// if($page['sidebar_second']) echo '<aside id="sidebar_second" class="'.$sidebar_second_class.'">'.drupal_render($page['sidebar_second']).'</aside>';
		?>
	</div>
</section>

<?php 
	// verifichiamo l'esistenza e stampiamo i contenuti delle regioni footer e copy
	if($page['footer']) echo'<footer role="contentinfo"><div class="wrapper-content <?php echo $wrapper_class; ?>">'.render($page['footer']).'</div></footer>';
	if($page['copy']) echo'<section id="copy" class="wrapper"><div class="wrapper-content <?php echo $wrapper_class; ?>">'.render($page['copy']).'</div></section>'; 
?>
<!-- </div> -->