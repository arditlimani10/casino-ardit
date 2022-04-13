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
        //registering our stylesheet
        function register(){
                add_action('wp_enqueue_scripts', array( $this, 'enqueue'));
        }
        //this funtion will is used to enqueue our style sheet
        function enqueue(){
                wp_enqueue_style('costum', plugins_url('/assets/costum.css', __FILE__ ));
        }
        //this function is used to fetch data from api and handle the logic of manipulating with data
        function fetch_api_data(){
                $request = wp_remote_get(plugins_url('/data.json', __FILE__ ));
                $datas = json_decode( wp_remote_retrieve_body( $request ));
                //created an empty array that will be used to sort the positions
                $filteredData = [];
                //iterate through datas from json file
                foreach ($datas->toplists as $dt => $casinoToplists) {
                        //checking if key is 575 because we will fetch the data only from under that key
                        if ($dt == 575) {
                                usort($casinoToplists, function($a, $b) { //Sort the array
                                        return $a->position > $b->position ? 1 : -1; //Compare the positions
                                });
                                //filled the filteredData array with the sorted data based on their position
                                $filteredData = $casinoToplists;                                                                                                                                                                                                       
                        }
                }
                include_once(plugin_dir_path( __FILE__ ).'/templates/casinos-view.php');
                return $filteredData;
        }

        function register_api_data(){
                add_action( 'loop_start', array( $this, 'fetch_api_data'));
        }
        //this function for example can be used to create a post type depends on plugin requirements
        function activate(){

        }
        //this function can be used to delete a post type depends on plugin requirements
        function deactivate(){
                
        }
}
//checking if class exists
if(class_exists('casinoArdit')){
        //instantiating our class
        $casinoArdit = new CasinoArdit();
        $casinoArdit->register();
        $casinoArdit->register_api_data();
}
//activation hook
register_activation_hook( __FILE__, array($casinoArdit,'activate'));
//deactivation hook
register_deactivation_hook( __FILE__, array($casinoArdit,'deactivate'));