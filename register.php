<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

.container {
  padding: 16px;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>
<body style="background-color:black;">
  <form class="modal-content" action="register.php">
  <form action="register.php" method="POST">
    <div class="container">
      <h1><p style="color:White">Sign Up</p></h1>
      <p style="color:White">Please fill in this form to create an account.</p>
      <hr>
      <p style="color:White"><label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
	  
	  <p style="color:White"><label for="name"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="name" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      </p>

      <div class="clearfix">
        <button type="submit" class="signupbtn"><a href="login.php">Sign Up</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$email = ($_POST['email']);
$name = ($_POST['name']);
$password = ($_POST['password']);
$bool = true;
$db_name = "deliverydb";
$db_email = "root";
$db_pass = "";
$db_host = "localhost";
$con = mysqli_connect("$db_host","$db_email","$db_pass", "$db_name") or
die(mysqli_error()); //Connect to server
$query = "SELECT * from users";
$results = mysqli_query($con, $query); //Query the users table
while($row = mysqli_fetch_array($results)) //display all rows from query
{
$table_users = $row['email']; // the first email row is passed on to $table_users, and so on until the query is finished
if($email == $table_users) // checks if there are any matching fields
{
$bool = false; // sets bool to false
Print '<script>alert("email has been taken!");</script>'; //Prompts the user
Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
}
}
if($bool) // checks if bool is true
{
mysqli_query($con, "INSERT INTO users (email, password) VALUES
('$email','$password')"); //Inserts the value to table users
Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
}
}
?>
