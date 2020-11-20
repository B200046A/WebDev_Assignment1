<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search Results</title>
</head>
<body>
    <h1>Book Search Results</h1>
    <?php
    // TODO 1: Create short variable names.


    // TODO 2: Check and filter data coming from the user.


    // TODO 3: Setup a connection to the appropriate database.


    // TODO 4: Query the database.


    // TODO 5: Retrieve the results.


    // TODO 6: Display the results back to user.


    // TODO 7: Disconnecting from the database.
    require_once"login.php";
    $conn= new mysqli($hn,$un,$pw,$db);
    if($conn->connect_error){
        die("Fatal ERROR");
        echo("Connection Error!");
    }
    $searchtype=$_POST["searchtype"];
    $searchterm=$_POST["searchterm"];
    $query = "SELECT * FROM catalogs WHERE $searchtype LIKE '%$searchterm%'";
    $result=$conn->query($query);
    if(!$result){
        echo "Fail to capture the information! <a href='index.php'>Back to Main Page</a>";
        return;
    }
    $rows = $result->num_rows;
    if($rows==0){
        echo "No records can be found.<br><a href='index.php'>Back to Main Page</a>";
        return;
    }
    echo "
    <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
    </style>
    <table>
        <tr>
          <th>ISBN</th>
          <th>Author</th>
          <th>Title</th>
          <th>Price</th>
          <th></th>
        </tr>";
    for ($j = 0 ; $j < $rows ; ++$j){
        $result->data_seek($j);
        $row=$result->fetch_array(MYSQLI_ASSOC);

        $r1=htmlspecialchars($row['isbn']);
        $r2=htmlspecialchars($row['author']);
        $r3=htmlspecialchars($row['title']);
        $r4=htmlspecialchars($row['price']);
        
        echo '<tr><td>' .$r1. '</td>';
        echo '<td>' .$r2. '</td>';
        echo '<td>' .$r3. '</td>';
        echo '<td>' .$r4. '</td>';
        echo "<td><form action='delete.php' method='post'>
        <input type='hidden' name='delete' value='yes'>
        <input type='hidden' name='isbn' value='$r1'>
        <input type='submit' value='DELETE RECORD'></td></tr></form>";
    }
    echo "</table><a href='index.php'>Back to Main Page</a>";
    $result->close();
    $conn->close();
    ?>
</body>
</html>