<?php
include('connection.php');

// Check if Product_Id is set
if (isset($_REQUEST['Usage_ID'])) {
  $Usage_ID = $_REQUEST['Usage_ID'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM resources_usage WHERE Usage_ID=?");
  $stmt->bind_param("i", $Usage_ID);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $a = $row['Usage_ID'];
    $b = $row['Workshop_ID'];
    $c = $row['Resource_ID'];
  } else {
    echo "resources not found.";
  }
}

$stmt->close(); // Close the statement after use

?>

<html>
<head>
    <title>Update Usage resources table form</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update products form -->
    <h2><u>Update Form of Usage resources</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="Workshop_ID">Workshop_ID :</label>
    <input type="number" name="Workshop_ID" value="<?php echo isset($b) ? $b : ''; ?>">
    <br><br>

    <label for="Resource_ID">Resource_ID :</label>
    <input type="text" name="Resource_ID" value="<?php echo isset($c) ? $c : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $Workshop_ID = $_POST['Workshop_ID'];
  $Resource_ID = $_POST['Resource_ID'];
  // Update the instructor in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE resources_usage SET Workshop_ID=?, Resource_ID=? WHERE  Usage_ID=?");
  $stmt->bind_param("iis", $Workshop_ID, $Resource_ID, $Usage_ID);
  $stmt->execute();

  // Redirect to resource_usage.php
  header('Location: resource_usage.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
