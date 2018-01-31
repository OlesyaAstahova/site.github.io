<h2>Наши новости:</h2>
<p>
<?php
if (isset($_SESSION["user"]["role"] ) && $_SESSION["user"]["role"]==2){
echo "<button>
	<a href='http://oaastahova.tomtit.tomsk.ru/news/add'>Добавить новость</a>
</button>";
}
?>

<?php 

foreach ($data as $row)
	{
	echo "<p>".$row['date'].' ';
	if (isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"]==2){
	echo '<a href=/news/del/?id='.$row['id'].'>Удалить</a>'.'&nbsp&nbsp&nbsp'.'<a href=/news/update/?id='.$row['id'].'>Изменить</a>';
	}
	echo "</p>".$row['name']."<br>";

	echo '<a href=/comments/index/?id='.$row['id'].'>Комментарии</a>';

	echo '<br>*****************************************************************************<br>';

}
?> 
</p>