<?php
/*http://stackoverflow.com/questions/2235434/how-to-generate-a-random-long-salt-for-use-in-hashing*/
$mysqli = new mysqli('localhost', 'root', 'root', 'projektarbete');

if ($mysqli-> connect_error)
  {
    die("Connection failed: ".$mysqli->connect_error);
  }

$inputEmail = isset ($_POST["logEmail"]) ? $_POST["logEmail"] : '';
$databaseEmail = "SELECT salt FROM registrate WHERE email = '$inputEmail'";
$result = $mysqli->query($databaseEmail);
$row = mysqli_fetch_row($result);
$salt = $row[0];

$password = isset ($_POST["logPassword"]) ? $_POST["logPassword"] : '';
$hashpassword = ("SELECT password FROM registrate WHERE email ='$inputEmail'");
$result2 = $mysqli->query($hashpassword);
$finalpassword = mysqli_fetch_array($result2);
$finalpassword = $finalpassword[0];

$checkpassword = md5($password . $salt);

if($finalpassword == $checkpassword)
{
  session_start();
  $_SESSION['user'] = $inputEmail;
  echo "Inloggning lyckades! " . $inputEmail;
  //echo "<script>setTimeout(\"location.href = 'http://localhost:8888/Labb1/';\",1000);</script>";
}
else
{
  echo "Fel lösenord eller mail";
  //echo "<script>setTimeout(\"location.href = 'http://localhost:8888/Labb1/labb2_Joakim/login.php';\",1000);</script>";
}
?>
