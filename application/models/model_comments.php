<?php
class Model_Comments extends Model
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

if ($result = mysqli_query($this->link, 'SELECT * FROM `comments`')) { 
      $res=[];

    while( $row = mysqli_fetch_assoc($result) ){ 
   $res[]=$row;

    } 
return $res;
   }
}

public function get_comments($id_news)
   { 

if ($result = mysqli_query($this->link, "SELECT * FROM `comments` WHERE `id_news`=$id_news")) { 
 $res=[];
    while( $row = mysqli_fetch_assoc($result) ){ 
   $res[]=$row;

    } 
return $res;
   }
}

public function add($data){

   if (isset($data) && $this->link->query("INSERT INTO `comments` (`id_user`,`comment`,`id_news`) VALUES ('".$data['id_user']."','".$data['comment']."','".$data['id_news']."')")){
   return true;
    } 
    return false;
}


/*public function update($id){
$sql="UPDATE `comments` SET `id_news` = '".$_GET['id']."'  WHERE `comment`.`id` = ".$_POST['id']." ";

if (isset($id) &&  $result = $this->link->query($sql)){
   return true;
    }else {
        return false;
      }

  }*/

public function del($id){
  if (isset($id) && $test = $this->link->query("DELETE FROM `comments` WHERE `comments`.`id` = $id")){
     return true;
  } else 
    return false;

  }

/*
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

  }*/
}
?>