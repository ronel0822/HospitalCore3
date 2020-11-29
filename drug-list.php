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
          <?php
              if(isset($_POST['submitDrug'])){
                if($object->addDrug($_POST['name'],$_POST['type'],$_POST['description'],$_POST['price'])){
          ?>
          <div class="alert alert-success">
            Adding Success!
          </div>
          <?php
            $stmt = $object->getAllDrug();
               }
            }
          ?>

          <h3 style="float:left;">Drug List</h3>
          <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;">Add Drug</button>
          </div>
        <div class="card-body">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr align="center">
                  <th>#</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Type</th>
                  <th>Manufactured Date</th>
                  <th>Action</th>
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
      <form method="POST">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Drug</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="name">Drug Name:</label>
                  <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="type">Drug Type:</label>
                  <input type="text" name="type" class="form-control" id="type">
                </div>
                <div class="form-group">
                  <label for="description">Drug Description:</label>
                  <textarea id="description" name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label for="price">Drug Price:</label>
                  <input type="number" name="price" class="form-control" id="price">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="submitDrug" value="Submit">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php 
include 'footer.php';
?>