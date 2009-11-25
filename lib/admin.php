<?php

add_action('admin_menu', 'hipsterist_admin_menu');
add_action('admin_post_hipsterist_save', 'hipsterist_save_settings');

if ($_GET['activated']) {
	wp_redirect(admin_url('themes.php?page=hipsterist-settings&active=true'));
}

function hipsterist_admin_menu() {
  add_theme_page(__('Hipsterist Settings', 'hipsterist'), __('Hipsterist Settings', 'hipsterist'), 'edit_themes', 'hipsterist-settings', 'hipsterist_settings');
}

function hipsterist_settings() {
?>
	<div class="wrap">
		<?php if ($_GET['saved']): ?>
	    <div id="updated" class="updated fade">
	        <p><?php echo __('Settings saved!', 'hipsterist').' <a href="'.get_bloginfo('url').'/">'.__('View your website &rarr;', 'hipsterist').'</a>'; ?></p>
	    </div>
	    <?php endif; ?>

	    <?php if ($_GET['active']): ?>
	    <div id="updated" class="updated fade">
	        <p><?php echo __('Awesome, the Hipsterist theme is now active! To get the full experience, go ahead and change some settings below.', 'hipsterist').' <a href="'.get_bloginfo('url').'/">'.__('View your website &rarr;', 'hipsterist').'</a>'; ?></p>
	    </div>
	    <?php endif; ?>
		<h2><?php _e('Hipsterist Theme Settings', 'hipsterist'); ?></h2>
		<form action="<?php echo admin_url('admin-post.php?action=hipsterist_save'); ?>" method="POST">
			<h3>Color Scheme</h3>
			<p>Edit these settings to configure your color scheme through the theme's pages.</p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="hipsterist_homepage_color"><?php _e('Main Homepage Color'); ?></label></th>
					<td><?php hipsterist_color_dropdown('homepage'); ?></td>
				</tr>
			</table>
			
			<p class="submit">
	            <input type="submit" name="submit" class="button-primary" value="<?php esc_attr_e('Save Settings') ?>" />
	        </p>
		</form>
	</div>
<?php
}

function hipsterist_color_dropdown($page){
    global $hipsterist_settings;
    
    $colors = array(
		'blue' => "Blue",
		'green' => "Green",
		'red' => "Red",
		'orange' => "Orange",
		'pink' => "Pink",
		'purple' => "Purple",
    );
    
    $html = '<select name="hipsterist_'.$page.'_color" id="hipsterist_'.$page.'_color">'."\n";
    
    foreach ($colors as $color => $value) {
        if ($hipsterist_settings->settings->{$page.'_color'} == $color) {
            $html .= '<option value="'.$color.'" selected="selected">'.$value.'</option>'."\n";
        } else {
            $html .= '<option value="'.$color.'">'.$value.'</option>'."\n";
        }
    }
    
    $html .= '</select>';

    echo $html;
}

function hipsterist_save_settings()
{
	global $hipsterist_settings;
	
	if (!current_user_can('edit_themes'))
	{
		wp_die(__('Sorry, you don\'t have sufficient admin privileges to modify theme settings.', 'tasty'));
	}

	if (isset($_POST['submit'])) 
	{
		$settings = $hipsterist_settings->settings;
		$settings->homepage_color = $_POST['hipsterist_homepage_color'];
		
		$hipsterist_settings->save_settings();
	}
	
	wp_redirect(admin_url('themes.php?page=hipsterist-settings&saved=true'));
}

?>