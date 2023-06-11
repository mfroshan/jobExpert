<?php  
function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db="job";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$db);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
     }
     return $conn;
    }

    
function getjobs(){
    $conn = connect();
    $j = $conn->query(
        "select * from jobs j 
        inner join category c on j.cat_id = c.cat_id
        inner join company cm on j.Cid = cm.Cid where j.jstatus=0");
        while($row = $j->fetch_assoc()){
            $getJob[] = $row;
         }
         return $getJob;  
             
}


function getjobsbycategory($category){
    $conn = connect();
    $res = $conn->query("select * from jobs j 
    inner join category c on j.cat_id = c.cat_id
    inner join company cm on j.Cid = cm.Cid where c.cat_id='$category' and j.jstatus=0");
    while($row = $res->fetch_assoc()){
        $getJob[] = $row;
    }
       return $getJob;       
 }

?>