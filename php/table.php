<?php
// Array of Indian Cricket Players
$players = array(
    "Virat Kohli",
    "Rohit Sharma",
    "MS Dhoni",
    "Sachin Tendulkar",
    "Jasprit Bumrah",
    "Yuvraj Singh",
    "Hardik Pandya",
    "Shubman Gill",
    "KL Rahul",
    "Ravindra Jadeja"
);
?>


<!DOCTYPE html>
<head>
</head>


<body style="background-color: rgb(173, 202, 228);"> <!--gives background color-->

    <!-- A div container to hold the page title -->
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px;">
        <h1 style="margin: 0;">Indian Cricket Players</h1> <!--Main heading of the page-->
    </div>

    <!-- Creating a table with border and centering it on the page -->
    <table style="border: 2px solid black; margin: auto;">
        <tr> <!-- Table row for headings -->
            <!-- Table heading for Serial Number -->
            <th style="border: 2px solid black;">S.No</th>
            <!-- Table heading for Player Name -->
            <th style="border: 2px solid black;">Player Name</th>
        </tr>

        <?php
        $serial = 1; // Initialize serial number to 1

        // Loop through each player in the array
        foreach ($players as $player) {
            echo "<tr>"; // Start a new table row
            echo "<td style='border: 2px solid black;'>$serial</td>"; // Display serial number in a cell
            echo "<td style='border: 2px solid black;'>$player</td>"; // Display player name in a cell
            echo "</tr>"; // End of table row
            $serial++; // Increase serial number by 1
        }
        ?>
    </table>

</body>
</html>
