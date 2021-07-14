<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'Database.php';
include_once 'Fotografias.php';

$database = new Database();
$db = $database->getConnection();

$item = new Fotografias($db);


$image = $_POST["IMAGEN"];
$decodeImage = base64_decode($image);
file_put_contents("Image.jpg", $decodeImage);

$item->imagen = $decodeImage;

    if($item->StoreImage()){  
        echo json_encode(
        array("message" => "Imagen subida"));
    } else{
        echo json_encode(
            array("message" => "Imagen no creada"));
    }

?>