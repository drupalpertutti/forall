<?php
/**
 * Implements hook_preprocess_page().
 */
function forall_preprocess_page(&$vars){
	// definiamo le variabili che saranno utili alla logistica ed all'implementazione basilare del tema
	$page=$vars['page'];

	$vars['sidebar_first']=''; // stamperà l'output html della prima sidebar
	$vars['sidebar_second']=''; // stamperà l'output html della seconda sidebar
	$vars['wrapper_content_class']=''; // la classe di base del div contenitore dei contenuti che determinerà l'adattabilità delle regioni

	$vars['wrapper_class']=''; // la classe di base del div contenitore

	// carico l'impostazione della visibilità della griglia
	$grid = theme_get_setting('show_grid');
	// la classe grid determina la visibilità della griglia
	if($grid!=1) $vars['wrapper_class'].=' grid-on';
	// se ci troviamo in una pagina amministrativa aggiungiamo la classe "admin" al div contenitore
	if (path_is_admin(current_path())) $vars['wrapper_class'].=' admin';
	
	$vars['mobile_menu_button']='<div class="mobile_menu_button">MENU</div>'; // bottoni destinati ad essere utilizzati per il menu responsive
	
	$vars['site_header']='';

	if($vars['logo']) $vars['site_header'].='<a id="site_logo" href="'.$vars['front_page'].'" title="'.t('Home').'" rel="home"><img src="'.$vars['logo'].'" alt="'.t('Home').'" /></a>';
	if($vars['site_name']) $vars['site_header'].='<h1>'.$vars['site_name'].'</h1>';
	if($vars['site_slogan']) $vars['site_header'].='<h2>'.$vars['site_slogan'].'</h2>';

	if($vars['site_header']!='') $vars['site_header']='<section>'.$vars['site_header'].'</section>';

	// verifico le varie possibilità riguardo la presenza o meno delle sidebars
	if($page['sidebar_first'] && $page['sidebar_second']) { // entrambe presenti
		$vars['wrapper_content_class']='two-sidebars';
		$vars['sidebar_first']='<aside id="sidebar_first">'.drupal_render($page['sidebar_first']).'</aside>';
		$vars['sidebar_second']='<aside id="sidebar_second">'.drupal_render($page['sidebar_second']).'</aside>';
	}elseif($page['sidebar_first'] && !$page['sidebar_second']) { // presente la prima ma non la seconda
		$vars['wrapper_content_class']='one-sidebar-first';
		$vars['sidebar_first']='<aside id="sidebar_first">'.drupal_render($page['sidebar_first']).'</aside>';
		$vars['sidebar_second']='';
	}elseif(!$page['sidebar_first'] && $page['sidebar_second']) { // presente la seconda ma non la prima
		$vars['wrapper_content_class']='one-sidebar-second';
		$vars['sidebar_first']='';
		$vars['sidebar_second']='<aside id="sidebar_second">'.drupal_render($page['sidebar_second']).'</aside>';
	}

}

// modifico il separatore del breadcrumb
function forall_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {

    $output = '<h2 class="element-invisible">' . t('Sei qui') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' / ', $breadcrumb) . '</div>';
    return $output;
  }
}

?>