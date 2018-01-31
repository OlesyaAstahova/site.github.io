
<h2>Редактирование учетных записей</h2>

<form name="add" method="POST" action="/admin/save">
	<p>Логин<br>
		<input type="text" name="name" size="30" value="<?php echo $data['name'] ?>"></p>
	<p>Пароль<br>
		<input type="text" name="password" size="30" value="<?php echo $data['password'] ?>"></p>
	<p>Роль<br>
		<input type="text" name="role" size="30" value="<?php echo $data['role'] ?>"></p>
		<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
<input type="submit" name="Отправить">
</form>
