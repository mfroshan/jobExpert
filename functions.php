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
        inner join company cm on j.Cid = cm.Cid ");
        while($row = $j->fetch_assoc()){
            $getJob[] = $row;
         }
         return $getJob;  
         echo("<script>console.log('PHP: " . $getJob . "');</script>");              
}


function getjobsbycategory($category){
    $conn = connect();
    $res = $conn->query("select * from jobs j 
    inner join category c on j.cat_id = c.cat_id
    inner join company cm on j.Cid = cm.Cid where c.cat_id='$category'");
    while($row = $res->fetch_assoc()){
        $getJob[] = $row;
    }
    return $getJob; 
 }

?>