  <?PHP
  error_reporting(0);
  session_start();
  ob_start();
  require_once 'Admin/islem/baglanti.php';
  require_once 'function.php';



  $ayar=$baglanti->prepare(" SELECT * from ayarlar where id=?");
  $ayar->execute(array(1));
  $ayarcek = $ayar ->fetch(PDO::FETCH_ASSOC);



  $hakkimizda=$baglanti->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=?");
  $hakkimizda->execute(array(1));
  $hakkimizdacek = $hakkimizda ->fetch(PDO::FETCH_ASSOC);



  $kullanicisor=$baglanti->prepare("SELECT * FROM kullanici WHERE kullanici_ad=:kullanici_ad ");
  $kullanicisor->execute(array(
      'kullanici_ad'=>$_SESSION['normalgiris']

  ));

  $kullanicicek = $kullanicisor ->fetch(PDO::FETCH_ASSOC);
  $var =$kullanicisor->rowcount();

  ?>

  <!doctype html>
    <html class="no-js" lang="zxx">
    
    <!-- index28:48-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Keywords" content="<?php echo $ayarcek['anahtarkelime'] ?>"/>
        <meta name="Description" content="<?php echo $ayarcek['aciklama'] ?>"/>
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="css/fontawesome-stars.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="css/meanmenu.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="css/slick.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="css/venobox.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="css/nice-select.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="css/helper.css">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- Modernizr js -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="//code-eu1.jivosite.com/widget/39ljYlJFHu" async></script>
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header>
             <div class="header-top text-white" style="background-color: gray;">
                <div class="container">
                    <div class="row">
                        <!-- Begin Header Top Left Area -->
                        <div class="col-lg-3 col-md-4">
                            <div class="header-top-left">
                                <ul class="phone-wrap">
                                    <li><span>Telefon:</span><a href="#"> <?php echo $ayarcek['telefon'] ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Header Top Left Area End Here -->
                        <!-- Begin Header Top Right Area -->
                        <div class="col-lg-9 col-md-8">
                            <div class="header-top-right">
                                <ul class="ht-menu">
                                    <!-- Begin Setting Area -->
                                    <li>
                                        <div class="ht-setting-trigger"><span> Hesabım: <?php echo $kullanicicek['kullanici_ad'] ?></span></div>
                                        <div class="setting ht-setting">
                                            <ul class="ht-setting-list">
                                                <li><a href="kullanici">Ayarlar</a></li>
                                                <li><a href="sepet">Sepetim</a></li>
                                                <li><a href="siparisler">Almış Olduğum Ürünler</a></li>
                                                <li><a href="sifremidegistir">Şifremi Değiştir</a></li>


                                            </ul>
                                        </div>
                                    </li>
                                    
                                    <!-- Language Area End Here -->
                                </ul>
                            </div>
                        </div>
                        <!-- Header Top Right Area End Here -->
                    </div>
                </div>
            </div>
            
            <!-- Header Top Area End Here -->
            <!-- Begin Header Middle Area -->
            <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                <div class="container">
                    <div class="row">
                        <!-- Begin Header Logo Area -->
                        <div class="col-lg-3">
                            <div class="logo pb-sm-30 pb-xs-30">
                                <a href="index">
                                    <img width="200" src="Admin/resimler/logo/<?php echo $ayarcek['logo'] ?>">
                                </a>
                            </div>
                        </div>
                        <!-- Header Logo Area End Here -->
                        <!-- Begin Header Middle Right Area -->
                        <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                            <!-- Begin Header Middle Searchbox Area -->
                            <form action="arama" method="post" class="hm-searchbox">
                                <select class="nice-select select-search-category">
                                    <?php  
                                    $kategori=$baglanti->prepare("SELECT * FROM  kategori  order by kategori_sira ASC");
                                    $kategori->execute();
                                    while ($kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <option value="<?php echo $kategoricek['kategori_id'] ?>" ><?php echo $kategoricek['kategori_ad'] ?></option>                          
                                    <?php  } ?>
                                </select>
                                <input type="text" name="aranacakkelime" placeholder="Aradığınız kelimeyi girin.">
                                <button  name=" kelimearama" class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                            <!-- Header Middle Searchbox Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="header-middle-right">
                                <ul class="hm-menu">
                                    <!-- Begin Header Middle Wishlist Area -->
                                    <li class="hm-wishlist">

                                        <a href="kullanici">
                                            <i class="fa fa-user"></i>
                                        </a>
                                       
                                        <small> <?php echo $kullanicicek['kullanici_ad'] ?> </small>
                                        

                                    </li>
                                    <!-- Header Middle Wishlist Area End Here -->
                                    <!-- Begin Header Mini Cart Area -->
                                    <li class="hm-minicart">
                                        <div class="hm-minicart-trigger">
                                            <span class="item-icon"></span>
                                            <span class="item-text"><?php echo $sepettoplam; ?>
                                            Sepetim
                                        </span>
                                    </div>
                                    <span></span>
                                    <div class="minicart">
                                        <ul class="minicart-product-list">

                                            <?php 

                                            foreach ($_COOKIE['sepet'] as $key => $value) {




                                              $urunler=$baglanti->prepare("SELECT * from urunler where urun_id=:urun_id order by urun_sira asc");
                                              $urunler->execute(array(

                                                'urun_id'=>$key
                                                

                                            ));

                                              $urunlercek = $urunler ->fetch(PDO::FETCH_ASSOC);
                                              @$sepettoplam+=$value * $urunlercek['urun_fiyat'];  



                                              ?>




                                              <li>
                                                <a href="single-product.html" class="minicart-product-image">
                                                    <img src="Admin/resimler/urunler/<?php echo $urunlercek['urun_resim'] ?>" alt="cart products">
                                                </a>
                                                <div class="minicart-product-details">
                                                    <h6><a href="single-product.html"><?php echo $urunlercek['urun_baslik'] ?></a></h6>
                                                    <span><?php echo $urunlercek['urun_fiyat'] ?> ₺</span>
                                                </div>

                                                <a href="islem?sepetsil&id=<?php echo $key ?>"> 

                                                    <button class="close" title="Remove">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </a>


                                            </li>


                                        <?php } ?>

                                    </ul>
                                    <p class="minicart-total">Total Fiyat: <span><?php  
                                    echo @$sepettoplam;


                                ?>₺
                                

                            </span></p>
                            <div class="minicart-button">
                                <a href="sepet" class="li-button li-button-fullwidth li-button-dark">
                                    <span>Sepeti Görüntüle</span>
                                </a>
                                <a href="alisveris" class="li-button li-button-fullwidth">
                                    <span>Alışverişi Tamamla</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <!-- Header Mini Cart Area End Here -->
                </ul>
            </div>
            <!-- Header Middle Right Area End Here -->
        </div>
        <!-- Header Middle Right Area End Here -->
    </div>
