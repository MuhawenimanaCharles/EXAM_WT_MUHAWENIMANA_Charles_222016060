<?php
include('connection.php');

// Check if Workshop_ID is set
if (isset($_REQUEST['Workshop_ID'])) {
  $Workshop_ID = $_REQUEST['Workshop_ID'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM workshop WHERE Workshop_ID=?");
  $stmt->bind_param("i", $Workshop_ID);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $b = $row['Title'];
    $c = $row['Instructor_ID'];
    // Close the statement after use
    $stmt->close();
  } else {
    echo "Workshop not found.";
    exit(); // Exit script if workshop not found
  }
}

?>

<html>
<head>
    <title>Update Workshop Form</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update workshop form -->
    <h2><u>Update Form of Workshop</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="Title">Title:</label>
    <input type="text" name="Title" value="<?php echo isset($b) ? $b : ''; ?>">
    <br><br>

    <label for="Instructor_ID">Instructor ID:</label>
    <input type="number" name="Instructor_ID" value="<?php echo isset($c) ? $c : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $Title = $_POST['Title'];
  $Instructor_ID = $_POST['Instructor_ID'];

  // Update the workshop in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE workshop SET Title=?, Instructor_ID=? WHERE Workshop_ID=?");
  $stmt->bind_param("sii", $Title, $Instructor_ID, $Workshop_ID);
  $stmt->execute();

  // Redirect to workshop.php
  header('Location: workshop.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
