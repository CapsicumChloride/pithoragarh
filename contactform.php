<?php 
$mysqli = new mysqli("localhost","root","Glory@2017","soar-data");

// Check connection
if ($mysqli -> connect_errno) {
  //echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  //exit();
}


if(!empty($_POST['submit']))
{
  //fetching and storing the form data in variables
$Name = $_POST['name'];
$Email = $_POST['email'];
$Phone = $_POST['contact'];
$comments = $_POST['text'];
  //query to insert the variable data into the database
$sql="INSERT INTO contact (name, email, phone, subject) VALUES ('".$Name."','".$Email."', '".$Phone."', '".$comments."')";
  //Execute the query and returning a message
if(mysqli_query($mysqli,$sql)){
	
$to = $Email;
$subject = "Contact";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <support@soarghatipithoragarh.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

if(mail($to,$subject,$message,$headers)){

	header("Location: https://soarghatipithoragarh.com/Blogs.html");
}else{

}
	
	

}
else{
   //echo "Thank you! We will get in touch with you soon";
}
}
?>