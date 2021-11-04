<?php 
 include '../../models/WEBS3/ApiGoogle/vendor/autoload.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=administrador2021utc-57a954135ad4.json');

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->SetScopes(['https://www.googleapis.com/auth/drive.file']);
try{

 $service = new Google_Service_Drive($client);
 $file_path= $_FILES['archivos']['tmp_name'];

 $file = new Google_Service_Drive_DriveFile();
 $file->setName($_FILES['archivos']['name']);

 $finfo = finfo_open(FILEINFO_MIME_TYPE);
 $mime_type = finfo_file($finfo, $file_path);

 

 $file->setParents(array("1Qsiq-b6hujG7-X_rE21IYQ63L4QQ_irf"));
 $file->setDescription("Archivo cargado desde php");
 $file->setMimeType( $mime_type);

 $resultado = $service->files->create(
     $file,
     array(
        'data' => file_get_contents($file_path),
        'mimeType'=>  $mime_type,
        'uploadType'=>'media'    
     )
 );

 echo '<a href="https://drive.google.com/open?id='. $resultado->id .'"
 target="_blank">'.$resultado->name.'</a>';

}catch(Google_Service_Exeception $gs){

    $mensaje = json_decode($gs->getMassege());
    echo $mensaje->error->message();
}catch(Exception $e){
echo $e->getMessage();
}

?>