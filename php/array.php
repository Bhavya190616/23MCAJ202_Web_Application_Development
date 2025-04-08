<?php
//  Define an array with student names
$students = array("Bhavya", "Gowtam", "Krishna", "Rohit", "Meera","Bhagya");

//  Display the original array
echo "<h3>Array of the students:</h3>";//printing the string
for($i=0;$i<count($students);$i++){//simple for loop for iterating and printing the array one by one
    print_r($students[$i]);// To print in human readable form
    echo "<br>";//for line break
}

// Sort the array in ascending order and display
asort($students); // asort() used to sort associative array in ascending order using the value items
echo "<h3>Ascending Order of the array:</h3>";//printing the string
foreach($students as $student){//for each loop is used because after sorting with asort the keys may not be in the same order but this loop will go through every item irrespective of the position of the key
    print_r($student);// To print in human readable form
    echo "<br>";//for line break
}

// Step 4: Sort the array in descending order and display
arsort($students); // asort() used to sort associative array in descending order using the value items
echo "<h3>Descending Order of the array:</h3>";//printing the string
foreach($students as $student){//for each loop is used because after sorting with arsort the keys may not be in the same order but this loop will go through every item irrespective of the position of the key
    print_r($student);// To print in human readable form
    echo "<br>";//for line break
}
?>
