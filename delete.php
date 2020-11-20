<?php
    require_once"login.php";
    $conn= new mysqli($hn,$un,$pw,$db);
    if($conn->connect_error){
        die("Fatal ERROR");
        echo("Connection Error!");
    }
    if((isset($_POST["isbn"]))&&(isset($_POST["delete"])&&(isset($_POST["BTNDelete"])))){
        $isbn=$_POST["isbn"];
        $query = "DELETE FROM catalogs WHERE isbn = '$isbn'";
        $result=$conn->query($query);
        if(!$result){
            echo "Delete FAIL";
        }else{
            echo $isbn." has been removed successfully";
        }
        echo "<br><a href='index.php'>Back to Main Page</a>";
    }
?>