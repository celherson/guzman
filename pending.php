<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientId = $_POST['client_id'];
    $status = "Pending";

    // Perform database update
    $query = "UPDATE info SET Status='$status' WHERE Serial='$clientId'";
    $query_run = mysqli_query($_connections, $query);
    
    if ($query_run) {
        header("Location: index.php"); // Redirect to the main page
        exit();
    }
}
?>
