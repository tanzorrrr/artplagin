<?php
	include"model/functions.php";
	
 ?>
 
 <h2><a href="<?=$_SERVER['PHP_SELF']?>?page=artists">Артисты</a></h2>
 <?php 
	$id =(int)$_GET['id'];
	if($id==0){
		die("Не передан id");
	}
	$artist = art_single($id);
	
	if(isset($_POST['edit'])){
		art_edit($id,$_POST['photo'],$_POST['fio'],$_POST['sex'],$_POST['age']);
		die("Артис успешно отредактирован"); 
	} elseif(isset($_POST['delit'])){
		art_delite($id);
		die("Артис успешно удален");
	}
 ?>

 <h1>Редактировать артиста</h1>  
 
 
 <form action="" method="POST">
    фото url
 	<br>
	
 	<input type="text" name="photo" value="<?= $artist['picture_url']?>">
 	<br>
	Ф.И.О
 	<br>
 	<input type="text" name="fio" style="width:70%;"value="<?= $artist['full_name']?>">
 	<br>
	Пол
 	<br>
 	
	<select name="sex">
		
		<option value="Мужской">Мужской</option>
	    <option value="Женский">Женский</option>  
	</select>
 	<br>
	Возраст
 	<br>
 	<input type="text" name="age"value="<?= $artist['age']?>">
 	<br>
	<input type="submit" name="edit" value="Редактирвать ">
	<input type="submit" name="delit" value="Удалить">
 </form>