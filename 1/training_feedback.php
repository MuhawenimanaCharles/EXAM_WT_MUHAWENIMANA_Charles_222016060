<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>session attendance table</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;

      background-color: yellow;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1300px; /* Adjust this value as needed */

      padding: 8px;
     
    }
  </style>
   <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>
  
<header>
   

</head>

<body bgcolor="skyblue">
   <ul style="list-style-type: none; padding: 0;">
      <li style="display: inline; margin-right: 10px;"><a href="./home.html" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">HOME</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">ABOUT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">CONTACT</a></li>
  
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">TABLE FORMS</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="attendee.php">Attendee</a>
        <a href="workshop.php">Workshop</a>
        <a href="instructor.php">Instructor</a>
        <a href="material.php">Material</a>
        <a href="quizzes.php">Quizzes</a>
        <a href="resource_usage.php">resources usage</a>
        <a href="sales.php">Sales</a>
        <a href="sales_training_resources.php">Sales training resources</a>
        <a href="session_attendance.php">Session Attendance</a>
        <a href="training_feedback.php">Training Feedback</a>
      </div>

      <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">SIGN OUT</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="logout.php">Log out</a>
      </div>


    </li><br><br>
    </ul>

</header>
<section>
<h1>training feedback Form</h1>

    <form method="post" onsubmit="return confirmInsert();">
        <label for="Feedback_ID">Feedback_ID:</label>
        <input type="number" id="Feedback_ID" name="Feedback_ID"><br><br>

        <label for="Workshop_ID">Workshop_ID:</label>
        <input type="number" id="Workshop_ID" name="Workshop_ID" required><br><br>

        <label for="Attendee_ID">Attendee_ID:</label>
        <input type="number" id="Attendee_ID" name="Attendee_ID" required><br><br>

        <input type="submit" name="add" value="Insert">

    </form>

    <?php
    // Connection details
    include('connection.php');


    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind parameters with appropriate data types
        $stmt = $connection->prepare("INSERT INTO training_feedback (Feedback_ID,Workshop_ID,Attendee_ID) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $Feedback_ID,$Workshop_ID,$Attendee_ID);

        // Set parameters from POST data with validation (optional)
        $Feedback_ID = intval($_POST['Feedback_ID']); // Ensure integer for ID
        $Workshop_ID = htmlspecialchars($_POST['Workshop_ID']); // Prevent XSS
        $Attendee_ID = htmlspecialchars($_POST['Attendee_ID']); // Prevent XSS
        // Execute prepared statement with error handling
        if ($stmt->execute()) {
            echo "New record has been added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $connection->close();
    ?>

<?php
// Connection details
include('connection.php');

// SQL query to fetch data from category table
$sql = "SELECT * FROM training_feedback";
$result = $connection->query($sql);

?>
<h2>Data for training feedback Form</h2>
    <table border="1">
        <tr>
            <th>Feedback ID</th>
            <th>Workshop ID</th>
            <th>Attendee ID</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        // Define connection parameters
        include('connection.php');


        // Prepare SQL query to retrieve customer.
        $sql = "SELECT * FROM training_feedback";
        $result = $connection->query($sql);

        // Check if there are any product
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $Feedback_ID = $row['Feedback_ID']; // Fetch the Id
                echo "<tr>
                    <td>" . $row['Feedback_ID'] . "</td>
                    <td>" . $row['Workshop_ID'] . "</td>
                    <td>" . $row['Attendee_ID'] . "</td>
                    <td><a style='padding:2px' href='delete_training_feedback.php?Feedback_ID=$Feedback_ID'>Delete</a></td> 
                    <td><a style='padding:2px' href='update_training_feedback.php?Feedback_ID=$Feedback_ID'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
  </body>
    </section>

  
<footer>
  <center> 
    <b><h2>UR CBE BIT &copy, 2024 & reg, Designer by: @ muhawenimana charles</h2></b>
  </center>
</footer>
</body>
</html>