<?php

add_action('admin_menu', 'my_plugin_menu');

if ($_GET['activated']) {
	wp_redirect(admin_url('themes.php?page=hipsterist-options&active=true'));
}

function my_plugin_menu() {
  add_theme_page('Hipsterist Settings', 'Hipsterist Settings', 'edit_themes', 'hipsterist-options', 'my_plugin_options');
}

function my_plugin_options() {
  echo '<div class="wrap">';
  echo '<p>Here is where the form would go if I actually had options.</p>';
  echo '</div>';
}

?>