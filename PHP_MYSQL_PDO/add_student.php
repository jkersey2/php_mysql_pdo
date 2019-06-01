<!--Jeff R Kersey CIT 241 Program 3-->

<!DOCTYPE html> <html lang="en">  
<head> <meta charset="UTF-8"> 
<title>insert & delete test</title>  
</head><body> 
<title>Student Roster</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<h1>Student Roster</h1>

<p>
<form action="add_student.php" method="post">
       
    <input type="text" name="sid"  size="5">
    <label> Student ID</label><br /><br>

    <input type="text" name="name"  size="15" />
    <label> Name:</label><br /><br>

    <input type="text" name="midterm" size="5" />
    <label> Midterm</label><br /><br>

    <input type="input" name="final" v size="5" />
    <label> Final</label><br /><br>

    <input type="submit" name="submit"  /> <br />
    <br>

</form>
</p>
<?php
if(isset($_POST['submit'])){
$dsn= "mysql:dbname=C241Students; charset=utf8"; 
$dbuser = 'root';
$dbpass = 'mysql';

try{
	$conn = new PDO($dsn, $dbuser, $dbpass);
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$conn->beginTransaction();
	$conn->exec("INSERT INTO grades ( sid, name, midterm, final) VALUES ('".$_POST["sid"]."','".$_POST["name"]."','".$_POST["midterm"]."','".$_POST["final"]."')");
	$conn->commit();
}
catch (PDOException $e ){
	echo "Connection failed: " . $e->getMessage();
}



}
$conn = null;
?>

<a href ="index.php">Display Students</a>
</body>
</html>
