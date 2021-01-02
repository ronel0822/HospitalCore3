<?php 
include 'header.php';
include 'navigation.php';
?>

<div class="col -12">
  <div class="container-fluid">
      <div class="card shadow-sm">
          <div class="navigation card-header shadow-sm">
            <h1 class="h3 mb-0 text-gray-800" style="float: left;">Avail Information</h1>
            <a  href="avail.php" button class="btn btn-primary text-white"  style="float:right; ">BACK</a>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
              <?php
              $id = $_GET['id'];
              $sql = "SELECT * FROM core3_med_avail 
                      INNER JOIN core3_med_pack
                      ON core3_med_avail.med_pack_id = core3_med_pack.id
                      INNER JOIN core3_med_pack_inc 
                      ON core3_med_pack.id = core3_med_pack_inc.med_pack_id
                      WHERE core3_med_avail.id = '".$id."'";
              $result = mysqli_query($conn, $sql);
              if($row = mysqli_fetch_array($result)){
              ?> 
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h5 class="mb-0 text-gray-800"><b><u>Patient Information</u></b></h5>
              </div>
               <p class="mb-0 text-gray"><b>Patient Name: </b> <br><?php echo $row['patient_name']; ?></p><br>
               <p class="mb-0 text-gray"><b>Department: </b> <br><?php echo $row['department']; ?></p><br>
               <p class="mb-0 text-gray"><b>Availed Date: </b> <br><?php echo date_format(date_create($row['created_at']),"F d, Y h:m a") ?></p><br>
               <p class="mb-0 text-gray"><b>Examination Date: </b> <br><?php echo date_format(date_create($row['exam_date']),"F d, Y h:m a") ?></p>
               <br>
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h5 class="mb-0 text-gray-800"><b><u>Package Information</u></b></h5>
              </div>
              <p class="mb-0 text-gray"><b>Package Name: </b> <br><?php echo $row['mp_name']; ?></p><br>
              <p class="mb-0 text-gray"><b>Package Price: </b> <br><?php echo $row['mp_price']; ?></p><br>
              <p class="mb-0 text-gray"><b>Package Descption: </b> <br><?php echo $row['mp_desc']; ?></p>
              
            </div>
            <?php 
                   
          }else{
                echo 'error';
            } ?> 
            <div class="col-sm-6">
            <h5 class="mb-0 text-gray-800"><b>Inclusion(s)</b></h5><br>
              <?php 
              $result1 = mysqli_query($conn, $sql);
              while($rows = mysqli_fetch_array($result1)){ ?>
              <p class='mb-2 text-gray'><?php echo $rows['testname']; ?></p>
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