<?php
if($data){
	echo $data;
}
?>
<h2>Добавить новость</h2>
<form name="add_news" method="POST">
	<p>Дата <br>
		<input type="date" name="date"></p>
	<p>Новость<br>
		<textarea rows="10" cols="45" name="name"></textarea></p>
	<input type="submit" name="Отправить">
</form>