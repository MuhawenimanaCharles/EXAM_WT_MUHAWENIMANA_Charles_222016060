<?php
include('connection.php');

// Check if Sale_ID is set
if (isset($_REQUEST['Sale_ID'])) {
  $Sale_ID = $_REQUEST['Sale_ID'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM sales WHERE Sale_ID=?");
  $stmt->bind_param("i", $Sale_ID);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $a = $row['Sale_ID'];
    $b = $row['Workshop_ID'];
    $c = $row['Attendee_ID'];
  } else {
    echo "sale not found.";
  }
}

$stmt->close(); // Close the statement after use

?>

<html>
<head>
    <title>Update sales form</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update  Usage resources form -->
    <h2><u>Update Form of sales</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="Workshop_ID">Workshop_ID :</label>
    <input type="number" name="Workshop_ID" value="<?php echo isset($b) ? $b : ''; ?>">
    <br><br>

    <label for="Attendee_ID">Attendee_ID :</label>
    <input type="text" name="Attendee_ID" value="<?php echo isset($c) ? $c : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $Workshop_ID = $_POST['Workshop_ID'];
  $Attendee_ID = $_POST['Attendee_ID'];
  // Update the instructor in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE sales SET Workshop_ID=?, Attendee_ID=? WHERE  Sale_ID=?");
  $stmt->bind_param("iis", $Workshop_ID, $Attendee_ID, $Sale_ID);
  $stmt->execute();

  // Redirect to resource_usage.php
  header('Location: sales.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
