
<?php // Initialize variables to null.
include('config.php');

$sql ="SELECT emailId from tblemail";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0):
foreach($results as $result):
$adminemail=$result->emailId;
endforeach;
endif;
if(isset($_POST['submit']))
{
// getting Post values	
$name=$_POST['name'];
$phoneno=$_POST['phone'];
$email=$_POST['emailaddres'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$uip = $_SERVER ['REMOTE_ADDR'];
$isread=0;
// Insert quaery
$sql="INSERT INTO  tblcontactdata(FullName,PhoneNumber,EmailId,Subject,Message,UserIp,Is_Read) VALUES(:fname,:phone,:email,:subject,:message,:uip,:isread)";
$query = $dbh->prepare($sql);
// Bind parameters
$query->bindParam(':fname',$name,PDO::PARAM_STR);
$query->bindParam(':phone',$phoneno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':uip',$uip,PDO::PARAM_STR);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

global $headers, $ms,$msg1;

if($lastInsertId)
{
//mail function for sending mail
$to=$email.",".$adminemail; 
$headers .= "MIME-Version: 1.0"."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= 'From:Welcome To Investment<nivesh7chauhan@gmail.com>'."\r\n";
$ms.="<html></body><div>
<div><b>Name:</b> $name,</div>
<div><b>Phone Number:</b> $phoneno,</div>
<div><b>Email Id:</b> $email,</div>";
$ms.="<div style='padding-top:8px;'><b>Message : </b>$message</div><div></div></body></html>";
mail($to,$subject,$ms,$headers);







    $_SESSION['status']="Submitted Successfully. You will receive mail shortly.";
    $_SESSION['status_code']="success";

}
else
{
    $_SESSION['status']="Something went wrong. Please try again";
    $_SESSION['status_code']="error";
}
}
?>