
<h1>Портфолио</h1>
<p>
<table>
Все проекты в следующей таблице являются вымышленными, поэтому даже не пытайтесь перейти по приведенным ссылкам.
<tr>
	<td>Год</td>
	<td>Проект</td>
	<td>Описание</td>
	<?php if (isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"]==2){ echo "<td></td><td></td>";} ?>
</tr>

<?php 

foreach ($data as $row)
	{
	echo '<tr>
	<td>'.$row['year'].'</td>
	<td>'.$row['site'].'</td>
	<td>'.$row['description'].'</td>';
	if (isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"]==2){
	echo '<td><a href=/portfolio/del/?id='.$row['id'].'>Удалить<br></a>'.'</td>
	<td>'.'<a href=/portfolio/update/?id='.$row['id'].'>Изменить</a></td>
	</tr>';
	}
}	

?> 
</table>
</p>

<?php
if (isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"]==2){
echo "<button>
	<a href='http://oaastahova.tomtit.tomsk.ru/portfolio/add'>Добавить данные</a>
</button>"; 
}
?>
