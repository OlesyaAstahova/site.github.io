<h2>Авторизация</h2>
<?php
 if (isset($data)) {
 	echo $data;
 }
 ?>
 
<form method="post" action="/admin/autorize">
    Логин: <input type="text" name="name" /> <br/>
    Пароль: <input type="password" name="password" value="" /><br/>
    <input type="submit" value="Войти" /><br/>

</form>
<button>
	<a href='http://oaastahova.tomtit.tomsk.ru/admin/checkin'>Регистрация</a>
</button>

