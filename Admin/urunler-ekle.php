<?php 

require_once 'header.php';
require_once 'sidebar.php';
require_once 'islem/baglanti.php';

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
                      $katid=$_GET['katid'];

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
                  <label for="exampleInputEmail1">urunler resim</label>
                  <input name="urunleresim" type="file" class="form-control"  >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">urunler başlık</label>
                  <input  name="urunlerbaslik" type="text" class="form-control"  placeholder=" urunler Başlık Giriniz">
                </div>
                <label>Detay</label>
                <textarea name="urunleraciklama" class="ckeditor" id="editor1"></textarea>

                <input type="hidden" name="katsid" value="<?php echo @$_GET['katid'] ?>">

                <div class="form-group">
                  <label for="exampleInputEmail1">urunler sıra</label>
                  <input name="urunlersira" type="text" class="form-control"  placeholder="urunler Sırası Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">urunler model</label>
                  <input name="urunlermodel" type="text" class="form-control"  placeholder="urunler Link Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">urunler renk</label>
                  <input name="urunlerrenk" type="text" class="form-control"  placeholder="urunler Button Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">urunler adet</label>
                  <input name="urunleradet" type="text" class="form-control"  placeholder="urunler Button Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">urunler fiyat</label>
                  <input name="urunlerfiyat" type="text" class="form-control"  placeholder="urunler Button Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">urunler anahtar kelime</label>
                  <input name="urunleranahtar" type="text" class="form-control"  placeholder="urunler Button Giriniz">
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>urunler durum</label>
                    <select name="urunlerdurum" class="form-control select2" style="width: 100%;">
                      <option value="1" selected="selected">Aktif</option>
                      <option value="0">Pasif</option>
                      
                    </select>
                  </div>



                  <div class="form-group">
                    <label>Öne Çıkar</label>
                    <select name="urunleronecikar" class="form-control select2" style="width: 100%;">
                      <option value="1" selected="selected">Öne Çıkar</option>
                      <option value="0">Çıkarma</option>
                      
                    </select>
                  </div>



                </div>

              </div>
              <div class="card-footer">
                <button  name="urunlerkaydet" type="submit" class="btn btn-primary">Gönder</button>
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

