<?php
/*
Plugin Name: ArtPlagin
Plugin URI: http://страница_с_описанием_плагина_и_его_обновлений
Description:Вывод данных артистов по определенным параметрам.
Version: Номер версии плагина, например: 1.0
Author: Туховский Александр.
Author URI: http://https://m.facebook.com/sasa.tuhovskij?refid=7
*/

/*  Copyright ГОД  ИМЯ_АВТОРА_ПЛАГИНА  (email: E-MAIL_АВТОРА)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

global $table_name;
$table_name = $wpdb->prefix.'wp_myartdb';
define( 'ARTIST_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
//require_once( ARTIST_PLUGIN_DIR . 'form.perform.php' );

function art_activate() {  
	global $wpdb;
	global $table_name;
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE {$table_name} (
		id INT(11) NOT NULL AUTO_INCREMENT,
		picture_url VARCHAR(255),
		full_name VARCHAR(255),
		user_sex VARCHAR(1),
		age TINYINT,
		PRIMARY KEY  (id)
	) {$charset_collate};";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	
	add_option('option_on_page',5);
}
function art_deactivate() {
	global $wpdb;
	global $table_name;
	$wpdb->query("DROP TABLE {$table_name};");
	delete_option('option_on_page'); 
}
register_activation_hook(__FILE__, 'art_activate');
register_deactivation_hook(__FILE__, 'art_deactivate'); 

function artists_admin_menu(){
	add_menu_page('Артисты','Артисты',8,'artists','artists_editor');    
}     

add_action('admin_menu','artists_admin_menu');

function artists_editor(){     
	switch($_GET['c']){
		case 'add':
		$action = 'add';
		break;
		case 'edit':
		$action ="edit";
		break;
		default:
		
		$action ='all';
		break;
		
	}
	include_once("include/$action.php"); 
}

function art_short($atts){
	$atts = shortcode_atts(['user_sex'=>''
	,'age'=>100],$atts);      
	
	include_once"include/artlist.php";
}
add_shortcode( 'arttists' , 'art_short' );
