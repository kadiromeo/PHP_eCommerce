<?php 

require_once 'header.php';
require_once 'sidebar.php';
require_once 'islem/baglanti.php';

$urunler=$baglanti->prepare("SELECT * FROM urunler WHERE urun_id=:urun_id");
@$urunler->execute(array(
  'urun_id'=>$_GET['id']

));
$urunlercek = $urunler ->fetch(PDO::FETCH_ASSOC);

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
       <div class="card card-primary col-md-12">
        <div class="card-header">
          <h3 class="card-title">urunler Ekleme Ayarları</h3>  </div>


          
          <?PHP 

          if (@$_GET['yuklenme']=="basarili") { ?>
            <h5 class="alert-success">BAŞARILI</h5>
            <?PHP }elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
              <h5 class=" alert-danger">BAŞARISIZ</h5>
              <?PHP }
              elseif(@$_GET['yuklenme']=="kullanicivar"){ ?>
                <h5 class=" alert-danger">Kullanıcı Kayıtlı</h5>
              <?php }    ?>
              
              

              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="post" enctype="multipart/form-data">
                <div class="card-body">

                  <div class="form-group">
                    <label>Kategori Seç</label>
                    <select name="urunkategori" class="form-control select2" style="width: 100%;">
                      <?php 
                      $katid=$urunlercek['kategori_id'];

                      $kategori=$baglanti->prepare("select * from kategori order by kategori_id asc");
                      $kategori->execute();

                      while  ($kategoricek = $kategori ->fetch(PDO::FETCH_ASSOC)){ 

                        $kategoriid=$kategoricek['kategori_id'];

                        ?>
                        <option <?php 


                        if ($katid==$kategoriid) {
                          echo "selected";
                        }

                        ?> value="<?php echo $kategoriid
                      ?>"><?PHP echo $kategoricek['kategori_ad']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <img width="150" src="resimler/urunler/<?PHP echo $urunlercek['urun_resim'] ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">urunler resim</label>
                  <input  value="<?php echo $urunlercek['urun_resim'] ?>" name="urunleresim" type="file" class="form-control"  >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">urunler başlık</label>
                  <input  value="<?php echo $urunlercek['urun_baslik'] ?>" name="urunlerbaslik" type="text" class="form-control"  placeholder=" urunler Başlık Giriniz">
                </div>
                <input type="hidden" name="katsid" value="<?php echo @$_GET['katid'] ?>">

                <label>Detay</label>
                <textarea  name="urunleraciklama" class="ckeditor" id="editor1"><?php echo $urunlercek['urun_aciklama'] ?></textarea>

                <input type="hidden" name="katsid" value="<?php echo @$_GET['katid'] ?>">

                <div class="form-group">
                  <label for="exampleInputEmail1">urunler sıra</label>
                  <input  value="<?php echo $urunlercek['urun_sira'] ?>"name="urunlersira" type="text" class="form-control"  placeholder="urunler Sırası Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">urunler model</label>
                  <input value="<?php echo $urunlercek['urun_model'] ?>" name="urunlermodel" type="text" class="form-control"  placeholder="urunler Link Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">urunler renk</label>
                  <input  value="<?php echo $urunlercek['urun_renk'] ?>"name="urunlerrenk" type="text" class="form-control"  placeholder="urunler Button Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">urunler adet</label>
                  <input value="<?php echo $urunlercek['urun_adet'] ?>" name="urunleradet" type="text" class="form-control"  placeholder="urunler Button Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">urunler fiyat</label>
                  <input value="<?php echo $urunlercek['urun_fiyat'] ?>" name="urunlerfiyat" type="text" class="form-control"  placeholder="urunler Button Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">urunler anahtar kelime</label>
                  <input value="<?php echo $urunlercek['urun_etiket'] ?>" name="urunleranahtar" type="text" class="form-control"  placeholder="urunler Button Giriniz">
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>urunler durum</label>
                    <select name="urunlerdurum" class="form-control select2" style="width: 100%;">
                      <option   <?php if ($urunlercek['urun_durum']==1) { echo "selected"; }  ?>   value="1" selected="selected">Aktif</option>
                      <option   <?php if ($urunlercek['urun_durum']==0) { echo "selected"; }  ?>  value="0">Pasif</option>
                      
                    </select>
                  </div>

                  <input type="hidden" name="id" value="<?php echo $urunlercek['urun_id'] ?>">
                  <input type="hidden" name="eskiresim" value="<?php echo $urunlercek['urun_resim'] ?>">


                  <div class="form-group">
                    <label>Öne Çıkar</label>
                    <select name="urunleronecikar" class="form-control select2" style="width: 100%;">
                      <option  <?php if ($urunlercek['onecikan']==1) { echo "selected"; }  ?> value="1" selected="selected">Öne Çıkar</option>
                      <option <?php 
                      if ($urunlercek['onecikan']==0) {

                        echo 'selected';
                      }



                    ?> value="0">Çıkarma</option>
                    
                  </select>
                </div>



              </div>

            </div>
            <div class="card-footer">
              <button  name="urunduzenle" type="submit" class="btn btn-primary">Gönder</button>
            </div>
          </form>
        </div>
        
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>

