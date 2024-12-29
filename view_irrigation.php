<?PHP include 'db.php'; ?>

<!DOCTYPE html lang=‘en’ >
<head ><meta charset=‘UTF-8’ ><title>View Irrigation Data:</title ><link rel=‘stylesheet’ href=‘style.css’ ></head ><body >

<h1>Irrigation Data Available:</h1 >

<?PHP 
$sql = "SELECT * FROM irrigation"; // Adjust table name as necessary:
$result = $conn->query($sql);

if ($result -> num_rows > 0): ?>
<table ><tr ><th>Irrigation ID:</th ><th>Field ID:</th ><th>Total Water Used (liters):< / th >< th>Irrigation Date:< / th ></ tr >< ? PHP while ($ row =$ result -> fetch_assoc()): ?>< tr >< td > <? PHP echo htmlspecialchars( $ row[ ‘irrigation_id ’ ] ); ?> </ td >< td > <? PHP echo htmlspecialchars( $ row[ ‘field_id ’ ] ); ?> </ td >< td > <? PHP echo htmlspecialchars( $ row[ ‘total_water_used ’ ] ); ?> </ td >< td > <? PHP echo htmlspecialchars( $ row[ ‘irrigation_date ’ ] ); ?> </ td ></ tr > <? PHP endwhile; ?> </ table > <? PHP else: ?> 

<p>No irrigation data available.</ p > <? PHP endif; ?> 

<a href=‘index.php’ > Back to Home:</ a><!-- Link back to home --> 
<? PHP 
$conn -> close(); 
?>
 
 </body ></html >

