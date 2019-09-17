<?PHP 
 $archivoTemp = $_FILES["img"]["tmp_name"];

$index = count(explode("/",$_FILES["img"]["type"]))-1;
echo $index;
 $ext =  explode(".",$_FILES["img"]["name"])[$index];
 move_uploaded_file($archivoTemp, "./foto.".$ext);

 //echo mime_content_type($_FILES["img"]["name"]);
 /* 
var_dump($_FILES); */
?>