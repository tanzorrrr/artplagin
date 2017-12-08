<?php

	     
 include_once"header.php";
 include"model/functions.php";
 if(isset($_GET['d'])){
	 art_delite($_GET['d']);
 }
 $artists = art_all();
 
 if(isset($_GET['d'])){
	 art_delite($_GET['d']);
 }
	 
?>

<h1>Список Артистов</h1>   
<table class="arts">
	<tr>
		<th>Фото</th>
		<th>ФИО</th>
		<th>Пол</th>
		<th>Возраст</th>
		<th>Удалить</th>
	</tr>
	<?php foreach($artists as $artist):?>
	<tr>
	
		<td><img width="100" src="<?=$artist['picture_url'];?>" alt=""></td>
		<td><a href="<?=$_SERVER['PHP_SELF']?>?page=artists&c=edit&id=<?php echo $artist['id'];?>"><?=$artist['full_name'];?></a></td>
		<td><?=$artist['user_sex'];?></td>
		<td><?=$artist['age'];?></td>
		 <td><a href="<?=$_SERVER['PHP_SELF']?>?page=artists&d=<?php echo $artist['id'];?>">Удалить</a></td>
	</tr>
	<?php endforeach;?>     
</table>



<p><a class="btnad" href="<?=$_SERVER['PHP_SELF']?>?page=artists&c=add">добавить артиста</a></p>     

