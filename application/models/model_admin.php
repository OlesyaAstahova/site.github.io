<?php
class Model_Admin extends Model {

public function __construct(){
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

public function autorize($data){
    $row= $this->link->query("SELECT * FROM `adm` WHERE `name` LIKE '".$data['name']."' AND `password` LIKE '".$data['password']."'");
    $test=$row->fetch_assoc();

if ($data['name']== $test['name'] && $data['password']==$test['password'])
{
 /* $_SESSION["role"] = $test['role']; */
  return $test;
} else {
return false;    
    }   
}

public function name($data){
    $test= $this->link->query("SELECT * FROM `adm` WHERE `name` LIKE '".$data."'");
    $temp=$test->fetch_assoc();
if (count($temp)>0){
return true;
} else {
return false;    
  
}
}

public function checkin($data){
if (isset($data)){
     if ($test = $this->link->query("INSERT INTO `adm` (`name`, `password`) VALUES ('".$data['name']."','".$data['password']."')")) return true;;
}
return false;
}



public function get_user($id_user)
   { 
    if ($result = mysqli_query($this->link, "SELECT * FROM `adm` WHERE `id`=$id_user")) { 

    return mysqli_fetch_assoc($result) ;

    } 
    return false;

  }

public function adm()
{
if ($result = mysqli_query($this->link, 'SELECT * FROM `adm`')) { 
      $res=[];

    while( $row = mysqli_fetch_assoc($result) ){ 
   $res[]=$row;
    } 
return $res;
}
}

public function del($id){
if (isset($id) && $test = $this->link->query("DELETE FROM `adm` WHERE `adm`.`id` = $id")){
     return true;
  } else 
    return false;
}

public function update($id){
  if (isset($id) &&  $result = $this->link->query("SELECT * FROM `adm` WHERE `adm`.`id` = $id")){
       return mysqli_fetch_assoc($result);
  }else {
      return false;
   }

}

   public function save($id){
$sql="UPDATE `adm` SET `name` = '".$_POST['name']."', `password` = '".$_POST['password']."', `role`='".$_POST['role']."'  WHERE `adm`.`id` = ".$_POST['id']." ";

if (isset($id) &&  $result = $this->link->query($sql)){
   return true;
    }else {
        return false;
      }
}

}
?>