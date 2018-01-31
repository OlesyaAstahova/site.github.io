
<h2>Добавление данных</h2>
<?php
if($data){
	echo $data;
}
?>

<form name="add" method="POST">
	<p>Год создания <br>
		<input type="date" name="year"></p>
	<p>Проект<br>
		<input type="text" name="site"></p>
	<p>Описание
		<input type="text" name="description"></p>
<input type="submit" name="Отправить">
</form>
