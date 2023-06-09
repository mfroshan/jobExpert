<?php 
function imageConvert($file){
                    
                    $img_name = $file['name'];
                    $img_type = $file['type'];
                    $tmp_name = $file['tmp_name'];

                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $new_img_name = $img_name;
                            echo $new_img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
								return $new_img_name;
                        }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
                
			}

?>