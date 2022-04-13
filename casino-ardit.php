<?php
/*
*   @package CasinoArdit
*/

/*
 Plugin Name: Casino Ardit Plugin
 Plugin URI: https://github.com/ArditLimani1
 Description: This is a plugin for a WordPress Developer Coding Exercise
 Version: 1.0.0
 Author: Ardit Limani
 Author URI: https://arditlimani.com/
 License: GPL v2 or later
 Text Domain: casino-ardit
 */
 /*
Casino Ardit Plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Casino Ardit Plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Casino Ardit Plugin. If not, see {URI to Plugin License}.
*/

//if an user tries to access our file directly without the permission of WordPress, the connection will die, this is made for security reasons

defined('ABSPATH') or die('You cant access this file!');

class casinoArdit{
        //registering stylesheet
        function register(){
                add_action('wp_enqueue_scripts', array( $this, 'enqueue'));
        }
        //Enqueue stylesheet that is used on plugin
        function enqueue(){
                wp_enqueue_style('costum', plugins_url('/assets/costum.css', __FILE__ ));
        }
        //fetching api data and getting the view file
        function fetch_api_data(){
                $request = wp_remote_get(plugins_url('/data.json', __FILE__ ));
                $data = json_decode( wp_remote_retrieve_body( $request ) ); 
                include_once(plugin_dir_path( __FILE__ ).'/templates/casinos-view.php');
                return $data;
        }
        //add action to call function for fetching data
        function register_api_data(){
                add_action( 'loop_start', array( $this, 'fetch_api_data'));
        }
        function activate(){

        }
        function deactivate(){
                
        }
}
//checking if our class exists, only if our class exists it will instantiate the class and our functions
if(class_exists('casinoArdit')){
        //instantiating  our class
        $casinoArdit = new CasinoArdit();
        $casinoArdit->register();
        $casinoArdit->register_api_data();
}
//activation hook
register_activation_hook( __FILE__, array($casinoArdit,'activate'));
//deactivation hook
register_deactivation_hook( __FILE__, array($casinoArdit,'deactivate'));