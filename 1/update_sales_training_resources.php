<?php
include('connection.php');

// Check if Resource_ID is set
if (isset($_REQUEST['Resource_ID'])) {
  $Resource_ID = $_REQUEST['Resource_ID'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM sales_training_resources WHERE Resource_ID=?");
  $stmt->bind_param("i", $Resource_ID);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $a = $row['Resource_ID'];
    $b = $row['Title'];
    $c = $row['Description'];
  } else {
    echo "sale not found.";
  }
}

$stmt->close(); // Close the statement after use

?>

<html>
<head>
    <title>Update sales training resources form</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update  Usage resources form -->
    <h2><u>Update Form of sales training resources</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="Title">Title :</label>
    <input type="text" name="Title" value="<?php echo isset($b) ? $b : ''; ?>">
    <br><br>

    <label for="Description">Description :</label>
    <input type="text" name="Description" value="<?php echo isset($c) ? $c : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $Title = $_POST['Title'];
  $Description = $_POST['Description'];
  // Update the instructor in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE sales_training_resources SET Title=?, Description=? WHERE  Resource_ID=?");
  $stmt->bind_param("ssi", $Title, $Description, $Resource_ID);
  $stmt->execute();

  // Redirect to resource_usage.php
  header('Location: sales_training_resources.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
