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
					<th scope="row"><label for="hipsterist_default_color"><?php _e('Default Color'); ?></label></th>
					<td><?php echo hipsterist_color_dropdown('default'); ?></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="hipsterist_homepage_color"><?php _e('Homepage Color'); ?></label></th>
					<td><?php echo hipsterist_color_dropdown('homepage'); ?></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="hipsterist_hover_color"><?php _e('Link Hover Color'); ?></label></th>
					<td><?php echo hipsterist_color_dropdown('hover'); ?></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="hipsterist_post_color"><?php _e('Post Color'); ?></label></th>
					<td><?php echo hipsterist_color_dropdown('post'); ?></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="hipsterist_page_color"><?php _e('Default Page Color'); ?></label></th>
					<td><?php echo hipsterist_color_dropdown('page'); ?></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="hipsterist_category_color"><?php _e('Category Color'); ?></label></th>
					<td><?php echo hipsterist_color_dropdown('category'); ?></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="hipsterist_tags_color"><?php _e('Tags Color'); ?></label></th>
					<td><?php echo hipsterist_color_dropdown('tags'); ?></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="hipsterist_search_color"><?php _e('Search Color'); ?></label></th>
					<td><?php echo hipsterist_color_dropdown('search'); ?></td>
				</tr>
				<?php echo hipsterist_pages_colors(); ?>
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

    return $html;
}
	
function hipsterist_pages_colors()
{
	global $hipsterist_settings, $wpdb;
	
	$pages = $wpdb->get_results( "SELECT id, post_title, post_name, guid FROM wp_posts WHERE post_type = 'page' AND post_status = 'publish' AND post_parent = '0' ORDER BY menu_order, post_date DESC" );

	$ret = '';
	foreach ($pages as $page) {
		$ret .= '<tr valign="top">
		<th scope="row"><label for="hipsterist_'.$page->post_name.'-'.$page->id.'-page_color">'.__($page->post_title).' Page Color</label></th>
		<td>'.hipsterist_color_dropdown($page->post_name.'-'.$page->id."-page").'</td>
		</tr>';
	}
	
	return $ret;
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
		$settings->default_color = $_POST['hipsterist_default_color'];
		$settings->homepage_color = $_POST['hipsterist_homepage_color'];
		$settings->hover_color = $_POST['hipsterist_hover_color'];
		$settings->post_color = $_POST['hipsterist_post_color'];
		$settings->page_color = $_POST['hipsterist_page_color'];
		$settings->category_color = $_POST['hipsterist_category_color'];
		$settings->tags_color = $_POST['hipsterist_tags_color'];
		$settings->search_color = $_POST['hipsterist_search_color'];
		
		foreach ($_POST as $post => $value) {
			if (preg_match("/^hipsterist_(.+)_color$/", $post, $matches)) {
				$settings->{$matches[1].'_color'} = $value;
			}
		}
		
		$hipsterist_settings->save_settings();
	}
	
	wp_redirect(admin_url('themes.php?page=hipsterist-settings&saved=true'));
}

?>