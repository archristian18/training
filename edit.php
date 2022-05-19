<?php 

include ('db.php');

?>

<!DOCTYPE html>
<link rel="stylesheet" href="style.css" type="text/css">


<html>
<body>

<?php 

$newId = $_GET['id'];
// echo $newId;

$query = "SELECT * FROM `account` WHERE ID = $newId ";

$result = $conn->query($query);

if ($result->num_rows > 0) 
    {
        // OUTPUT DATA OF EACH ROW
        while($row = $result->fetch_assoc())
        {
          ?> 


<form action="back.php" method="POST">

  <input type="hidden" name="id" value="<?php echo $row["ID"] ?>"><br>
  <label for="fname">Name: </label><br>
  <input type="text" name="name" value="<?php echo $row["name"] ?>"><br>
  <label for="lname">Course:</label><br>
  <input type="text" name="course" value="<?php echo $row["course"] ?>"><br><br>
  <label for="fname">Year:</label><br>
  <input type="text" name="year" value="<?php echo $row["year"] ?>" ><br>
  <label for="lname">Gender:</label><br>
  <input type="text" name="gender" value="<?php echo $row["gender"] ?>"><br><br>

  <input type="submit" value="Submit" name="edit">
</form> 

<?php 

        }
    } 

    ?>


</body>
</html>