<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

?>
<?php
$user='root';
$password='';
$database='user-registration1';
$servername='localhost';
$mysqli=new mysqli($servername,$user,$password,$database);
if($mysqli->connect_error){
    die('Connect Error (' .
    $mysqli->connect_errno.')'.
    $mysqli->connect_error);
}
$sql="SELECT * FROM tbl_member ";
$result=$mysqli->query($sql);
$mysqli->close();
?>
<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>Welcome</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
</HEAD>
<BODY>
	<div class="phppot-container">
		<div class="page-header">
     <span class="login-signup"><button><a href="logout.php">Logout</a></span></button>
     <button><a href="map1.html">Google map</a></button></div>
		<div class="page-content">TRAINER LIST</div>
    <table border="1px">
              <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>MOBILE NO.</th>
                <th>ADDRESS</th>
              </tr>
          <?php
          while ($rows=$result->fetch_assoc())
          {
            ?>
           <tr>
           <td style="color: black"><?php echo $rows['id'];?></td>
           <td style="color: brown"><?php echo $rows['username'];?></td>
           <td style="color: green"><?php echo $rows['email'];?></td>
           <td style="color: red"><?php echo $rows['mnumber'];?></td>
           <td style="color: blue"><?php echo $rows['Location'];?></td>
           </tr>
           <?php
       }
       ?>
       </table>
	</div>
</BODY>
</HTML>
