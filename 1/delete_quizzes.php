<?php
    // Connection details
    include('connection.php');

// Check if id is set
if(isset($_REQUEST['Quiz_ID'])) {
    $Quiz_ID = $_REQUEST['Quiz_ID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM quizzes WHERE Quiz_ID=?");
    $stmt->bind_param("i", $Quiz_ID);
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
            <input type="hidden" name="Quiz_ID" value="<?php echo $Quiz_ID; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br> 
             <a href='quizzes.php'> go back to page</a>";
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
