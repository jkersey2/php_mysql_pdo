<!--Jeff R Kersey CIT 241 Program 3-->

<!DOCTYPE html> <html lang="en">  
<head> <meta charset="UTF-8"> 
<title>Add Students</title>  
</head><body> 

<h1>Add a Student</h1>

<?php

$dsn= "mysql:dbname=C241Students; charset=utf8"; 
$dbuser = 'root';
$dbpass = 'mysql';


try{
	$connect = new PDO($dsn, $dbuser, $dbpass);
	$connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

}
catch (PDOException $e ){
	echo "Connection failed: " . $e->getMessage();
}

$sql = "SELECT sid, name, midterm, final FROM grades";


try { 
      echo "<table border= 1px cellspacing='20'>";     
      echo "<tr><th>ID</th><th>Name</th><th>Midterm</th><th>Final</th><th>Average</th></tr>"; 
      $connect->beginTransaction();
      $avg = ($midterm + $final) / 2;
      $rows = $connect->query( $sql );      // get the collection of rows 
      foreach ( $rows as $row ) { 
          $result =round((($row['midterm']+$row['final'])/2), 1);
         
          echo "<tr>"; 
          echo "<td>" . $row['sid'] . "</td> <td> {$row['name']}</td><td> {$row['midterm']} </td> <td> {$row['final']} </td> <td>$result</td>";
          echo "</tr>"; 
         
      } 

} catch ( PDOException $e ) { 
    echo "Query failed: " . $e->getMessage(); 
} 

echo "</table>"; 
$connect = null;   // close the connection 
?> 
<br>
<a href ="add_student.php">Add Students</a>
</body></html>