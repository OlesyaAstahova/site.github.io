
<h2>Изменение данных</h2>

<form name="add" method="POST" action="/portfolio/save">
	<p>Год создания <br>
		<input type="date" name="year" value="<?php echo $data['year'] ?>"></p>
	<p>Проект<br>
		<input type="text" name="site" size="30" value="<?php echo $data['site'] ?>"></p>
	<p>Описание
		<input type="text" name="description" size="80" value="<?php echo $data['description'] ?>"></p>
		<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
<input type="submit" name="Отправить">
</form>
