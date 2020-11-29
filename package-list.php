<?php 
include 'header.php';
include 'navigation.php';
include 'class/db.php';
include 'class/controller.php';
$object = new Controller;
$stmt = $object->getAllDrug();
?>

<div class="col -12">
  <div class="container-fluid">
    <div class="card shadow-sm">
      <div class="navigation card-header shadow-sm">
      <h1 class="h3 mb-0 text-gray-800">List of Medical Package</h1>
      </div>
        <div class="card-body">
          <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th class="th-sm">Package Name
                </th>
                <th class="th-sm">Price
                </th>
                <th class="th-sm">Description
                </th>
                <th class="th-sm">Action
                </th>
              </tr>
            </thead>
          <tbody>
          <?php
            // fetch table
            $count = 1;
            $sql = "SELECT * FROM CORE3_med_pack";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
          ?>
            <tr>
              <td><?php echo $count++ ?></td>
              <td><?php echo $row['mp_name'] ?></td>
              <td><?php echo $row['mp_price'] ?></td>
              <td><?php echo $row['mp_desc'] ?></td>
              <td align="center"><a href="package-view.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm">View</a></td>
            </tr>
            <?php
              }
            }
            else{
              echo" <td colspan='5' align='center'>No Data Found</td>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} )
</script>
<?php 
include 'footer.php';
?>