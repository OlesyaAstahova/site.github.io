<?php
class Model_Portfolio extends Model
{
	
public function __construct(){
                  /* Подключение к серверу MySQL */ 
$this->link = mysqli_connect( 
                            'oaastahova.tomtit.tomsk.ru',  /* Хост, к которому мы подключаемся */ 
                            'oaastahova',       /* Имя пользователя */ 
                            'zxcvbnm123',   /* Используемый пароль */ 
                            'oaastahova');     /* База данных для запросов по умолчанию */ 

if (!$this->link) { 
   printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 
mysqli_query($this->link, "SET NAMES 'utf8'");
mysqli_query($this->link, "SET CHARSET SET 'utf8'");
mysqli_query($this->link, "SET SESSION collation_connection = 'utf8_general'");
}



public function get_data()
   { 
/* Посылаем запрос серверу */ 
if ($result = mysqli_query($this->link, 'SELECT * FROM `user`')) { 
      $res=[];
    /* Выборка результатов запроса */ 
    while( $row = mysqli_fetch_assoc($result) ){ 
   $res[]=$row;
    } 
return $res;
   }
}


public function add($data){

   if (isset($data)){
   $test = $this->link->query("INSERT INTO `user` (`year`, `site`, `description`) VALUES ('".$data['year']."','".$data['site']."','".$data['description']."')");
}
return true;
}

public function del($id){

  if (isset($id) && $test = $this->link->query("DELETE FROM `user` WHERE `user`.`id` = $id")){
     return true;
  } else 
    return false;

  }

  public function update($id){
   if (isset($id) &&  $result = $this->link->query("SELECT * FROM `user` WHERE `user`.`id` = $id")){
       return mysqli_fetch_assoc($result);
  }else {
      return false;
    }

  }
  public function save($id){
$sql="UPDATE `user` SET `year` = '".$_POST['year']."', `site` = '".$_POST['site']."', `description`='".$_POST['description']."'  WHERE `user`.`id` = ".$_POST['id']." ";

if (isset($id) &&  $result = $this->link->query($sql)){
   return true;
    }else {
        return false;
      }

  }
}
?>