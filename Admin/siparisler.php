<?php require_once 'header.php';

require_once 'sidebar.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->

      <!-- /.row -->
      <!-- Main row -->

      <div class="row">


        <?PHP 

        if (@$_GET['yuklenme']=="basarili") { ?>
          <h5 class="alert-success">BAŞARILI</h5>
          <?PHP }elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
            <h5 class=" alert-danger">BAŞARISIZ</h5>
            <?PHP }

            ?>
            
            
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">siparis</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">

                    <thead>
                      <tr>
                       <th>Siparis ID</th>

                       <th>Kullanıcı ID</th>

                       <th>Ürün ID</th>
                       <th>Siparis zaman</th>
                       <th>Ürün Adet</th>
                       <th>Ürün Fiyat</th>
                       <th>Toplam Fiyat</th>
                       <th>Ödeme Durumu</th>
                       <th>Sipariş Notu</th>
                       <th>Yeni Adet</th>
                       <th>Reddet</th>
                       <th>Onayla</th>
                       <th>Sipariş Güncelle</th>
                       
                     </tr>
                   </thead>
                   <tbody>
                    <?php 

                    $siparis=$baglanti->prepare("SELECT * from siparisler order by siparis_id DESC");
                    $siparis->execute();

                    while  ($sipariscek = $siparis ->fetch(PDO::FETCH_ASSOC)){ ?>
                      <tr>
                       <td><?php echo $sipariscek['siparis_id'];?></td>
                       <td><?php echo $sipariscek['kullanici_id'];?></td>
                       <td><?php echo $sipariscek['urun_id'];?></td>
                       <td><?php echo $sipariscek['siparis_zaman']; ?></td>
                       <td><?php echo $sipariscek['urun_adet']; ?></td>
                       <td><?php echo $sipariscek['urun_fiyat']; ?>₺</td>
                       <td><?php echo $sipariscek['toplam_fiyat']; ?>₺</td>
                       <td> <?php 
                       if  ($sipariscek['odeme_turu']=="1") {
                        echo "Kapıda Ödeme";
                      }elseif ($sipariscek['odeme_turu']=="0") {
                        echo "Kart ile Ödeme";
                      }?>
                      
                    </span></td>
                    <td><?php echo $sipariscek['siparis_not']; ?></td>
                    <td><?php echo $sipariscek['siparis_yeniadet']; ?></td>

                    

                    <?php 
                    if ($sipariscek['siparis_onay']==0) { ?>
                      
                     <td>  <a href="islem/islem.php?siparisreddet&id=<?php echo $sipariscek['siparis_id'] ?>">
                      <button name="siparissil" class="btn btn-danger">Reddet</button> </a>   </td>

                      
                      <td> <a href="islem/islem.php?siparisonayla&id=<?php echo $sipariscek['siparis_id'] ?>"><button class="btn btn-success" type="submit">Onayla</button> </a> </td>

                      <td> <a href="siparisguncelle?id=<?php echo $sipariscek['siparis_id'] ?>"><button class="btn btn-info" type="submit">Sipariş Güncelleme</button> </a> </td>

                    <?php }   ?>

                    
                  </tr>
                  <?PHP  } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      
      <!-- /.row (main row) -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>

