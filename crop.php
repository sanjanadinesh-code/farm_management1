<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Crop Management</title>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1>Crop Management</h1>

<form method="POST" action="">
   <input type="text" name="crop_name" placeholder="Crop Name" required pattern="[A-Za-z\s]+" title="Only letters allowed">
   <input type="text" name="planting_season" placeholder="Planting Season">
   <input type="text" name="harvesting_season" placeholder="Harvesting Season">
   <input type="number" step=".01" name="yield_per_acre" placeholder="Yield per Acre">
   <button type="submit">Add Crop</button>
</form>

<?php
// Handle Crop Insertion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['delete_id'])) {
   // Retrieve form data and escape for security
   $crop_name = mysqli_real_escape_string($conn, $_POST['crop_name']);
   $planting_season = mysqli_real_escape_string($conn, $_POST['planting_season']);
   $harvesting_season = mysqli_real_escape_string($conn, $_POST['harvesting_season']);
   $yield_per_acre = mysqli_real_escape_string($conn, $_POST['yield_per_acre']);

   // Prepare the SQL insert statement
   $sql = "INSERT INTO Crop (crop_name, planting_season, harvesting_season, yield_per_acre) VALUES ('$crop_name', '$planting_season', '$harvesting_season', '$yield_per_acre')";

   // Execute the query and check for success
   if ($conn->query($sql) === TRUE) {
       echo "<script>alert('New crop added successfully.');</script>";
       header("Location: crop.php"); // Redirect to avoid resubmission on refresh
       exit();
   } else {
       echo "<script>alert('Error adding crop: " . $conn->error . "');</script>";
   }
}

// Handle Delete Request (this part is also removed since we are not displaying existing crops)
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
//    $delete_id = $_POST['delete_id'];
//    $sql = "DELETE FROM Crop WHERE crop_id = '$delete_id'";
//    if ($conn->query($sql) === TRUE) {
//        echo "<script>alert('Crop deleted successfully.');</script>";
//        header("Location: crop.php"); // Redirect to crop.php after deletion
//        exit();
//    } else {
//        echo "<script>alert('Error deleting crop: " . $conn->error . "');</script>";
//    }
// }

$conn->close();
?>
</body>
</html>
