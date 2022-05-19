<?php 
  include 'function.php';

?>

<!DOCTYPE html>
<link rel="stylesheet" href="style.css" type="text/css">


<html>
<body>

<form action="back.php" method="POST">

  <label for="fname">Name:</label><br>
  <input type="text" id="fname" name="name"><br>
  <label for="lname">Course:</label><br>
  <input type="text" id="lname" name="course"><br><br>
  <label for="fname">Year:</label><br>
  <input type="text" id="fname" name="year"><br>
  <label for="lname">Gender:</label><br>
  <input type="text" id="lname" name="gender"><br><br>

  <input type="submit" value="Submit" name="submit">
</form> 

<h2>View Database</h2>
<table>
  <tr>
    <th>Name</th>
    <th>Year</th>
    <th>Gender</th>
    <th>Course</th>
    <th>Option</th>
  </tr>

<?php $query = "SELECT * FROM `account`";

$result = $conn->query($query);

if ($result->num_rows > 0) 
    {
        // OUTPUT DATA OF EACH ROW
        while($row = $result->fetch_assoc())
        {
          ?> 

<form action="back.php" method="post">
            
              <tr> 
              <input type="hidden" value="<?php echo $row["ID"]?>" name="id">
              <td><?php echo $row["name"] ?></td>
              <td><?php echo $row["year"] ?></td>
              <td><?php echo $row["course"] ?></td>
              <td><?php echo $row["gender"] ?></td>
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