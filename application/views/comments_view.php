<?php
if(isset($data['mess'])){
echo $data['mess'];
}
//var_dump($data) ;
?>
<h2>Комментарии</h2>

<?php 
	if(isset($_SESSION["user"]["role"])){
		?>
<form name="add" method="POST" action="/comments/add" >
Новый комментарий<br>
<textarea rows="5" cols="83" name="comment"></textarea><br>
<input type="hidden" name="id_news" value="<?php echo $data['id_news']; ?>">
<input type="submit" name="Отправить">
</form>
<?php
}

require_once __DIR__.'/../models/model_admin.php';


$user=new Model_Admin();


foreach ($data['news'] as $row){



		echo '<br>*****************************************************************************<br>';

		echo "Пользователь: ".$user->get_user($row['id_user'])['name']."<br>";


		echo "<i>".$row['comment']."</i>";

		if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"]==1)
		{
			if ($user->get_user($row['id_user'])['id']==$_SESSION['user']['id'])
			{
				echo '<a href=/comments/del/?id='.$row['id'].'&news='.$_GET['id'].'><br> Удалить комментарий</a>';			
			}	
		}
		if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"]==2)
		{
				echo '<a href=/comments/del/?id='.$row['id'].'&news='.$_GET['id'].'><br> Удалить комментарий</a>';			
		}

	}

?> 
