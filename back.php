<?php
 include ('db.php');



// SUBMIT Start
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $course= $_POST['course'];
    $year= $_POST['year'];
    $gender = $_POST['gender'];
    echo "<br>";
    echo $name, $year, $course, $gender;

$num = 1;


$filename = $_FILES["fileToUpload"]["name"];
$tempname = $_FILES["fileToUpload"]["tmp_name"];
$folder = "image/".$filename;


$sql = "INSERT INTO account (`name`, `year`, `gender`, `course`, `image`)
VALUES ('$name', '$year','$gender', '$course', '$filename')";
    if (mysqli_query($conn, $sql)){

    // to move the file picture 
    move_uploaded_file($tempname, $folder); 
        

    echo "Succesfully";
    header("Location: index.php");
    }
    else{
    echo "Not Succesfully";
    }

}

else{
    // echo "Not Successfully Submit";
}
// Submit End


// Delete Start
if(isset($_POST['delete'])){
       $newId = $_POST['id'];
       
       echo $newId;

    $sql = " DELETE FROM `account` WHERE `ID` = '$newId' ";
    if (mysqli_query($conn, $sql)){
        echo "Succesfully";
        header("Location: index.php");
    }
    else{
        echo "Not Succesfully";
    }

}

else{
    // echo "Not Successfully Delete";
}
// Delete End


// Update Start
if(isset($_POST['edit'])){

     $newId = $_POST['id'];
     $name = $_POST['name'];
     $course = $_POST['course'];
     $year = $_POST['year'];
     $gender = $_POST['gender'];


    $sql = " UPDATE `account` SET `name`= '$name',`year`= '$year',`gender`= '$gender',`course`= '$course' WHERE ID = '$newId' ";
    if (mysqli_query($conn, $sql)){
        echo "Succesfully";
        header("Location: index.php");
    }
    else{
        echo "Not Succesfully";
    }




}

else{
 echo "Not Successfully Edit";
}
// Update End



    ?>