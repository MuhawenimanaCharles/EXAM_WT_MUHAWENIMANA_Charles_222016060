<?php
include('connection.php');

// Check if Product_Id is set
if (isset($_REQUEST['Attendee_ID'])) {
  $Attendee_ID = $_REQUEST['Attendee_ID'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM attendee WHERE Attendee_ID=?");
  $stmt->bind_param("i", $Attendee_ID);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $a = $row['Attendee_ID'];
    $b = $row['Workshop_ID'];
    $c = $row['Name'];
  } else {
    echo "attendee not found.";
  }
}

$stmt->close(); // Close the statement after use

?>

<html>
<head>
    <title>Update attendee tableform</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update products form -->
    <h2><u>Update Form of attendee</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="Workshop_ID">Workshop_ID:</label>
    <input type="number" name="Workshop_ID" value="<?php echo isset($b) ? $b : ''; ?>">
    <br><br>

    <label for="Name">Name:</label>
    <input type="text" name="Name" value="<?php echo isset($c) ? $c : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $Workshop_ID = $_POST['Workshop_ID'];
  $Name = $_POST['Name'];

  // Update the attendee in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE attendee SET Workshop_ID=?, Name=? WHERE  Attendee_ID=?");
  $stmt->bind_param("isi", $Workshop_ID, $Name, $Attendee_ID);
  $stmt->execute();

  // Redirect to product.php
  header('Location: attendee.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
