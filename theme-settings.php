<?php 

function forall_form_system_theme_settings_alter(&$form, &$form_state) {

	$form['forall_settings']=array(
		'#type' => 'fieldset',
	    '#title' => t('4all Settings'),
	    '#collapsible' => FALSE,
	    '#collapsed' => FALSE,
	);

	$form['forall_settings']['show_grid']=array(
		'#type' => 'select',
		'#title' => t('Show grid').':',
		'#default_value' => theme_get_setting('show_grid','forall'),
		'#options' => array(0=>t('Yes'), 1=>t('No')),
	);

}