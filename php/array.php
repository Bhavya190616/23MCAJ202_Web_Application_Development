<?php
//  Define an array with student names
$students = array("Bhavya", "Gowtam", "Krishna", "Rohit", "Meera","Bhagya");

//  Display the original array
echo "<h3>Original Array:</h3>";
echo "<pre>";/* used for preformatted text or we can say used for giving linebreak here */
print_r($students);
echo "</pre>";

// Step 3: Sort the array in ascending order and display
asort($students); // asort() used to sort associative array in ascending order using the value items
echo "<h3>Sorted in Ascending Order (asort):</h3>";
echo "<pre>";/* used for preformatted text or we can say used for giving linebreak here */
print_r($students);
echo "</pre>";

// Step 4: Sort the array in descending order and display
arsort($students); // asort() used to sort associative array in descending order using the value items
echo "<h3>Sorted in Descending Order (arsort):</h3>";
echo "<pre>";/* used for preformatted text or we can say used for giving linebreak here */
print_r($students);
echo "</pre>";
?>
