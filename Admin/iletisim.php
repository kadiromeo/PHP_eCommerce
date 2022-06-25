<?php require_once 'header.php';

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
          <h3 class="card-title">İletişim Ayarları</h3>  </div>
          <?PHP 

          if (@$_GET['yuklenme']=="basarili") { ?>
            <h5 class="alert-success">BAŞARILI</h5>
            <?PHP }elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
              <h5 class=" alert-danger">BAŞARISIZ</h5>
              <?PHP }

              ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input value="<?PHP echo $ayarcek['telefon'] ?>" name="telefon" type="text" class="form-control"  placeholder="Site Telefon Giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Adres</label>
                    <input value="<?php echo $ayarcek['adres'] ?>" name="adres" type="text" class="form-control"  placeholder="Site Adres Giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">E-Mail</label>
                    <input value="<?PHP echo $ayarcek['email'] ?>" name="email" type="text" class="form-control"  placeholder="EMAİL Giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mesai</label>
                    <input value="<?PHP echo $ayarcek['mesai'] ?>" name="mesai" type="text" class="form-control"  placeholder="Mesai Saati Giriniz">
                  </div>
                </div>
                <div class="card-footer">
                  <button name="iletisimkaydet" type="submit" class="btn btn-primary">Gönder</button>
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

