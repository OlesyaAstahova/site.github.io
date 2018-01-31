<h2>Модерирование пользователей</h2>
<p>
<table>
<tr>
	<td>Логин</td>
	<td>Пароль</td>
	<td>Роль</td>
	<td></td>
	<td></td>
</tr>

<?php 

foreach ($data as $row)	{
	if ($row["role"]!=2){
	echo '<tr>
	<td>'.$row['name'].'</td>
	<td>'.$row['password'].'</td>
	<td>'.$row['role'].'</td>';
	echo '<td><a href=/admin/del/?id='.$row['id'].'>Удалить<br></a>'.'</td>
	<td>'.'<a href=/admin/update/?id='.$row['id'].'>Изменить</a></td>
	</tr>';
}
}	

?> 
</table>
</p>