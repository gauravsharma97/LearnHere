<?php
require_once('PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail->CharSet =  "utf-8";
$mail->IsSMTP();
// enable SMTP authentication
$mail->SMTPAuth = true;                  
// GMAIL username
$mail->Username = "gaurav06051997@gmail.com";
// GMAIL password
$mail->Password = "gaurav@sharma1997";
$mail->SMTPSecure = "tls";  
// sets GMAIL as the SMTP server
$mail->Host = "smtp.gmail.com";
// set the SMTP port for the GMAIL server
$mail->Port = 587;
$mail->From='gauravbhilwara@gmail.com';
$mail->FromName='Learn Here';
$mail->AddAddress($_GET['email'],$_GET['name']);
$mail->Subject  =  'Email verification';
$mail->IsHTML(true);
$code=md5($_GET['name']);
$mail->Body    = 'This is the verification mail click the link to verify the account:->http://localhost/newproject/index.php?email='.$_GET['email'].'&code='.$code.'<--';
if($mail->Send())
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learnhere";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "update unverified set code='$code' where email='".$_GET['email']."'";
$conn->query($sql);
$conn->close();	
echo "<script>
alert('Verification mail has been send to your email address');
window.location.href='index.php';
</script>";

}
else
{
	echo "Mail Error - >".$mail->ErrorInfo;
}
?>