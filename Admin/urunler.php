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
                  <h3 class="card-title">urunler</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="urunler-ekle?katid=<?php echo @$_GET['katid'] ?>" ><button style="float:right;" type="submit" class="btn btn-info">Yeni urunler Ekle</button></a>  
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">

                    <thead>
                      <tr>
                       <th>urunler resim</th>

                       <th>urunler başlık</th>
                       <th>urunler model</th>
                       <th>urunler renk</th>
                       <th>urunler durum</th>
                       <th>urunler sıra</th>
                       <th>urunler adet sayısı</th>
                       <th>Sil</th>
                       <th>Düzenle</th>
                       <th></th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php 

                    $urunler=$baglanti->prepare("SELECT * from urunler where kategori_id=:kategori_id order by urun_id asc");
                    $urunler->execute(array(

                      'kategori_id'=>@$_GET['katid']

                    ));

                    while  ($urunlercek = $urunler ->fetch(PDO::FETCH_ASSOC)){ ?>
                      <tr>
                        <td><img src="resimler/urunler/<?php echo $urunlercek['urun_resim'] ?>" width='100'></td>
                        <td><?php echo $urunlercek['urun_baslik'];?></td>
                        <td><?php echo $urunlercek['urun_model']; ?></td>
                        <td><?php echo $urunlercek['urun_renk']; ?></td>
                        <td><?php echo $urunlercek['urun_durum']; ?></td>
                        <td><?php echo $urunlercek['urun_sira']; ?></td>
                        <td><?php echo $urunlercek['urun_adet']; ?></td>

                      </td>
                      <form action="islem/islem.php" method="post">
                        <td> 
                         <input type="hidden" name="id" value="<?PHP echo $urunlercek['urun_id'] ?>">
                         <input type="hidden" name="resim" value="<?PHP echo $urunlercek['urun_resim'] ?>">
                         <input type="hidden" name="katsid" value="<?php echo $_GET['katid'] ?>">

                         <button name="urunlersil" class="btn btn-danger">Sil</button>

                         
                       </td>

                       
                     </form>

                     <td><a href="urunler-duzenle?id=<?php echo $urunlercek['urun_id'] ?>&katid=<?php echo $urunlercek['kategori_id']  ?>">
                      
                      <button class="btn btn-success" type="submit">Düzenle</button>

                    </a></td>
                    <td> <a href="cokluresim?id=<?php echo $urunlercek['urun_id'] ?>"> <button class="btn btn-info">Çoklu Resim</button> </a></td>


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

