<?php
$insert = false;
if(isset($_POST['name'])){
  //  Set connection variables
$server = "localhost";
$username = "root";
$password = "";
// create database connection
$con = mysqli_connect($server, $username, $password);
// check for connection success
if (!$con) {
    die("Connection to this database failed due to" .
    mysqli_connect_error());
}

// echo "Success connecting to the db";

// collect post variables
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;


// execute the query
if ($con->query($sql)== true) {
    // echo "Succesfully Inserted";

    // flag for successful connection
    $insert = true;
}
else {
    echo "ERROR : $sql <br> $con->error";

}
// close the database connection
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="picone.jpg" alt="bg Pic">
    <div class="container">
        <h1>Welcome to Pakistan travel Form</h1>
        <p>Enter your details to confirm your participation in trip.</p>
        <?php
        if($insert == true){
        echo "<p style='color:green;'>Thanks for submitting the form</p>";
        }
        ?>
        <form action="index.php" method="post">
          <input type="text" name="name" id="name" placeholder="Enter your name">
          <input type="text" name="age" id="age" placeholder="Enter your age">
          <input type="text" name="gender" id="gender" placeholder="Enter your gender">
          <input type="email" name="email" id="email" placeholder="Enter Your Email Address">
          <input type="phone" name="phone" id="phone" placeholder="Enter your Phone Number">
         
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Any Other information here"></textarea>
        <button class="btn">Submit</button>

    </form>
    </div>
    <script src="index.js"></script>
    <!-- --> 
</body>
</html>