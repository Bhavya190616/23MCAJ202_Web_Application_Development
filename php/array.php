<?php
// Step 1: Define an array with student names
$students = array("Bhavya", "Aditi", "Karan", "Rohan", "Meera");

// Step 2: Display the original array
echo "<h3>Original Array:</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";

// Step 3: Sort the array in ascending order and display
asort($students); // asort() maintains index association while sorting
echo "<h3>Sorted in Ascending Order (asort):</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";

// Step 4: Sort the array in descending order and display
arsort($students); // arsort() maintains index association while sorting in reverse
echo "<h3>Sorted in Descending Order (arsort):</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";
?>
