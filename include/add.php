 <?php
	include"model/functions.php";
 ?>
 <h2><a href="<?=$_SERVER['PHP_SELF']?>?page=artists">Артисты</a></h2>
 
 <?php
	
	if(isset($_POST['submit'])){
		
		art_add($_POST['photo'],$_POST['fio'],$_POST['sex'],$_POST['age']);   
		die("Артист успешно добавлен");  
	}else{
		echo "Error"; 
	}
 ?>
 
 <h1>Добавит артиста</h1>  
 
 <? if($error):?>
	<p>Пожалуйста заполните поля</p>
<?endif;?>
 <form action="" method="POST">
    фото url
 	<br>
	
 	<input type="text" name="photo">
 	<br>
	Ф.И.О
 	<br>
 	<input type="text" name="fio" style="width:70%;">
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
 	<input type="number" name="age">
 	<br>
	<input type="submit" name="submit" value="Добавить">
 </form>