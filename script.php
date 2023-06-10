<?php 
   require "functions.php";
 
   if(isset($_POST['category'])){
      $category = $_POST['category'];
 
      if($category === ""){
         $data = getjobs();
      }else{
         $data = getjobsbycategory($category);
      }
      echo json_encode($data);
   }