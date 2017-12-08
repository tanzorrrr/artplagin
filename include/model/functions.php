<?php

function art_allfront($sex,$age){    
	global $wpdb;
	$table = 'wp_myartdb';
	
	if($sex!=""and isset($age)){
		
		$sql = "SELECT * FROM $table WHERE `user_sex`= '%s'AND `age`<'%s'"  ;  
		$query = $wpdb->prepare($sql, $sex,$age);
		return $result = $wpdb->get_results($query, ARRAY_A);
         				
	}
    else{
	$query = "SELECT * FROM $table ORDER BY id DESC";
	return $wpdb->get_results($query, ARRAY_A); 
	}  	
}

function art_all(){  
	global $wpdb;
	$table = 'wp_myartdb';
	echo "<br>";
	
	
	$query = "SELECT * FROM $table ORDER BY id DESC";
	return $wpdb->get_results($query, ARRAY_A); 
		
}

function art_single($id){
	global $wpdb;
	$table = 'wp_myartdb';
	$sql = "SELECT * FROM $table WHERE 	id = '%d'";
	$query = $wpdb->prepare($sql, $id); 
	return $wpdb->get_row($query, ARRAY_A);   
}

function art_add($image_url,$fio,$sex, $age){
	global $wpdb;
	$table = 'wp_myartdb';
	
	$image_url = trim($image_url);
	$fio =trim($fio);
	$sex =trim($sex);
	$age =trim($age); 
	
	if($image_url==""||$fio ==""|| $sex ==""||$age==""){
		return false;
	}
	$sql = "INSERT INTO $table(`picture_url`, `full_name`, `user_sex`, `age`) VALUES ('%s','%s','%s','%s')";
	
	$query = $wpdb->prepare($sql,$image_url,$fio,$sex,$age);
	
	$result = $wpdb->query($query);
	
	if($result === false){
		die("Db Error");
	}
	
	return true;      
	
}

function art_edit($id,$image_url,$fio,$sex, $age){
	global $wpdb;
	$table = 'wp_myartdb';
	
	$image_url = trim($image_url);
	$fio =trim($fio);
	$sex =trim($sex);
	$age =trim($age);
	
	if($image_url==""||$fio ==""|| $sex ==""||$age==""){
		return false;
	}
	$sql = "UPDATE ".$table." SET picture_url='%s', full_name='%s', user_sex='%s',age='%s'  WHERE id = '%d'";       
  $query = $wpdb->prepare($sql,$image_url,$fio,$sex,$age,$id);
  $result = $wpdb->query($query);
 
    	 
	
	if($result === false){  
		die('Ошибка БД');
	}
	
	return true;  
}

function  art_delite($id){
	global $wpdb;
	$table = 'wp_myartdb';
	$sql = "DELETE FROM `$table` WHERE id='%d'";
	$query =$wpdb->prepare($sql,$id);
	return $wpdb->query($query);  
}