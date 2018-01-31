<?php
class Model_News extends Model
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

public function get_news()   { 
if ($result = mysqli_query($this->link, 'SELECT * FROM `news`')) { 
      $res=[];

    while( $row = mysqli_fetch_assoc($result) ){ 
   $res[]=$row;
    } 
return $res;
   }
}



public function add_news($data){

   if (isset($data)){
   $test = $this->link->query("INSERT INTO `news` (`date`,`name`) VALUES ('".$data['date']."','".$data['name']."')");
 }
return true;
}

public function del($id){
echo $id;
  if (isset($id) && $test = $this->link->query("DELETE FROM `news` WHERE `news`.`id` = $id")){
     return true;
  } else 
    return false;

  }


  public function update($id){
   if (isset($id) &&  $result = $this->link->query("SELECT * FROM `news` WHERE `news`.`id` = $id")){
       return mysqli_fetch_assoc($result);
  }else {
      return false;
    }

  }

  public function save($id){
$sql="UPDATE `news` SET `date` = '".$_POST['date']."', `name` = '".$_POST['name']."'  WHERE `news`.`id` = ".$_POST['id']." ";

if (isset($id) &&  $result = $this->link->query($sql)){
   return true;
    }else {
        return false;
      }

  }



}
?>