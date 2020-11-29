<?php
include 'class/connection.php';
$tbl_name="user"; // Table name 
// username and password sent from form 
$username=$_POST['username']; 
$password=$_POST['password']; 
// To protect MySQL injection (more detail about MySQL injection)

$query = mysqli_query($conn, "SELECT * FROM $tbl_name WHERE username = '".$_POST['username']."' and password = '".($_POST['password'])."'");
$count=mysqli_num_rows($query);
// If result matched $username and $mypassword, table row must be 1 row
if($count==1){
		session_start();
        $_SESSION['username'] = $row['username']; 
        $_SESSION['logged'] = TRUE; 
        header("Location: main.php"); // Modify to go to the page you would like 
        exit; 
}
else {
echo "<script>alert('Wrong Username or Password.');</script>";
}
?>
<html>
<head>
<meta http-equiv="refresh" content="1;url=index.php">
<body>
</body>
</head>
</html>