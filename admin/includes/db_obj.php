<?php

class Db_obj{

 
 
 public static function find_all_users(){

    global $database;
    // $result_set= $database->query("SELECT * FROM ".static::$db_table." ");
     //return $result_set;

  return static::find_this_query("SELECT * FROM ".static::$db_table." ");
  }

   public static function find_user_by_id($id){
  	global $database;

  	$the_result_array =static::find_this_query("SELECT * FROM ".static::$db_table." WHERE id = $id LIMIT 1");
   return !empty($the_result_array) ?array_shift($the_result_array): false;
  
  return $found_user;
 }
   public static function find_this_query($sql){
  global $database;
   $result_set= $database->query($sql);
   // echo $sql;
   // die("stop");
   $the_object_array = array();
   while($row = mysqli_fetch_array($result_set)){
    $the_object_array[] = static::instaation($row); 
   }
    return $the_object_array;
 }

  protected function properties(){
      $properties=array();
      foreach(static::$db_table_fields as $db_field){
        if(property_exists($this, $db_field)){
          $properties[$db_field]=$this->$db_field;
        }
      }
      return $properties; 
  }
  protected function clean_properties(){
    global $database;
    $clean_properties = array();
    foreach($this->properties() as $key => $value)
      $clean_properties[$key]=$database->escape_string($value);
  
  return $clean_properties;
}
 
   public function save(){
    return isset($this->id) ? $this->update() : $this->create();
   }


 
public function create(){
global $database;
$properties = $this->clean_properties();

$sql = "INSERT INTO ".static::$db_table."(".  implode(",",array_keys($properties))                            .")";  
$sql .= "VALUES ('". implode("','",array_values($properties))."')";

// echo $sql;
// die ("stop");



if($database->query($sql)){
  $this->id = $database->the_insert_id();
  // echo $sql;
  // die ("");
  return true;
}
else{
  return false;
}

}

//End of create
public function update(){
  global $database;
  $properties=$this->clean_properties();
  $properties_pairss=array();
  foreach($properties as $key => $value){
    $properties_pairs[]="{$key}='{$value}'";
  }
  $sql ="UPDATE ".static::$db_table." SET ";
$sql .= implode(", ",  $properties_pairs);
  $sql .= "WHERE id= " .$database->escape_string($this->id) ;

$database->query($sql);
//echo $sql; 
 //die ("va");
return (mysqli_affected_rows($database->connection) == 1) ? true:false;


}//end of update
public function delete(){
  global $database;
  $sql ="DELETE FROM ".static::$db_table." ";
  $sql .= "WHERE id=" .$database->escape_string($this->id);
  $sql .= " LIMIT 1";
  $database->query($sql);
  // echo $sql;
  // die("") ;
  return (mysqli_affected_rows($database->connection) == 1) ? true:false;
}




    public static function instaation($the_record){
    	$calling_class = get_called_class();
 	$the_object = new $calling_class;
 	             // $the_object->id          =$found_user['id'];
               //   $the_object->username    =$found_user['username'];
               //   $the_object->password    =$found_user['password'];
               //   $the_object->first_name  =$found_user['first_name'];
               //   $the_object->last_name   =$found_user['last_name'];

  foreach($the_record as $the_attribute => $value){
    if($the_object->has_the_attribute($the_attribute)){
      $the_object->$the_attribute=$value;
    }
  }
                 

                 return $the_object;


 }

   private function has_the_attribute($the_attribute){
  $object_properties=get_object_vars($this);
  return array_key_exists($the_attribute,$object_properties);
  }




public static function count_all(){
   global $database;

$sql = "SELECT COUNT(*) FROM " . static::$db_table;
$result_set = $database->query($sql);
$row = mysqli_fetch_array($result_set);
return array_shift($row);

}















 }






























?>