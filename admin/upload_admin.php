<?php

function upload_img($article_id)
{
        $j = 0; // variable pour index img

        $target_path = "../img/upload/"; // declarer chemin pour img uplader

        for ($i = 0; $i < count($_FILES['file']['name']); $i++) { // boucle pour obtneir element individuelle du tableau

            $validextensions = array("jpeg", "jpg", "png",); // choix des autorisation de format 

            $ext = explode('.', basename($_FILES['file']['name'][$i])); //  séparer le nom du fichier

            $files_extension = end($ext); // stocker extension dans une variable

            $target_path = $target_path . (uniqid()) . "." . $ext[count($ext) - 1];

            $j = $j + 1; // a chaque nouvelle img +1

            if (($_FILES["file"]["size"][$i] < 2000000) // 
                && in_array($files_extension, $validextensions)
            ) {
                if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
                    echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                    img_name(basename($target_path), $article_id);
                } else {
                    echo $j . ').<span id="error">please try again!.</span><br/><br/>';
                }
            } else {
                echo $j . ').<span id="error">***Invalid file Size or type***!.</span><br/><br/>';
            }
        }
    }
?>