<?php
include("../model/connect.php");

 if($_SERVER['REQUEST_METHOD']=='POST'){
  $title=$_POST['title'];
  $description=$_POST['description'];
  $categoryid=$_POST['category'];
  $writerid=$_POST['writer'];
  $status=$_POST['status'];
  $image=$_FILES['image'];
  $imgname=$_FILES['image']['name'];
  $imgtype=$_FILES['image']['type'];
  $imgoldlocation=$_FILES['image']['tmp_name'];
  $imgnewlocation="images/$imgname";
  move_uploaded_file($imgoldlocation,$imgnewlocation);
  $newdec=mysqli_real_escape_string($connect,$description);
  $qinsert="INSERT INTO `posts`( `image`, `title`, `description`, `categoryid`, `writerid`, `ststus`, `date`) VALUES ('$imgnewlocation','$title','$newdec ',$categoryid , $writerid,'$status ', Now())";
  $insert=$connect->query($qinsert);
  if($insert){
      header("Location: posts.php");
  }//end of insert
  

 } //end of REQUEST_METHOD
 
 
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    echo $id;
    $qdelete="DELETE FROM `posts` WHERE `id`=$id";
    $delet=$connect->query($qdelete);
    header("Location: posts.php");
  }
  if(isset($_GET['active'])){
    $activeid=$_GET['active'];
    $qupdate="UPDATE `posts` SET `ststus`='active' WHERE `id`=$activeid";
    $update=$connect->query($qupdate);
    header("Location: posts.php");
  }

  
    if(isset($_GET['inactive'])){
      $inactiveid=$_GET['inactive'];
      $qupdate="UPDATE `posts` SET `ststus`='inactive' WHERE `id`=$inactiveid";
     $update=$connect->query($qupdate);
     header("Location: posts.php");


    }
  


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  



<!-- Navbar -->
<?php include "nav.php" ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
  <?php include "aside.php"  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Post Title</label>
                    <input name="title" type="text" class="form-control"  placeholder="Enter Post Title">
                  </div>

                  <div class="form-group">
                    <label >Description</label>
                    <textarea id="summernote" name="description" ></textarea>
                 
                  </div>

                  <div class="form-group">
                    <label >Post image</label>
                    <input name="image" type="file" class="form-control"  placeholder="Enter Post Title">
                  </div>

                  <div class="form-group">
                    <label >Category</label>
                  <select name="category" class="form-control">
<?php $qselcatname="SELECT * FROM `category`"; 
      $selcatname=$connect->query($qselcatname);
      
foreach($selcatname as $catname) {?>

                    <option value="<?=$catname['id'] ?>" > <?= $catname['name']?> </option>
                   
        <?php } ?>            
                  </select>
                  </div>


                  <div class="form-group">
                    <label>writer</label>
                  <select name="writer" class="form-control">

<?php $qselwrname="SELECT * FROM `writers`"; 
      $selwrname=$connect->query($qselwrname);
      foreach($selwrname as $wrname) {?>
                    <option value="<?= $wrname['id'] ?>"><?=  $wrname['name'] ?></option>
                   
        <?php } ?>
                   
                    
                  </select>
                  </div>
                  <div class="form-group">
                    <label >status</label>
                  <select name="status" class="form-control">
                    <option>active</option>
                    <option>inactive</option>
                  </select>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary form-control"><i class="fa fa-plus"></i> Add Post</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
        
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Show Writers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>img</th>
                    <th>title</th>
                    <th>description</th>
                    <th>categoty</th>
                    <th>writer</th>
                    <th>status</th>
                    <th>date</th>
                    <th>actions</th>
                  </tr>
                  </thead>
                  <tbody>
<?php 
$qselect="SELECT * FROM `posts` ORDER BY `id` DESC  ";
$select=$connect->query($qselect);
foreach($select as $p){
?>
                  <tr>
                    <td><?= $p['id'] ?></td>
                    <td>
                     <img src="<?= $p['image'] ?>" width="50" height="60">
                    </td>
                    <td><?= $p['title'] ?></td>
                    <td><?php substr($p['description'] ,5,30)?>...</td>
<?php
$categoryid=$p['categoryid'];
$q="SELECT `name` FROM `category` WHERE `id`=$categoryid"; 
$cat=$connect->query($q);
foreach($cat as $c) {
 ?>
                    <td><?= $c['name'] ?></td>
<?php };

$writerid=$p['writerid'];
$q="SELECT `name` FROM `writers` WHERE `id`=$writerid"; 
$wr=$connect->query($q);
foreach($wr as $r) {
 ?>
                    <td><?= $r['name'] ?></td>
  <?php }?>
                    <td><?= $p['ststus'] ?></td>
                    <td><?= $p['date'] ?></td>
                
                    <td> 
<?php if($p['ststus']=='inactive'){ ?>
                       <a href="posts.php?active=<?= $p['id'] ?>" class="btn btn-success" title="update"><i class="fa fa-check"></i></a>
<?php }else{ ?>
                      <a href="posts.php?inactive=<?= $p['id'] ?>" class="btn btn-warning" title="update"><i class="fa fa-times"></i></a>
<?php } ?>
                      <a href="posts.php?id=<?= $p['id']?>" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                
<?php } ?>

        
                  </tbody>
                  <tfoot>
                  <tr>
                  
                  <th>id</th>
                    <th>img</th>
                    <th>title</th>
                    <th>description</th>
                    <th>categoty</th>
                    <th>writer</th>
                    <th>status</th>
                    <th>date</th>
                    <th>actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
