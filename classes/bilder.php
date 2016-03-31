<?php
class Bilder {
    
    function Bilder()
    {
    }
    
    
    function upload($data, $userid){
        
        $pdo = new PDO('mysql:host=localhost;dbname=wpf', 'root', '');
        
        $img            = $data["name"];
        $fileTmp        = $data["tmp_name"];
        $fileSize       = $data["size"]; 
        $fileErrorMsg   = $data["error"]; 
        $filename       = explode(".", $img); 
        $type           = end($filename);
       
        
        if (!file_exists("img/userImg/" . $userid)) {
            mkdir("img/userImg/" . $userid);
        }
        
        date_default_timezone_set("Europe/Berlin");
        $time      = date("fYhis");
        $new_image = uniqid() . $time;
        
        $path = "img/userImg/" . $userid . "/" . $new_image . "." . $type;
        
        $action = move_uploaded_file($fileTmp, $path);
        
        $statement = $pdo->prepare("INSERT INTO images (imgname,path,user_id,imgtype) VALUES(:img, :path, :userid, :type)");
        $result = $statement->execute(array('img' => $img, 'path' => $path, 'userid' => $userid, 'type' => $type)); 
        
        if($result) {		
                echo 'Das Bild wurde erfolgreich hochgeladen!';
                $showFormular = false;
            } else {
                echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
            }
    }
    
    function test(){
        
        echo "test";
    }
    
    function getImages($userid){
        
        $pdo = new PDO('mysql:host=localhost;dbname=wpf', 'root', '');
        
        $paths = array();
        $stmt  = $pdo->prepare('SELECT * FROM images WHERE user_id= :userid');
        $stmt->bindValue(':userid', $userid);
        $stmt->execute();
        
        
        while ($row = $stmt->fetchAll(PDO::FETCH_OBJ)) {
            return $row;
        }
        
        $stmt = null;
    }

}



?>