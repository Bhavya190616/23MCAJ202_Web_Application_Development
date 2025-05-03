<?php
// Connect to the MySQL database (host, username, password, database name)
$conn = new mysqli("localhost", "root", "", "book");

// If connection fails, stop the script and show an error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  // Display connection error message if connection fails
}

// Handle form submission for adding books (when the "Add Book" button is clicked)
if (isset($_POST['add_book'])) {
    // Get the input values from the form
    $accession_no = $_POST['accession_no'];  // Get the accession number
    $title = $_POST['title'];                // Get the book title
    $authors = $_POST['authors'];            // Get the authors' names
    $edition = $_POST['edition'];            // Get the edition of the book
    $publisher = $_POST['publisher'];        // Get the publisher's name

    // SQL query to insert the new book into the "books" table
    $sql = "INSERT INTO books (accession_no, title, authors, edition, publisher) 
            VALUES ('$accession_no', '$title', '$authors', '$edition', '$publisher')";
    
    // If the query is successful, inform the user, otherwise show an error message
    if ($conn->query($sql) === TRUE) {
        echo "<p>Book added successfully!</p>";  // Confirmation message if book is added
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";  // Error message if the query fails
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Search and Add Book</title>
    <style>
        /* Page background and text styling */
        body {
            font-family: Arial, sans-serif;        /* Set the font for the page */
            background-color: #f4f6f8;             /* Set a light grey background */
            padding: 20px;                         /* Add padding around the content */
            text-align: center;                    /* Center align text on the page */
        }

        /* Box for the form */
        .form-box {
            background-color: #ffffff;             /* Set a white background for the form box */
            padding: 20px;                         /* Add padding inside the box */
            margin: auto;                          /* Center the form box */
            width: 400px;                          /* Set a fixed width for the form box */
            border-radius: 8px;                    /* Round the corners of the box */
            box-shadow: 0 0 10px rgba(0,0,0,0.1);   /* Add a subtle shadow around the box */
        }

        /* Input box styling */
        input[type="text"], input[type="number"] {
            width: 90%;                            /* Set the width of the input boxes */
            padding: 10px;                         /* Add padding inside the input boxes */
            margin-top: 10px;                      /* Add space above the input box */
            border: 1px solid #ccc;                /* Add a light grey border around the input box */
            border-radius: 5px;                    /* Round the corners of the input box */
        }

        /* Submit button style */
        input[type="submit"] {
            margin-top: 15px;                      /* Add space above the button */
            padding: 10px 20px;                    /* Set the padding inside the button */
            background-color: #1d4ed8;             /* Set the background color of the button */
            color: white;                          /* Set the text color to white */
            border: none;                          /* Remove the default border */
            border-radius: 5px;                    /* Round the corners of the button */
            cursor: pointer;                       /* Change the cursor to a pointer on hover */
        }

        /* Button hover effect */
        input[type="submit"]:hover {
            background-color: #2563eb;             /* Change the background color on hover */
        }

        /* Table style for displaying results */
        table {
            width: 90%;                            /* Set the table width */
            margin: 30px auto;                     /* Center the table with top margin */
            border-collapse: collapse;             /* Remove the space between table cells */
        }

        /* Table cell and header styling */
        th, td {
            padding: 12px;                         /* Add padding inside the cells */
            border: 1px solid #ccc;                /* Add a light grey border around the cells */
            text-align: center;                    /* Center align the text inside the cells */
        }

        /* Table header styling */
        th {
            background-color: #e5e7eb;             /* Set a light grey background color for table headers */
        }

        /* Heading styling */
        h2 {
            color: #1f2937;                        /* Set the color of headings */
        }
    </style>
</head>
<body>

<!-- Form to add a new book -->
<div class="form-box">
    <h2>Add a New Book</h2>
    <form method="post"> <!-- Form method is POST to submit data securely -->
        <input type="number" name="accession_no" placeholder="Enter Accession Number" required> <!-- Input for accession number -->
        <br>
        <input type="text" name="title" placeholder="Enter Book Title" required> <!-- Input for book title -->
        <br>
        <input type="text" name="authors" placeholder="Enter Author(s)" required> <!-- Input for authors -->
        <br>
        <input type="text" name="edition" placeholder="Enter Edition" required> <!-- Input for book edition -->
        <br>
        <input type="text" name="publisher" placeholder="Enter Publisher" required> <!-- Input for publisher -->
        <br>
        <input type="submit" name="add_book" value="Add Book"> <!-- Submit button to add the book -->
    </form>
</div>

<!-- Form to search for a book -->
<div class="form-box">
    <h2>Search for a Book</h2>
    <form method="post"> <!-- Form method is POST to submit data securely -->
        <input type="text" name="search_title" placeholder="Enter book title" required> <!-- Input for book title search -->
        <br>
        <input type="submit" name="search" value="Search"> <!-- Submit button to search for books -->
    </form>
</div>

<?php
// If the user clicked the "Search" button
if (isset($_POST['search'])) {
    // Get the title input from the user
    $search_title = $_POST['search_title'];  // Get the search title entered by the user

    // SQL query to search for books matching the title
    $sql = "SELECT * FROM books WHERE title LIKE '%$search_title%'"; // Query to search books
    $result = $conn->query($sql); // Execute the SQL query

    // If matching books were found
    if ($result->num_rows > 0) {
        echo "<h2>Search Results</h2>";  // Heading for search results
        echo "<table>";  // Start the table
        echo "<tr>
                <th>Accession No</th>
                <th>Title</th>
                <th>Authors</th>
                <th>Edition</th>
                <th>Publisher</th>
              </tr>"; // Table headers

        // Loop through all matching books and display them
        while($row = $result->fetch_assoc()) {
            echo "<tr>";  // Start a new table row
            echo "<td>" . $row['accession_no'] . "</td>";  // Display the accession number
            echo "<td>" . $row['title'] . "</td>";         // Display the book title
            echo "<td>" . $row['authors'] . "</td>";       // Display the authors
            echo "<td>" . $row['edition'] . "</td>";       // Display the edition
            echo "<td>" . $row['publisher'] . "</td>";     // Display the publisher
            echo "</tr>";  // End the table row
        }

        echo "</table>";  // End of the table
    } else {
        echo "<p>No books found with that title.</p>";  // Message if no books match the search
    }
}
?>

</body>
</html>
