<?php
include 'Action/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the edited data
    $serial = $_POST['Serial'];
    $name = $_POST['name'];
    $vehicle = $_POST['Vehicle'];
    $date = $_POST['date'];
    $plate = $_POST['plate'];

    // Update the data in the database
    $sql = "UPDATE info SET Name='$name', Vehicle='$vehicle', DATE='$date', Plate='$plate' WHERE Serial='$serial'";

    if (mysqli_query($_connections, $sql)) {
        header("Location: index.php"); // Redirect back to the main page after updating data
        exit;
    } else {
        echo "Error updating data: " . mysqli_error($_connections);
    }
}

mysqli_close($_connections);
?>
