<?php
/*
* Call the uninstall plugin file
*
* @package CasinoArdit
*/
//security check if someone unauthorized tries to uninstall our plugin
if(!defined('WP_UNINSTALL_PLUGIN')){
    die;
}


/*If we were using a costum post type that saved data 
* to our database we could create a function to delete those data form DB
* when the plugin is unistalled.
* In our case we will fetch data from API.
*/