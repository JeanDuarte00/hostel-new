<?php

require_once('../config.php');
require_once(DBAPI);

$image = null;
$images = null;

function index()
{
    global $images;
    $images = find_all('images');
}

function add()
{
   
   if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];	
        if($file_size > 2097152){
			$errors[]='File size must be less than 2 MB';
        }		
        $desired_dir=UPLOAD;
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,UPLOAD.$file_name);
            }else{									//rename the file if another one exist
                $new_dir=UPLOAD.$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
            

            $now = date_create('now', new DateTimeZone('America/Recife'));
            $image['url'] = $file_name;
            $image['created_at'] = $image['updated_at'] = $now->format("Y-m-d H:i:s");
            save('images', $image); 
        }else{
                print_r($errors);
        }
    }
	if(empty($error)){
		echo "Success";
	}
    header('location: add.php');
}


}