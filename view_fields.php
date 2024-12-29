<?php
include 'db.php'; // Include your database connection file

// Query to select all fields from the Field table
$sql = "SELECT field_id, field_name, location FROM Field";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Start the HTML table
    echo "<table border='1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Field ID</th>";
    echo "<th>Field Name</th>";
    echo "<th>Location</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['field_id'] . "</td>";
        echo "<td>" . $row['field_name'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "</tr>";
    }

    // Close the table body and table
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No records found.";
}

// Close the database connection
$conn->close();
?>
