<?php
session_start();
require 'Action/connection.php';

if (isset($_POST['delete_info'])) {
    $Serial = $_POST['delete_info'];

    $query = "DELETE FROM info WHERE Serial=?";
    $stmt = mysqli_prepare($_connections, $query);
    mysqli_stmt_bind_param($stmt, "i", $Serial);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $_SESSION['message'] = "Applicant Deleted Successfully";
    } else {
        $_SESSION['message'] = "Applicant Not Deleted";
    }
    mysqli_stmt_close($stmt);

    header("Location: AdM1.php");
    exit(0);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['status']) && isset($_POST['serial'])) {
    $status = $_POST['status'];
    $serial = $_POST['serial'];

    // Prepare an update statement
    $sql = "UPDATE info SET Status = ? WHERE Serial = ?";

    if ($stmt = $_connections->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("si", $status, $serial);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Close statement
            $stmt->close();

            // Close connection
            $_connections->close();

            // Redirect to a new location
            header("Location: AdM1.php");
            exit;
        } else {
            echo "Error updating status: " . $_connections->error;
            header("Location: AdM1.php");
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$_connections->close();
?>