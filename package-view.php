<?php 
include 'header.php';
include 'navigation.php';

if(isset($_POST['submit'])){
  $id = $_GET['id'];
  $sql = "DELETE core3_med_pack_inc, core3_med_pack FROM core3_med_pack INNER JOIN core3_med_pack_inc ON core3_med_pack.id = core3_med_pack_inc.med_pack_id WHERE core3_med_pack.id = '".$id."' ";
  $result3 = mysqli_query($conn,$sql);
  if($result3){
    echo "<script> Swal.fire('','Success','success').then(function(){
      location.href = 'package-list.php'; }); </script>";
  }else{
    echo "<script> Swal.fire('','Error','error'); </script>";
  }
}
?>

<div class="col -12">
  <div class="container-fluid">
      <div class="card shadow-sm">
          <div class="navigation card-header shadow-sm">
            <?php
              $id = $_GET['id'];
              $sql = "SELECT * FROM CORE3_med_pack 
                      INNER
                       JOIN core3_med_pack_inc 
                      ON CORE3_med_pack.id = core3_med_pack_inc.med_pack_id
                      WHERE core3_med_pack.id = '".$id."'";
              $result = mysqli_query($conn, $sql);
              if($row = mysqli_fetch_array($result)){
            ?> 
              <div class="col-md 8">
              <a  href="package-list.php" button class="btn btn-primary text-white"  style="float:right; margin-left: 1px">BACK</a>
                <form action="package-view.php" method="GET">
                  <button class="btn btn-danger" type="submit" name="delete"  style="float:right; margin-right: 2px">Delete Package</button>
                </form>
              <button class="btn btn-success"  style="float:right; margin-right: 2px">Update Package</button>
              <h1 class="h3 mb-0 text-gray-800" style="float: left;">Package Information</h1>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <p class="mb-0 text-gray"><b>Package Name: </b> <br><?php echo $row['mp_name']; ?></p><br>
              </div>
              <p class="mb-0 text-gray"><b>Package Price: </b> <br><?php echo $row['mp_price']; ?></p><br>
              <p class="mb-0 text-gray"><b>Package Descption: </b> <br><?php echo $row['mp_desc']; ?></p><br>
              <br><br>
              <?php 

              }else{
                echo 'error';
              } ?> 
           </div>
            <div class="col-sm-6">
              <h5 class="mb-4 text-gray-800"><b>Inclusion(s)</b></h5>
              <?php 
                $result1 = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($result1)){ ?>
                <h5 class='mb-0 text-gray-800'><?php echo $rows['testname']; ?></h5><br>
              <?php
             } ?>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

<?php 
include 'footer.php';
?>