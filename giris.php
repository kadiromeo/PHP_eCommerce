<?php 

require_once 'header.php';


?>

<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Login Content Area -->
<div class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form action="islem.php" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Giriş Yap  <?php  if (@$_GET['durum']=="Hata") { ?>
                         <script type="text/javascript">alert("Kullanıcı veya Şifre Hatalı!")</script>
                     <?php  } ?> 

                     <?php if (@$_GET['durum']=="gulegule") { ?>
                       <i style="color: black; font-size: 12px;"> / Görüşmek üzere yine bekleriz...  </i>
                   <?php  } ?> 


                   <?php if (@$_GET['durum']=="girisyap") { ?>
                       <i style="color: black; font-size: 12px;"> / Lütfen giriş yapınız...  </i>
                   <?php  } ?> 
               </h4>
               
               <div class="row">
                <div class="col-md-12 col-12 mb-20">
                    <label>Kullanıcı Adı</label>
                    <input required="" name="kadi" class="mb-0" type="text" placeholder="Kullanıcı Adı">
                </div>
                <div class="col-12 mb-20">
                    <label>Şifre</label>
                    <input  required="" name="sifre" class="mb-0" type="password" placeholder="Şifre">
                </div>
                <div class="col-md-12 mt-10 mb-20 text-left text-md-right">
                    <a href="sifremiunuttum">Şifrenizi mi unuttunuz?</a>
                </div>
                <div class="col-md-12">
                    <button class="register-button mt-0" name="login" >Giriş Yap</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
    <form action="islem.php" method="post">
        <div class="login-form">
            <h4 class="login-title">Kayıt Ol <br>
                
              <?php if (@$_GET['durum']=="kullanicivar") { ?>
                 <script type="text/javascript">alert("Kayıtlı Üye!")</script>
                 
             <?php  } elseif (@$_GET['durum']=="sifrehata") {?>
                 <script type="text/javascript">alert("Şifre hatalı (Şifre uyumsuz veya 8 karakterden az)")</script>


             <?php } elseif (@$_GET['durum']=="basarisiz") { ?>

                 <script type="text/javascript">alert("Başarısız Oldu!")</script>

             <?php } elseif (@$_GET['durum']=="basarili") { ?>

                 <script type="text/javascript">alert("Başarılı Kayıt!")</script>
                 
             <?php }?>
         </h4>
         <div class="row">
            <div class="col-md-6 col-12 mb-20">
                <label>Kullanıcı Adı</label>
                <input required="" name="kadi" class="mb-0" type="text" placeholder="Kullanıcı Adı">
            </div>
            <div class="col-md-6 col-12 mb-20">
                <label>Ad Soyad</label>
                <input  required="" name="adsoyad" class="mb-0" type="text" placeholder="Ad Soyad">
            </div>
            <div class="col-md-12 mb-20">
                <label>E-Posta</label>
                <input required="" class="mb-0" name="email" type="email" placeholder="E-Posta">
            </div>
            <div class="col-md-6 mb-20">
                <label>Şifre</label>
                <input required="" class="mb-0" name="sifre" type="password" placeholder="Şifre">
            </div>
            <div class="col-md-6 mb-20">
                <label>Şifre Tekrarı</label>
                <input required="" class="mb-0" name="sifretekrar" type="password" placeholder="Şifre Tekrarı">
            </div>
            <div class="col-12">
                <button type="submit" required="" class="register-button mt-0" name="register">Kayıt ol</button>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>
<!-- Login Content Area End Here -->
<!-- Begin Footer Area -->

<?php 

require_once 'footer.php';

?>