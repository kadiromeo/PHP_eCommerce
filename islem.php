<?php 
session_start();
require_once 'Admin/islem/baglanti.php';

if (isset($_POST['login'])) {

	$kadi=htmlspecialchars($_POST['kadi']);
	$sifre=htmlspecialchars($_POST['sifre']);
	$sifreguclu=md5($sifre);
	
	
	$kullanicisor=$baglanti->prepare("SELECT * FROM kullanici WHERE kullanici_ad=:kullanici_ad and kullanici_sifre=:kullanici_sifre and kullanici_yetki=:kullanici_yetki");

	
	$kullanicisor->execute(array(
		'kullanici_ad'=>$kadi,
		'kullanici_sifre'=>$sifreguclu,
		'kullanici_yetki'=>1


	));

	$var=$kullanicisor->rowcount();

	if ($var >0) {
		$_SESSION['normalgiris']=$kadi;
		header("Location:index?durum=Hoşgeldin");
	} else{
		header("Location:giris?durum=Hata");

	}

}


if (isset($_POST['register'])) {
	$kadi=htmlspecialchars($_POST['kadi']);
	$sifre=htmlspecialchars($_POST['sifre']);
	$sifrem=md5($sifre);
	$sifreiki=htmlspecialchars($_POST['sifretekrar']);
	$email=htmlspecialchars($_POST['email']);
	$adsoyad=htmlspecialchars($_POST['adsoyad']);

	$kullanicisor=$baglanti->prepare("SELECT * FROM kullanici WHERE kullanici_ad=:kullanici_ad and kullanici_yetki=:kullanici_yetki or kullanici_email=:kullanici_email");
	$kullanicisor->execute(array(
		'kullanici_ad'=>$kadi,
		'kullanici_yetki'=>1,
		'kullanici_email'=>$email
	));
	$var=$kullanicisor->rowcount();

	if ($var>0) {
		header("Location:giris?durum=kullanicivar");
	} else{

		if ($sifre==$sifreiki) {

			if (strlen($sifre)>=8) {


				$kullanicikaydet=$baglanti->prepare("INSERT into  kullanici SET 

					kullanici_ad=:kullanici_ad,
					kullanici_sifre=:kullanici_sifre,
					kullanici_adsoyad=:kullanici_adsoyad,
					kullanici_yetki=:kullanici_yetki,
					kullanici_email=:kullanici_email

					");
				

				$insert=$kullanicikaydet->execute(array(

					'kullanici_ad'=>$kadi,
					'kullanici_sifre'=>$sifrem,
					'kullanici_adsoyad'=>$adsoyad,
					'kullanici_yetki'=>1,
					'kullanici_email'=>$email


				));

				if ($insert) {
					
					header("Location:giris?durum=basarili");
				} else{
					header("Location:giris?durum=basarisiz");
				}


			}
			else{
				header("Location:giris?durum=sifrehata");		
			}
		} else{
			header("Location:giris?durum=sifrehata");
		}
	}
}


if (isset($_POST['sepeteekle'])) {

	$id=$_POST['urunid'];
	$adet=$_POST['adet'];

	setcookie('sepet['.$id.']',$adet, strtotime("7day"));

	header("Location:sepet?durum=eklendi");

}



if (isset($_GET['sepetsil'])) {

	$id=$_GET['id'];
	$adet=$_GET['adet'];

	setcookie('sepet['.$id.']',$adet, strtotime("-7day"));

	header("Location:sepet?durum=silindi");

}


if (isset($_POST['alisverisbitir'])) {


	$toplamfiyat=$_POST['toplamfiyat'];
	$kadi=$_POST['kadi'];

	foreach (@$_COOKIE['sepet'] as $key => $value) {



		$urunler=$baglanti->prepare("SELECT * from urunler where urun_id=:urun_id order by urun_sira asc");
		$urunler->execute(array(

			'urun_id'=>$key
			

		));

		$urunlercek = $urunler ->fetch(PDO::FETCH_ASSOC);


		$fiyat=$urunlercek['urun_fiyat'];

		$alisveriskaydet=$baglanti->prepare("INSERT into  siparisler SET 

			kullanici_id=:kullanici_id,
			urun_id=:urun_id,
			urun_adet=:urun_adet,
			urun_fiyat=:urun_fiyat,
			toplam_fiyat=:toplam_fiyat,
			odeme_turu=:odeme_turu,
			siparis_onay=:siparis_onay
			

			");
		

		$insert=$alisveriskaydet->execute(array(

			'kullanici_id'=>$kadi,
			'urun_id'=>$key,
			'urun_adet'=>$value,
			'urun_fiyat'=>$fiyat,
			'toplam_fiyat'=>$toplamfiyat,
			'odeme_turu'=>$_POST['odeme'],
			'siparis_onay'=>0
			


		));
	}

	if ($insert) {
		
		header("Location:index?durum=tesekkur");
	} else{
		header("Location:index?durum=basarisiz");
	}


}



if (isset($_POST['sifreduzenle'])) {
	$eskisifre=htmlspecialchars($_POST['eskisifre']);
	$yenisifre=htmlspecialchars($_POST['yenisifre']);
	$yenisifretekrar=htmlspecialchars($_POST['yenitekrar']);
	$kullaniciid=$_POST['kullaniciid'];
	$md5sifre=md5($eskisifre);
	$yenisifremd5=md5($yenisifre);
	
	
	$kullanicisor=$baglanti->prepare("SELECT * from kullanici where kullanici_id=:kullanici_id  ");
	$kullanicisor->execute(array(
		'kullanici_id'=>$kullaniciid
	));
	$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);


	$veritabanisifre=$kullanicicek['kullanici_sifre'];


	if ($md5sifre==$veritabanisifre) {

		if ($yenisifre==$yenisifretekrar) {
			

			$duzenle=$baglanti->prepare("UPDATE kullanici SET 



				kullanici_sifre=:kullanici_sifre
				

				WHERE kullanici_id=$kullaniciid

				");


			$update=$duzenle->execute(array(

				'kullanici_sifre'=>$yenisifremd5
				


			));
			if ($update) {


				header("Location:sifremidegistir.php?durum=basarili");
			}
			else{
				header("Location:sifremidegistir.php?durum=basarisiz");
			}



		}
		else{
			Header("Location:sifremidegistir?durum=ikisifreaynigir");
		}




	}
	else{
		Header("Location:sifremidegistir?durum=sifrefarkli");
	}




}






if (isset($_POST['aboneol'])){
	$guvenlimail=htmlspecialchars($_POST['abone']);
	$aboneol=$baglanti->prepare("INSERT into abone SET 

		abone_email=:abone_email
		

		");
	

	$insert=$aboneol->execute(array(

		'abone_email'=>$guvenlimail



	));

	if ($insert) {
		
		header("Location:index?yuklenme=basarili");
	} else{
		header("Location:index?yuklenme=basarisiz");
	}



}

?>