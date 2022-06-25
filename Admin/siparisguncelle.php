<?php 
require_once 'header.php';
require_once 'sidebar.php';   
require_once 'islem/baglanti.php';


$siparisler=$baglanti->prepare("SELECT * FROM siparisler WHERE siparis_id=:siparis_id");
@$siparisler->execute(array(
  'siparis_id'=>$_GET['id']

));
$sipariscek = $siparisler ->fetch(PDO::FETCH_ASSOC);

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
          <h3 class="card-title">Sipariş Düzenleme Ayarları</h3>  </div>


          
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
                    <label for="exampleInputEmail1">Sipariş ID</label>
                    <input value="<?php echo $sipariscek['siparis_id']; ?>" name="sipid" type="text" class="form-control"  placeholder=" Sipariş ID Giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sipariş Adet</label>
                    <input value="<?php echo $sipariscek['urun_adet']; ?>"  name="adet" type="text" class="form-control"  placeholder="Adet Giriniz">
                  </div>
                </div>
                <div class="card-footer">
                  <button  name="sipduzenle" type="submit" class="btn btn-primary">Gönder</button>
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

