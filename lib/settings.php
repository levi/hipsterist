<?php
/**
* @package WordPress
* @subpackage Hipsterist
*/

class Settings 
{

	public $defaults;
	public $settings;

	function __construct() 
	{
		$this->defaults->default_color = 'blue';
		$this->defaults->homepage_color = 'blue';
		$this->defaults->hover_color = 'pink';
		$this->defaults->post_color = 'green';
		$this->defaults->page_color = 'orange';
		$this->defaults->category_color = 'red';
		$this->defaults->tags_color = 'red';
		$this->defaults->search_color = 'purple';
		
		$this->get_settings();
	}

	function get_settings() 
	{
		$saved_settings = maybe_unserialize(get_option('hipsterist_settings'));

		if (!empty($saved_settings) && is_object($saved_settings)) 
		{
			foreach ($saved_settings as $setting => $value)
			{
				if (empty($setting)) 
				{
					$this->settings->$setting = $this->defaults->$setting;
				} 
				else 
				{
					$this->settings->$setting = $value;
				}
			}
		}

		if (empty($saved_settings)) 
		{
			update_option('hipsterist_settings', $this->defaults);
		}
	}

	function save_settings() 
	{
		$default_settings = $this->defaults;

		foreach ($default_settings as $setting) 
		{
			if (!isset($this->$setting)) 
			{
				$this->settings->$setting = $default_settings->$setting;
			}
		}

		update_option('hipsterist_settings', $this->settings);
	}
}

?>