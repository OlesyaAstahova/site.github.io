<h2>Регистрация</h2>
<?php
 if (isset($data)) {
echo $data;

 }
 ?>


<form method="post" action="/admin/checkin">
    Введите логин: 
    <input type="text" name="name" required/> <br/>
    Введите пароль: 
    <input type="password" name="password" value="" required/><br/>
    Повторите пароль: 
     <input type="password" name="pass" value="" required/><br/>
    <!--  <input type="hidden" name="role">  -->
    <input type="submit" value="Зарегистрироваться" /><br/>
</form>