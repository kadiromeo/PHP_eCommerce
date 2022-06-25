
<?php
$adsoyad=$_POST['adsoyad'];
$email=$_POST['email'];
$konu=$_POST['konu'];
$mesaj=$_POST['mesaj'];

if (isset($_POST['mailgonder'])) {
	// code...

	require_once("class.phpmailer.php");


	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host = "mail.alanadiniz.com veya IP";
	$mail->SMTPAuth = true;
	$mail->Username = "yazilimcagicom@gmail.com";
	$mail->Password = "Kdr123Zynqq__";
	$mail->From = "yazilimcagicom@gmail.com";
	$mail->Fromname = $adsoyad;
	$mail->AddAddress("ornek@alanadiniz.com","Mail gönderildi");
	$mail->AddReplyTo("$email", 'Reply to name');
	$mail->Subject = $konu;
	$mail->Body = $mesaj;
	$mail->CharSet='UTF-8';

	if($mail->Send())
	{
	 echo 'gönderildi';
	}
	else {
	 echo "başarısız";
	}
}
?>
