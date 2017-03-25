<?php 


 class Photo extends Db_obj{

    protected static $db_table="photos";
    protected static $db_table_fields=array('title','caption','description','filename','alternate_text','type','size');
  	public $id;
  	public $title;
    public $caption;
  	public $description;
  	public $filename;
    public $alternate_text;
  	public $type;
  	public $size;



   public $tmp_path;
   public $upload_directory="upload";
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

   $this->filename = basename($file['name']);
   $this->tmp_path = $file['tmp_name'];
   $this->type     = $file['type'];
   $this->size     =$file['size'];

 }


  }


  public function picture_path(){
    return  $this->upload_directory ."/". $this->filename;
  }
  public function save(){
    if($this->id){
      $this->update();
    }else{
      if(!empty($this->errors)){
        return false;
      }
      if(empty($this->filename) || empty($this->tmp_path)){
        $this->errors[] = "the file was not available";
        return false;
       }
    

  $target_path =$this->upload_directory ."/". $this->filename;
  // echo $target_path;
  // die("");

    if(file_exists($target_path)){
      $this->errors[] ="The file{$this->filename} already exists";
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
}



 
public function delete_photo(){
  if($this->delete()){
       $target_path = 'admin' ."/". $this->picture_path();
       // echo $target_path;
       // die("stoo");
       return unlink($target_path) ? true : false ;
  }
  // else{
  //   redirect("photos.php");
  // }
}





 	
 }//class photo end
















 ?>