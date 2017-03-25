  <?php 

  class User extends Db_obj{
    protected static $db_table="users";
    protected static $db_table_fields=array('username','password','first_name','last_name',   'user_image');
  	public $username;
  	public $password;
  	public $first_name;
  	public $last_name;
  	public $id;
    public $user_image;
     
    public $upload_directory = "upload";
    public $image_placeholder ="http://placehold.it/350x150";


   public $tmp_path;
   
   public $errors =array();
   public $upload_error_array=array( UPLOAD_ERR_OK=>'There is no error',
 UPLOAD_ERR_INI_SIZE        =>'The uploaded file exceeds the upload_max_filesize directly',
 UPLOAD_ERR_FORM_SIZE       =>'The uploaded file exceeds the uploaded MAX_FLIE SIZE directly',
 UPLOAD_ERR_PARTIAL         =>'The uploaded file was only partily uploaded',
 UPLOAD_ERR_NO_FILE         =>'No file was uploaded',
 UPLOAD_ERR_NO_TMP_DIR      =>'missing a temporary folder',
 UPLOAD_ERR_CANT_WRITE      =>'failed to write file to disk',
 UPLOAD_ERR_EXTENSION       =>'A php extension stopped the file upload.');

      public function set_file($file){
     if(empty($file) || !$file || !is_array($file)){
       $this->errors[] =  "There was no file uploaded here";
       return false;

     }


     else if($file['error'] != 0){
       $this->errors[] =  $this->upload_error_array[$file['error']];
       return false;

     }

     else{

   $this->user_image = basename($file['name']);
   $this->tmp_path = $file['tmp_name'];
   $this->type     = $file['type'];
   $this->size     =$file['size'];

 }


  }
  public function picture_path(){
    return  $this->upload_directory ."/". $this->user_image;
  }
  public function save_user_and_image(){
    
      if(!empty($this->errors)){
        return false;
      }
      if(empty($this->user_image) || empty($this->tmp_path)){
        $this->errors[] = "the file was not available";
        return false;
       }
    

  $target_path =$this->upload_directory ."/". $this->user_image;
  // echo $target_path;
  // die("");

    if(file_exists($target_path)){
      $this->errors[] ="The file{$this->user_image} already exists";
    }
    if(move_uploaded_file($this->tmp_path,$target_path )){

 if($this->create()){
  unset($this->tmp_path);
  return true;
   }
 }else{
  $this->errors[]="the file directory probably does not have permission";
 }
 $this->create();
  }



    public function image_path_and_placeholder(){
      return empty($this->user_image)? $this->image_placeholder : $this->upload_directory."/".$this->user_image;
    }
  
      


   public static function verify_user($username,$password){
  global $database;

  $username = $database->escape_string($username);
  $password = $database->escape_string($password);

  $sql  = "SELECT * FROM ".static::$db_table. " WHERE";
  $sql .=" username ='{$username}'";
  $sql .=" AND password ='{$password}'";
  $sql .=" LIMIT 1";


     $the_result_array =self::find_this_query($sql);
      return !empty($the_result_array) ? array_shift($the_result_array): false;

  }




  
}//End of class user


 ?>
