<?php

	     
 include_once"header.php";
 include"model/functions.php";
 
 $artists = art_allfront($atts['user_sex'],$atts['age']);
 
 if(isset($_GET['d'])){
	 art_single($_GET['d']);
 }
	 
?>

<h1>Список Артистов</h1>   
<table class="arttb">
	<tr>
		<th>Фото</th>
		<th>ФИО</th>
		<th>Пол</th>
		<th>Возраст</th>
	</tr>
	<?php foreach($artists as $artist):?>
	<tr>
	
		<td width="400"><img src="<?=$artist['picture_url'];?>" alt=""></td>
		<td><a href="<?=$_SERVER['PHP_SELF']?>?page=artists&c=single&id=<?php echo $artist['id'];?>"><?=$artist['full_name'];?></a></td>
		<td><?=$artist['user_sex'];?></td>
		<td><?=$artist['age'];?></td>
		 
	</tr>
	<?php endforeach;?>     
</table>


 

