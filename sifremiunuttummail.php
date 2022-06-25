<?php 
require_once 'Admin/islem/baglanti.php';
if (isset($_POST['sifremiunuttum'])) {


	$kadi=$_POST['kadi'];


	$kullanicisor=$baglanti->prepare("SELECT * FROM kullanici WHERE kullanici_ad=:kullanici_ad and kullanici_yetki=:kullanici_yetki ");
	$kullanicisor->execute(array(
		'kullanici_ad'=>$kadi,
		'kullanici_yetki'=>1

	));

	$kullanicicek = $kullanicisor ->fetch(PDO::FETCH_ASSOC);
	$var =$kullanicisor->rowcount();
	$id=$kullanicicek['kullanici_id'];
	$email=$kullanicicek['kullanici_email'];

	if ($var=="0") {
		echo "Kullanıcı bulunamadı";
	}

	else {

		$sifreolustur=rand(800,9000000);
		$sifreharf="aou";
		$sifreharf2="mhg";
		$yenisifre=$sifreharf.$sifreolustur.$sifreharf2;
		$md5sifre=md5($yenisifre);

		$sifremiunuttum=$baglanti->prepare("UPDATE  kullanici SET 
			kullanici_sifre=:kullanici_sifre
			
			WHERE kullanici_id=$id
			");



		$update=$sifremiunuttum->execute(array(

			'kullanici_sifre'=>$md5sifre


		));


		if ($update) {
			
			require_once("phpmailer/class.phpmailer.php");


			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = "mail.alanadiniz.com veya IP";
			$mail->SMTPAuth = true;
			$mail->Username = "yazilimcagicom@gmail.com";
			$mail->Password = " ";
			$mail->From = "yazilimcagicom@gmail.com";
			$mail->Fromname = $adsoyad;
			$mail->AddAddress("$email","Mail gönderildi");
			$mail->AddReplyTo("$email", 'Reply to name');
			$mail->Subject ="Şifre Unuttum Talebi";
			$mail->Body ="Merhaba, sisteme geçici olarak aşağıdaki şifre ile erişim sağlayabilirsiniz. 
			yenisifre= 
			$yenisifre";
			$mail->CharSet='UTF-8';

			if($mail->Send())
			{

				echo "Merhaba, sisteme geçici olarak aşağıdaki şifre ile erişim sağlayabilirsiniz.";
			}

			else {

				echo "değişmedi";
			}

		}
	}

?>