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
        <h3 style="float: left;">Inventory</h3>
      </div>
        <div class="card-body">
          <table class="table table-striped table-bordered">
            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Medicine Name</th>
              <th scope="col">Price</th>
              <th scope="col">Type of Drug</th>
              <th scope="col">Manufactured Date</th>
              <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
              <?php
              $count = 1;
                while ($row = $stmt->fetch()) {
                  ?>
              <tr align="center">
                  <td><?php echo $count; ?></td>
                  <td><?php echo ucfirst($row['drug_name']); ?></td>
                  <td><?php echo ucfirst($row['drug_price']); ?></td>
                  <td><?php echo ucfirst($row['drug_type']); ?></td>
                  <td>
                    <?php
                        $convert = new DateTime($row["created_at"]); //create datetime object with received data
                        $date = $convert->format('M d, Y'); 
                        $time = $convert->format('h:m A');
                        echo "<small><strong>Date:</strong> ".$date." <strong>Time:</strong> ".$time."</small>";
                    ?>  
                  </td>
                  <td align="center"><a href="drug-view.php?id=<?php echo $row['drug_id']; ?>" title="View" class="btn btn-primary btn-sm">View</a></td>
              </tr>
              <?php
                $count++;
                }
              ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php 
include 'footer.php';
?>