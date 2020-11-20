<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Entry Results</title>
</head>
<body>
    <h1>Book Entry Results</h1>
    <?php
    // TODO 1: Create short variable names.

    // TODO 2: Check and filter data coming from the user.
    

    // TODO 3: Setup a connection to the appropriate database.


    // TODO 4: Query the database.
    require_once"login.php";
    $conn= new mysqli($hn,$un,$pw,$db);
    if($conn->connect_error){
        die("Fatal ERROR");
        echo("Connection Error!");
    }

    if((isset($_POST["isbn"]))&&(isset($_POST["author"]))&&(isset($_POST["title"]))&&(isset($_POST["price"]))){
        $isbn=htmlspecialchars($_POST["isbn"]);
        $author=htmlspecialchars($_POST["author"]);
        $title=htmlspecialchars($_POST["title"]);
        $price=htmlspecialchars($_POST["price"]);
        $query = "INSERT INTO catalogs (isbn, author, title, price) 
        VALUES ('$isbn','$author','$title','$price')";
        $result=$conn->query($query);
        if(!$result){
            echo "Book Insert FAIL";
        }else{
            echo $isbn." has been inserted successfully";
        }
        echo "<br><a href='index.php'>Back to Main Page</a>";
    }
    $conn->close();
    // TODO 5: Display the feedback back to user.


    // TODO 6: Disconnecting from the database.


    ?>
</body>
</html>