<?php 
require_once 'header.php';
require_once 'islem/baglanti.php';

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
              <form action="resimyukle" method="post" enctype="multipart/form-data" class="dropzone">
                
                <input type="hidden" name="id" value="<?php echo @$_GET['id'] ?>">

              </form>

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Çoklu Resim</h3> 
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
                       <th> resim</th>
                       <th>Sil</th>
                       
                     </tr>
                   </thead>
                   <tbody>
                    <?php 

                    $cokluresim=$baglanti->prepare("SELECT * from cokluresim  where urun_id=:urun_id order by id asc");
                    $cokluresim->execute(array(

                      'urun_id'=>$_GET['id']
                    ));

                    while  ($cokluresimcek = $cokluresim ->fetch(PDO::FETCH_ASSOC)){ ?>
                      <tr>
                        <td><img src="resimler/cokluresim/<?php echo $cokluresimcek['resim'] ?>" width='100'></td>
                        
                      </td>
                      <form action="islem/islem.php" method="post">
                        <td> 
                         <input type="hidden" name="id" value="<?PHP echo $cokluresimcek['id'] ?>">

                         <input type="hidden" name="resim" value="<?PHP echo $cokluresimcek['resim'] ?>">

                         <button name="cokluresimsil" class="btn btn-danger">Sil</button>

                         
                       </td>

                     </form>

                     
                     
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

