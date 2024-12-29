<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset=“UTF-8” />
   <title>Edit Crop </title >
<link rel="stylesheet" type="text/css" href="style.css">

 </head >
<body >
<h1 > Edit Crop </h1 >

<?php
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   
   // Fetch existing crop data
   $result = $conn->query("SELECT * FROM Crop WHERE crop_id='$id'");
   
   if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
?>

<form method=“POST” action=“” >
      <!-- Pre-fill form fields with existing data -->
      <!-- Add hidden field to store crop ID -->
      <!-- Add submit button -->
 </form >

 <?php 
 // Handle Update Request 
 if ($_SERVER[‘REQUEST_METHOD’] == ‘POST’) { 
     // Get updated data from POST request 

     // Prepare SQL statement to update data in Crop table 

 }
 } else {
       echo "No crop found.";
 }
} else {
       echo "Invalid request.";
}
$conn->close();
?>
 </body >
 </html >
