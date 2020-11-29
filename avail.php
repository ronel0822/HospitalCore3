<?php 
  include 'header.php';
  include 'navigation.php';
?>

<div class="col -12">
  <div class="container-fluid">
    <div class="card shadow-sm">
        <div class="navigation card-header shadow-sm">
        <h1 class="h3 mb-0 text-gray-800" style="float: left">List of Patient Avails</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="float: right;">Add Avail</button>
        </div>
      <div class="card-body">
        <table id="dt-basic-checkbox" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>#</th>
            <th class="th-sm">Patient Name
            </th>
            <th class="th-sm">Package Name
            </th>
            <th class="th-sm">Department
            </th>
            <th class="th-sm">Avail Date
            </th>
            <th class="th-sm">Examination Date
            </th>
            <th class="th-sm">Action
            </th>
          </tr>
        </thead>
        <tbody>
        <?php
          // fetch table INNER JOIN core3_med_pack_inc ON core3_med_pack.id = core3_med_pack_inc.med_pack_id
          $count = 1;
          $sql = "SELECT * FROM core3_med_avail 
            INNER JOIN core3_med_pack
            ON core3_med_avail.med_pack_id = core3_med_pack.id
            ";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_array($result)){
        ?>
          <tr>
            <td><?php echo $count++ ?></td>
            <td><?php echo $row['patient_name'] ?></td>
            <td><?php echo $row['mp_name'] ?></td>
            <td><?php echo $row['department'] ?></td>
            <td><?php echo date_format(date_create($row['created_at']),"F d, Y H:s a") ?></td>
            <td><?php echo date_format(date_create($row['exam_date']),"F d, Y") ?></td>
            <td><center><a href="avail-view.php?id=<?php echo $row['0'] ?>" class="btn btn-info btn-sm">View</a></center></td>
          </tr>
          <?php
            }
          }
          else{
            echo" <td colspan='6' align='center'>No Data Found</td>";
          }
          ?>
        </tbody>
      </table>
  </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
 <form action="avail.php" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Adding Patient Avail</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
      <label for="name">Patient Name:</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Patient Name">
    </div>
    <div class="form-group">
      <label for="package">Medical Package:</label>
      <select name="package" class="form-control">
        <option selected disabled>--SELECT PACKAGE--</option>
        <?php
        $sql = "SELECT * FROM core3_med_pack";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
         while($row = mysqli_fetch_array($result)){
          echo "<option value='".$row['id']."' >".$row['mp_name']."</option>";
          }
        }
         ?>
        </select>
      </div>
        <div class="form-group">
          <label for="name">Department:</label>
          <select name="department" class="form-control">
            <option selected disabled>--SELECT DEPARTMENT--</option>
            <option value="Inpatient" >Inpatient</option>
            <option value="Outpatient" >Outpatient</option>
          </select>
        </div>
       </select>
       <div class="form-group">
        <label for="exam_date">Examination date:</label>
        <input type="datetime-local" name="exam_date" date-format="YYYY-mm-dd HH:MI:SS" class="form-control" id="exam_date">
       </div>
      
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="submit">Submit</button>
      </div>
    </div>
  </form>
  </div>
</div>
<?php 
if(isset($_POST['submit'])){
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $package=mysqli_real_escape_string($conn,$_POST['package']);
  $department=mysqli_real_escape_string($conn,$_POST['department']);
  $examination=mysqli_real_escape_string($conn,$_POST['exam_date']);
  $sql = "INSERT INTO core3_med_avail(med_pack_id,patient_name,department,created_at,exam_date)
      VALUES ('".$package."','".$name."','".$department."',NOW(),'".$examination."')";
  $result = mysqli_query($conn, $sql);
  if($result){
    echo "<script> Swal.fire('','Success','success').then(function(){
      location.href = 'avail.php'; }); </script>";
  }else{
    echo "<script> Swal.fire('','Error','error').then(function(){
      location.href = 'avail.php'; }); </script>";
  }
}
?>
<?php 
include 'footer.php';
?>