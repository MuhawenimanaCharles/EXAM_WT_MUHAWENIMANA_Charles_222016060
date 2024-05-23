<?php
    // Connection details
    include('connection.php');

// Check if id is set
if(isset($_REQUEST['Resource_ID'])) {
    $Resource_ID = $_REQUEST['Resource_ID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM sales_training_resources WHERE Resource_ID=?");
    $stmt->bind_param("i", $Resource_ID);
    ?>
     <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="Resource_ID" value="<?php echo $Resource_ID; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br> 
             <a href='sales_training_resources.php'> go back to page</a>";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
}
?>
</body>
</html>
<?php

    $stmt->close();
} else {
    echo "id is not set.";
}

$connection->close();
?>
