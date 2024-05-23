<?php
include('connection.php');

// Check if Product_Id is set
if (isset($_REQUEST['Instructor_ID'])) {
  $Instructor_ID = $_REQUEST['Instructor_ID'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM instructor WHERE Instructor_ID=?");
  $stmt->bind_param("i", $Instructor_ID);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $a = $row['Instructor_ID'];
    $b = $row['Name'];
    $c = $row['Email'];
  } else {
    echo "instructor not found.";
  }
}

$stmt->close(); // Close the statement after use

?>

<html>
<head>
    <title>Update instructor tableform</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update products form -->
    <h2><u>Update Form of instructor</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="Name">Name :</label>
    <input type="text" name="Name" value="<?php echo isset($b) ? $b : ''; ?>">
    <br><br>

    <label for="Email">Email :</label>
    <input type="text" name="Email" value="<?php echo isset($c) ? $c : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $Name = $_POST['Name'];
  $Email = $_POST['Email'];
  // Update the instructor in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE instructor SET Name=?, Email=? WHERE  Instructor_ID=?");
  $stmt->bind_param("sss", $Name, $Email, $Instructor_ID);
  $stmt->execute();

  // Redirect to product.php
  header('Location: instructor.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
