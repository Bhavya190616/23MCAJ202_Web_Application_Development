<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body style="background-color:rgb(164, 204, 242); font-family: Arial;"><!--background color for the page-->

    <h2 style="text-align: center;">Student Details from Database</h2><!--heading of the page-->

    <table style="border-collapse: collapse; margin: auto; width: 70%;"><!--creating a table -->
        <tr>
            <th style="border: 2px solid black; padding: 8px;">Roll No</th><!--heading rows of the table-->
            <th style="border: 2px solid black; padding: 8px;">Name</th>
            <th style="border: 2px solid black; padding: 8px;">Course</th>
        </tr>
<?php
    //setting up variables for connection
    $servername="localhost"; // servername
    $username="root";//Database username
    $password="";//blank since nothing is there (database password)
    $database="collegedb";//database name

    //connecting to the database
    $conn= new mysqli($servername,$username,$password,$database); //creating a connection using mysqli the keyword new is used to create a new object of the mysqli class and here we pass database details to it

    // checking if the connection is successful or not

    if($conn->connect_error){
        die("Connection Failed: ".$conn->connect_error); //if the connection is a failure the program execution is stopped quickly(using die function) and it will the error message
    }

    // to retrieve the data from the database we have to write the query using SQL
    $sql="SELECT student_id, name, department from student";

    //storing the result
    $result= $conn->query($sql);

    // check if rows returned or affected is greater than 0
    if($result->num_rows>0){
        //if yes we create the result into an associative array using the function fetch_assoc then using while we go through each row 
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='border: 2px solid black; padding: 8px;'>" . $row["student_id"] . "</td>";
            echo "<td style='border: 2px solid black; padding: 8px;'>" . $row["name"] . "</td>";
            echo "<td style='border: 2px solid black; padding: 8px;'>" . $row["department"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3' style='text-align:center;'>No records found</td></tr>"; // else print the message no records
    }
    
    $conn->close(); // closing the established connection
?>
    </table>
</body>
</html>
