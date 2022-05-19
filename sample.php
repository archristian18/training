<?php 
include ('db.php');

?>

<!DOCTYPE html>
<link rel="stylesheet" href="style.css" type="text/css">


<html>
<body>

<form action="back.php" method="POST" enctype="multipart/form-data">

  <label for="fname">Name:</label><br>
  <input type="text" id="fname" name="name" require><br>
  <label for="lname">Course:</label><br>
  <input type="text" id="lname" name="course" require><br><br>
  <label for="fname">Year:</label><br>
  <input type="text" id="fname" name="year" require><br>
  <label for="lname">Gender:</label><br>
  <input type="text" id="lname" name="gender" require><br><br>
  <input type="file" name="fileToUpload" id="fileToUpload" require>
  <br><br>
  <input type="submit" value="Submit" name="submit">

</form> 

<h2>View Database</h2>
<table>
  <tr>
    <th>Name</th>
    <th>Year</th>
    <th>Gender</th>
    <th>Course</th>
    <th>Image</th>
    <th>Option</th>
  </tr>

<?php

$query = "SELECT * FROM `account`";

$result = $conn->query($query);

if ($result->num_rows > 0) 
    {
        // OUTPUT DATA OF EACH ROW
        foreach ($result as $row)
        {
          ?> 

<form action="back.php" method="post">
            
              <tr> 
              <input type="hidden" value="<?php echo $row["ID"]?>" name="id">
              <td><?php echo $row["name"] ?></td>
              <td><?php echo $row["year"] ?></td>
              <td><?php echo $row["course"] ?></td>
              <td><?php echo $row["gender"] ?></td>
              <td><?php echo '<img src="./image/'.$row["image"].'" width=100, height=100>' ?> </td>

              <td> <input class="button" type="submit" value="Delete" name="delete">

              <a href="edit.php?id=<?=$row['ID'];?>" class="button">Edit</a>
              </td> 
            
            
            </form>
            </tr>
<?php 

        }
    } 

    ?>
  



</table>





</body>
</html>