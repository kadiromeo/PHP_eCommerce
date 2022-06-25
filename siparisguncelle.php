<?php require_once 'header.php'; 



if ($var==0) { 
 #kullanıcı yoksa
   
    Header("Location: giris?durum=girisyap");
}



?>
<!-- Begin Login Content Area -->
<div class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                


                <form action="Admin/islem/islem.php" method="post" >
                    <div class="login-form">
                      
                        <input type="hidden" name="kullaniciid" value="<?php echo $kullanicicek['kullanici_id'] ?>">
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Yeni Adet Sayısı Giriniz*</label>
                                <input  name="yeniadet" required="" class="mb-0" type="text" placeholder="Yeni Adet Sayısı Giriniz.">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Sipariş Numaranızı Giriniz</label>
                                <input name="siparisnumara" required="" class="mb-0" type="text" placeholder="Sipariş numaranızı giriniz.">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Notunuzu Giriniz</label>
                                <input name="not" required="" class="mb-0" type="text" placeholder="Notunuzu giriniz.">
                            </div>
                            
                            <div class="col-md-12">
                                <button name="siparisguncelle" class="register-button mt-0">Kaydet</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>  <a href="cikis"><button style="float:right" class="btn btn-info"><i class="fa fa-sign-out"></i>Çıkış yap</button></a>
    </div> 
</div>
<?php require_once 'footer.php'; ?>