<?php
    // Include your database connection logic
    include('Action/connection.php');

    if (isset($_GET['confirm']) && $_GET['confirm'] == 'Yes' && isset($_GET['serial'])) {
        $serial = $_GET['serial'];
        
        // Delete the record
        $query = "DELETE FROM info WHERE Serial = $serial";
        $result = mysqli_query($_connections, $query);

        if ($result) {
            echo "<div id='message-box' class='message-box'>Pogi ako kaya na delete</div>";
        } else {
            echo '<script>alert("Error deleting record: ' . mysqli_error($_connections) . '");</script>';
        }
    }

    // Redirect back to the main page
    header("Location: AdM1.php");
    exit();
   
?>

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

<script>
    // Function to hide the message box after 3 seconds
    setTimeout(function(){
        var messageBox = document.getElementById('message-box');
        messageBox.style.display = 'none';
    }, 1000); // 3000 milliseconds = 3 seconds
</script>
