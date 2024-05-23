<?php
include('connection.php');

// Check if Product_Id is set
if (isset($_REQUEST['Material_ID'])) {
  $Material_ID = $_REQUEST['Material_ID'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM materials WHERE Material_ID=?");
  $stmt->bind_param("i", $Material_ID);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $a = $row['Material_ID'];
    $b = $row['Resource_ID'];
    $c = $row['Format'];
  } else {
    echo "material not found.";
  }
}

$stmt->close(); // Close the statement after use

?>

<html>
<head>
    <title>Update material table form</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update products form -->
    <h2><u>Update Form of material</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="Resource_ID">Resource_ID :</label>
    <input type="number" name="Resource_ID" value="<?php echo isset($b) ? $b : ''; ?>">
    <br><br>

    <label for="Format">Format :</label>
    <input type="text" name="Format" value="<?php echo isset($c) ? $c : ''; ?>">
    <br><br>
    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $Resource_ID = $_POST['Resource_ID'];
  $Format = $_POST['Format'];
  // Update the instructor in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE materials SET Resource_ID=?, Format=? WHERE  Material_ID=?");
  $stmt->bind_param("sss", $Resource_ID, $Format, $Material_ID);
  $stmt->execute();

  // Redirect to product.php
  header('Location: material.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
