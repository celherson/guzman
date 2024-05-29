<?php
// Include your database connection logic
include('Action/connection.php');

// Check if all required variables are set
if(isset($_POST['name'], $_POST['Vehicle'], $_POST['date'], $_POST['plate'])) {
    // Sanitize input to prevent SQL injection
    $name = mysqli_real_escape_string($_connections, $_POST['name']);
    $vehicle = mysqli_real_escape_string($_connections, $_POST['Vehicle']);
    $date = mysqli_real_escape_string($_connections, $_POST['date']);
    $plate = mysqli_real_escape_string($_connections, $_POST['plate']);
    
    // Check if the plate already exists
    $check_plate_query = "SELECT * FROM info WHERE Plate = '$plate'";
    $check_plate_result = mysqli_query($_connections, $check_plate_query);
    
    if (mysqli_num_rows($check_plate_result) > 0) {
        echo "<div id='message-box' class='message-box' style='color: red;'>Plate already exists. Please enter a different plate.</div>";
        // Redirect back to the index page after 3 seconds
        echo "<script>setTimeout(function(){ window.location.href = 'Adm1Form.php'; }, 3000);</script>";
    } else {
        // Execute the SQL query to insert data into the database
        $query = mysqli_query($_connections, "INSERT INTO info (Name, Vehicle, DATE, Plate) VALUES ('$name', '$vehicle', '$date', '$plate')");
        
        // Check if the query was successful
        if($query) {
            // Redirect back to the page displaying the table
            header("Location: AdM1.php");
            exit();
        } else {
            echo "Error: <div style='color:red'> " . mysqli_error($_connections);
            // Redirect back to the index page after 3 seconds
            echo "<script>setTimeout(function(){ window.location.href = 'Adm1Form.php'; }, 3000);</script>";
        }
    }
} else {
    echo "<div id='message-box' class='message-box'>One or more required fields are missing.";
    // Redirect back to the index page after 3 seconds
    echo "<script>setTimeout(function(){ window.location.href = 'Adm1Form.php'; }, 3000);</script>";
}
?>
<script>
    // Function to hide the message box after 3 seconds
    setTimeout(function(){
        var messageBox = document.getElementById('message-box');
        messageBox.style.display = 'none';
    }, 3000); // 3000 milliseconds = 3 seconds
</script>

<style>
    .message-box {
    border: 2px solid #000;
    padding: 20px;
    width: 300px;
    margin: 0 auto;
    text-align: center;
    background-color: #f0f0f0;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    border-radius: 15px;
}

</style>
