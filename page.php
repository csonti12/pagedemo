
<?php 
/*Admin felület belépés*/
$host="localhost";
$user="root";
$password="";
$db="userlogin";
/* Ez PHP 7-től nincs, megtanultam.
mysqli_connect($host,$user,$password);
mysqli_select_db($host,$db);
*/
$mysqli= mysqli_connect($host, $user,$password,$db);
if(isset($_POST['username'])){
$uname=$_POST['username'];
$password=$_POST['password'];

/*
$sql="select * from loginform where User='".$uname."' AND Pass='".$password."' limit 1";
$result=mysqli_query($sql);
if(mysqli_num_rows($result)==1)
{
echo "Belépés Sikeres!";
exit();
}
else{
echo "Helytelen felhasználó vagy jelszó!";
exit();

}
}
*/
// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
// Perform query
if ($result = $mysqli -> query("select * from loginform where User='".$uname."' AND Pass='".$password."' limit 1")) 
{
  header('Location: http://localhost/demo/adminpage.php');
  
}

$mysqli -> close();

}

?>

<html>
	<head>
      <!-- Jelszó hide -->
      <script>
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
	<meta charset="hu">
	<link rel="stylesheet" href="page.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<body>
	<!-- Belépő form-->
<div class="wrapper fadeInDown">
  <div id="formContent">   
    <!-- Login Form -->
    <form method="POST" action="#">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Felhasználó">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="Jelszó" >
      <input type="submit" class="fadeIn fourth" value="Belépés">
      <br>
      <input type="checkbox" checked onclick="myFunction()"> Show Password
    </form>

   

  </div>
</div>

	</body>
</html>