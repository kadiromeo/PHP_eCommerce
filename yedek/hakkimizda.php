<?PHP 
require_once 'header.php';


?>

            <div class="about-us-wrapper pt-60 pb-40">
                <div class="container">
                    <div class="row">
                        <!-- About Text Start -->
                        <div class="col-lg-6 order-last order-lg-first">
                            <div class="about-text-wrap">
                                <h2><?PHP echo $hakkimizdacek['hakkimizda_baslik'] ?></h2>
                                <p><?PHP echo $hakkimizdacek['hakkimizda_detay'] ?></p>
                                <h4>MİSYON:</h4>
                                <p><?PHP echo $hakkimizdacek['hakkimizda_misyon'] ?></p>
                                 <h4>VİZYON:</h4>

                                <p><?PHP echo $hakkimizdacek['hakkimizda_vizyon'] ?></p>
                            </div>
                        </div>
                        <!-- About Text End -->
                        <!-- About Image Start -->
                        <div class="col-lg-5 col-md-10">
                            <div class="about-image-wrap">
                                <img class="img-full" src="Admin/resimler/hakkimizda/<?PHP echo $hakkimizdacek['hakkimizda_resim'] ?>" alt="About Us" />
                            </div>
                        </div>
                        <!-- About Image End -->
                    </div>
                </div>
            </div>
            <!-- about wrapper end -->
            <!-- Begin Counterup Area -->
            
          <?PHP 
          require_once 'footer.php';
      ?>