</div>
</div>
<!-- Header Middle Area End Here -->
<!-- Begin Header Bottom Area -->
<div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Header Bottom Menu Area -->
                <div class="hb-menu">
                    <nav>
                        <ul>
                            <li class="dropdown-holder"><a href="index">ANASAYFA</a>
                              
                            </li>
                            <li class="megamenu-holder"><a>Kategoriler</a>
                                <ul class="megamenu hb-megamenu">
                                    <li><a>Kategori 1</a>
                                        <ul>
                                          <?php 

                                          $kategori=$baglanti->prepare("SELECT * from kategori where kategori_durum=:kategori_durum and kategori_sira between 1 and 10 limit 8  ");
                                          $kategori->execute(array(

                                            'kategori_durum'=>1
                                        ));

                                        while  ($kategoricek = $kategori ->fetch(PDO::FETCH_ASSOC)){ ?>
                                            <li><a href="urunler-<?=seo($kategoricek['kategori_ad']).'-'.$kategoricek['kategori_id'] ?>?sayfa=1"><?PHP echo $kategoricek['kategori_ad'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li><a>Kategori 2</a>
                                    <ul>
                                       <?php 

                                       $kategori=$baglanti->prepare("SELECT * from kategori where kategori_durum=:kategori_durum and kategori_sira between 10 and 20 limit 8 ");
                                       $kategori->execute(array(

                                        'kategori_durum'=>1


                                    ));

                                    while  ($kategoricek = $kategori ->fetch(PDO::FETCH_ASSOC)){ ?>
                                        <li><a href="urunler-<?=seo($kategoricek['kategori_ad']).'-'.$kategoricek['kategori_id'] ?>?sayfa=1"><?PHP echo $kategoricek['kategori_ad'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li><a>Kategori 3</a>
                                <ul>
                                 <?php 

                                 $kategori=$baglanti->prepare("SELECT * from kategori where kategori_durum=:kategori_durum and kategori_sira between 20 and 30 limit 8 ");
                                 $kategori->execute(array(


                                    'kategori_durum'=>1

                                ));

                                while  ($kategoricek = $kategori ->fetch(PDO::FETCH_ASSOC)){ ?>
                                    <li><a href="urunler-<?=seo($kategoricek['kategori_ad']).'-'.$kategoricek['kategori_id'] ?>?sayfa=1"><?PHP echo $kategoricek['kategori_ad'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                
                
                <li><a href="hakkimizda">HAKKIMIZDA</a></li>
                <li><a href="bilgi">KARGO BİLGİLERİ</a></li>
                <li class="ml-2"><a href="iletisim">İLETİŞİM</a></li>
            </ul>
        </nav>
    </div>

    <!-- Header Bottom Menu Area End Here -->
</div>
</div>
</div>
</div>
<!-- Header Bottom Area End Here -->
<!-- Begin Mobile Menu Area -->
<div class="mobile-menu-area d-lg-none d-xl-none col-12">
    <div class="container"> 
        <div class="row">
            <div class="mobile-menu">
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu Area End Here -->
</header>