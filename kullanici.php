<?php 

require_once 'header.php';

if ($var==0) {
    header("Location:giris?durum=girisyap");
}

?>

<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Login Content Area -->
<div class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form action="Admin/islem/islem.php" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Kullanıcı ve Adres Bilgileri <?php  if (@$_GET['yuklenme']=="basarisiz") { ?>
                            <script type="text/javascript">alert("Hata Oluştu!")</script>

                        <?php  } elseif (@$_GET['yuklenme']=="basarili") { ?>
                            <script type="text/javascript">alert("Başarılı!")</script>

                           <?php     } ?>  </h4>
                           <input type="hidden" name="kullaniciid" value="<?php echo $kullanicicek['kullanici_id'] ?>">
                           <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Ad Soyad</label>
                                <input  value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>" required="" name="adsoyad" class="mb-0" type="text" placeholder="Ad Soyad giriniz">
                            </div>
                            <div class="col-12 mb-20">
                                <label>E-Mail</label>
                                <input  value="<?php echo $kullanicicek['kullanici_email'] ?>" required="" name="email" class="mb-0" type="email" placeholder="E-Mail giriniz">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Adres</label>
                                <input  value="<?php echo $kullanicicek['kullanici_adres'] ?>" required="" name="adres" class="mb-0" type="text" placeholder="Adres giriniz">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Şehir</label>
                                <input  value="<?php echo $kullanicicek['kullanici_il'] ?>" required="" name="sehir" class="mb-0" type="text" placeholder="Şehir giriniz">
                            </div>
                            <div class="col-12 mb-20">
                                <label>İlçe</label>
                                <input  value="<?php echo $kullanicicek['kullanici_ilce'] ?>" required="" name="ilce" class="mb-0" type="text" placeholder="İlçe giriniz">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Telefon</label>
                                <input value="<?php echo $kullanicicek['kullanici_tel'] ?>"  required="" name="telefon" class="mb-0" type="text" placeholder="Telefon giriniz">
                            </div>
                            <div class="col-md-12">
                                <button class="register-button mt-0" name="kullaniciduzenle" >Kaydet</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">

              <a href="cikis">  <button type="submit" class="btn btn-info" style="float:right"><i class="fa fa-sign-out"></i> Çıkış Yap</button></a>
          </div>
      </div>
  </div>
</div>
<!-- Login Content Area End Here -->
<!-- Begin Footer Area -->

<?php 

require_once 'footer.php';

?>