<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Narrowcasting
 * @subpackage Narrowcasting/admin/partials
 */
?>
<div class="wrap">
		        <div id="icon-themes" class="icon32"></div>  
		        <h2>Narrowcasting</h2>
		         <!--NEED THE settings_errors below so that the errors/success messages are shown after submission - wasn't working once we started using add_menu_page and stopped using add_options_page so needed this-->
				<?php settings_errors(); ?>  
		        <form method="POST" action="options.php">  
		            <?php 
		                settings_fields( 'settings_page_slide_settings' );
		                do_settings_sections( 'settings_page_slide_settings' );
		            ?>
		            <?php submit_button(); ?>  
		        </form> 
</div>