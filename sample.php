<?php
include('Action/connection.php'); // Include your database connection logic

// Check if all required variables are set
if(isset($_POST['Serial']) && isset($_POST['name']) && isset($_POST['Vehicle']) && isset($_POST['date']) && isset($_POST['plate'])) {
    // Sanitize input to prevent SQL injection
    $serial = mysqli_real_escape_string($_connections, $_POST['Serial']);
    $name = mysqli_real_escape_string($_connections, $_POST['name']);
    $vehicle = mysqli_real_escape_string($_connections, $_POST['Vehicle']);
    $date = mysqli_real_escape_string($_connections, $_POST['date']);
    $plate = mysqli_real_escape_string($_connections, $_POST['plate']);
    
    // Execute the SQL query to insert data into the database
    $query = mysqli_query($_connections, "INSERT INTO info (Serial, Name, Vehicle, Date, `Plate`) VALUES ('$serial', '$name', '$vehicle', '$date', '$plate')");
    
    // Check if the query was successful
    if($query) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($_connections);
    }
} else {
    echo "One or more required fields are missing.";
}
?>
  <?php
include 'Action/connection.php';

// Define variables to avoid PHP notices
$serial = $name = $vehicle = $date = $plate = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the edited data
    $serial = $_POST['Serial'];
    $name = $_POST['Name'];
    $vehicle = $_POST['Vehicle'];
    $date = $_POST['DATE'];
    $plate = $_POST['Plate'];

    // Update the data in the database
    $sql = "UPDATE info SET Name='$name', Vehicle='$vehicle', DATE='$date', Plate='$plate' WHERE Serial='$serial'";

    if (mysqli_query($_connections, $sql)) {
        header("Location: AdM1.php"); // Redirect back to the main page after updating data
        exit;
    } else {
        echo "Error updating data: " . mysqli_error($_connections);
    }
}

// Fetch data from the database for the provided serial
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $serial = $_GET['id'];
    $sql = "SELECT * FROM info WHERE Serial='$serial'";
    $result = mysqli_query($_connections, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $name = $row['Name'];
        $vehicle = $row['Vehicle'];
        $date = $row['DATE'];
        $plate = $row['Plate'];
    } else {
        echo "No data found.";
    }
}

mysqli_close($_connections);
?>
      <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2>Edit Data</h2>
        <div class="content">
            <div class="fillup-box">
                <label for="name">Fullname</label>
                <input type="text" placeholder="fullname" name="Name" value="<?php echo $name; ?>">
            </div>
            <div class="fillup-box">
                <label for="Vehicle">VehicleType</label>
                <input type="text" placeholder="Vehicle Type" name="Vehicle" value="<?php echo $vehicle; ?>">
            </div>
            <div class="fillup-box">
                <label for="date">Date</label>
                <input type="date"  name="DATE" value="<?php echo $date; ?>">
            </div>
            <div class="fillup-box">
                <label for="plate">PlateNo#</label>
                <input type="text" placeholder="Plate Number" name="Plate" value="<?php echo $plate; ?>">
            </div>
            <div class="btn2">
                <input type="submit" placeholder="submit">
            </div>
        </div>
    </form>
    </div>