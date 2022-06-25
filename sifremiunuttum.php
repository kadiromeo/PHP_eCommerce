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
                <form action="sifremiunuttummail.php" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Şifremi unuttum <?php  if (@$_GET['durum']=="Hata") { ?>
                           <i class="alert-danger"> Kullanıcı veya şifre hatalı   </i>
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
                    <div class="col-md-12">
                        <button class="register-button mt-0" name="sifremiunuttum">Gönder</button>
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