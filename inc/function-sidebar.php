<?php
/**
 * Insert default widgets
 * on left sidevar
 *
 * @package gwt_wp
 */

function set_default_theme_widgets ($old_theme, $WP_theme = null) {
   
    $templatedir = get_template_directory_uri();

    $new_active_widgets = array (
        'left-sidebar' => array (
            'text-1',
            'text-2'
        ),
    );

    update_option('widget_text',array( 
    	1 => array(
	    	'title' => '',
	    	'text' => '<a href=""><img id="tp-seal" src="'. $templatedir . '/images/transparency-seal-160x160.png" alt="transparency seal logo" title="Transparency Seal"></a>',
    	),
    	
        2=> array(
	    	'title' => '',
	    	'text' => '<iframe src="http://oras.pagasa.dost.gov.ph/widget.shtml" style="height: 85px; width: 100%; border: none;" scrolling="no"></iframe>',
    	)
    ));
    update_option('sidebars_widgets', $new_active_widgets);
}
add_action('after_switch_theme', 'set_default_theme_widgets', 10, 2);