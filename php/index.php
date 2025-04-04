<?php
// Declare variables to store input values and error messages
$name = $email = $phone = $gender = $password = $confirmPassword = "";
$nameErr = $emailErr = $phnErr = $genderErr = $passwordErr = $confirmpasswordErr = "";

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required."; // If name is empty, store error
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST["name"])) {
        // Regular expression allows only letters and spaces
        $nameErr = "Only letters and spaces are allowed in the name.";
    } else {
        $name = htmlspecialchars($_POST["name"]); //  Remove special characters and store it safely
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required."; // If email is empty, show error
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        // FILTER_VALIDATE_EMAIL checks if the email is in a correct format this is a built in php rule also filter_var-->is a php function to check or clean data
        $emailErr = "Invalid email format.";
    } else {
        $email = htmlspecialchars($_POST["email"]); // Remove special characters and store it safely
    }

    // Validate Phone Number
    if (empty($_POST["phone"])) {
        $phnErr = "Phone number is required."; // If phone is empty, show error
    } elseif (!preg_match("/^[0-9]{10}$/", $_POST["phone"])) {
        // preg_match checks if phone has exactly 10 digits using a regular expression
        $phnErr = "Phone number must be exactly 10 digits.";
    } else {
        $phone = htmlspecialchars($_POST["phone"]); // Remove special characters and store it safely
    }

    // Validate Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required."; // If gender is not selected
    } else {
        $gender = $_POST["gender"]; // Assign the selected gender
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required."; // If no password entered
    } elseif (strlen($_POST["password"]) < 6) {
        // Check if password is at least 6 characters long
        $passwordErr = "Password must be at least 6 characters long.";
    } else {
        $password = $_POST["password"]; // Assign password
    }

    // Validate Confirm Password
    if (empty($_POST["confirmPassword"])) {
        $confirmpasswordErr = "Please confirm your password."; // If confirmation is empty
    } elseif ($_POST["password"] !== $_POST["confirmPassword"]) {
        // Check if both passwords match
        $confirmpasswordErr = "Passwords do not match.";
    } else {
        $confirmPassword = $_POST["confirmPassword"]; // Assign confirmation
    }

    // If no errors in any fields, show success message
    // If no errors in any fields, redirect to success page
if (
    empty($nameErr) && empty($emailErr) && empty($phnErr) &&
    empty($genderErr) && empty($passwordErr) && empty($confirmpasswordErr)
) {
    // Redirect to a simple success page
    header("Location: success.html");
    exit(); // Stop the script after redirection
}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style> /*this is for internal styling*/

        body {
            font-family: Arial, sans-serif;/*Font_family is used for the font style for the webpage*/
            background:  #8f94fb;/* used to give the background color for the whole page or inside the body tag*/
            display: flex;/* to make a container we use flex like a box*/
            justify-content: center;/*to align the contents along main axis here it is vertical*/
            align-items: center;/*align items to center*/
            height: 100vh;/* to make it in full screen*/
            margin: 0;/* removes default margin*/
        }
        .container {
            background: #7daaf8; /* background color for the form*/
            padding: 40px;/*gives equal spacing*/
            border-radius: 20px; /*gives a the border a curved appearance*/
            box-shadow: 0 8px 32px rgba(1, 49, 65, 0.8); /*the pixels are for horizontal shadow, vertical shadow,the blur effect and the shadow color*/
            width: 100%;/*width of the box*/
            max-width: 450px; /*max-width of the box*/
            
        }

        .form-group {
            margin-bottom: 10px;/* to add space below the tag*/
        }

        label {
            font-weight: bold;/*boldness of the text*/
            display: block;/*Takes up the full width of its container.*/
        }

        input, select {
            width: 100%;/*width of the box*/
            padding: 12px; /*gives equal spacing*/
            margin: 10px 0; /*gives space outside the element 10-top and bottom,0-left and right*/
            border: 2px;/*width of border*/
            border-radius: 10px; /*gives a the border a curved appearance*/
            font-size: 16px; /*size of the text*/
            color:black; /* assigns text color*/
            background: #f9f9f9; /*background for the box */
            display: inline;
        }

        .required {
            color: red;
            margin-left: 5px; /* Adds space between text and asterisk */
        }

        .error {
            color: red;/*gives color*/
            font-size: 14px;/*gives text size*/
        }

        button {
            background-color: #297ba7;/* background color for the button*/
            color: black;/* assigns text color*/
            padding: 11px;/*gives equal spacing*/
            border: none;/*for no border*/
            border-radius: 5px;/*gives a the border a curved appearance*/
            cursor: pointer;/*change the mouse pointer to hand symbol*/
            width: 100%;/*width of the button*/
        }

        button:hover {
            background-color: #0e25f6;/*when hovered the button changes to this color*/
        }
    </style>
</head>

<body>

<div class="container"><!--for division and also applying styles for group of tags-->
    <h2>Registration Form</h2><!--heading tag-->
    <form id="registrationForm"  method="POST"><!--creating a form and what action and function should be done when it is submitted--> <!-- This form submits the data to the same page (self-processing form)
         htmlspecialchars() is used to prevent XSS (cross-site scripting) attacks by escaping HTML special characters
         method="POST" means the form data will be sent in the body, not visible in the URL -->
        <div class="form-group">
            <label for="name">Full Name:<span class="required">*</span></label><!--gives a label for the field-->
            <input type="text" name="name"> <!--for entering user input-->
            <span class="error"><?php echo $nameErr;?> </span><!-- displays the error message stored in $nameErr-->
        </div>

        <div class="form-group">
            <label for="email">Email:<span class="required">*</span></label><!--gives a label for the field-->
            <input type="email" name="email"><!--for entering user input-->
            <span class="error"><?php echo $emailErr;?></span> <!-- Displays email validation error from PHP -->
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:<span class="required">*</span></label>
            <input type="text" name="phone"><!--for entering user input-->
            <span class="error"><?php echo $phnErr;?></span> <!-- Displays phone number error if the number isn't 10 digits -->
        </div>

        <div class="form-group">
            <label for="gender">Gender:<span class="required">*</span></label><!--gives a label for the field-->
            <select name="gender"><!--creates a drop down menu-->
                <option value="">Select</option><!--for the items inside the menu-->
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <span class="error"><?php echo $genderErr;?> </span>   <!-- Shows gender selection error -->
        </div>

        <div class="form-group">
            <label for="password">Password:<span class="required">*</span></label><!--gives a label for the field-->
            <input type="password" name="password"><!--for entering user input-->
            <span class="error"><?php echo $passwordErr;?></span> <!-- Displays error if password is too short or empty -->
        </div>

        <div class="form-group">
            <label for="confirmPassword">Confirm Password:<span class="required">*</span></label><!--gives a label for the field-->
            <input type="password" name="confirmPassword"><!--for entering user input-->
            <span class="error"><?php echo $confirmpasswordErr;?></span><!-- Shows error if the two passwords don't match -->
        </div>

        <button type="submit">Register</button><!--creates a button-->
    </form>
</div>
</body>
</html>