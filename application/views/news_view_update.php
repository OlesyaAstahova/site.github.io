<h2>Изменение новости</h2>


<form name="add" method="POST" action="/news/save">
	<p>Дата<br>
		<input type="date" name="date" value="<?php echo $data['date'] ?>"></p>
	<p>Новость<br>
		<textarea rows="10" cols="45" name="name" ><?php echo $data['name'] ?></textarea></p>
	<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
<input type="submit" name="Отправить">
</form>
