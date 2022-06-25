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
          <h3 class="card-title">Üye Ekleme Ayarları</h3>  </div>


          
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
                  <label>Resim</label>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Resim</label>
                  <input name="resim" type="file" class="form-control" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kullanıcı Adı</label>
                  <input  name="kadi" type="text" class="form-control"  placeholder=" Kullanıcı Adı Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kullanıcı Şifre</label>
                  <input name="sifre" type="text" class="form-control"  placeholder="Şifre Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kullanıcı Ad Soyad</label>
                  <input name="adsoyad" type="text" class="form-control"  placeholder="Ad Soyad Giriniz">
                </div>

              </div>
              <div class="card-footer">
                <button  name="uyelerkaydet" type="submit" class="btn btn-primary">Gönder</button>
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

