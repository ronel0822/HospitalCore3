<?php 
include 'header.php';
include 'navigation.php';
include 'class/db.php';
include 'class/controller.php';
$object = new Controller;
$stmt2 = $object->getStocks($_GET['id']);
?>

<div class="container">
	<?php
	if(isset($_POST['submitStock'])){
		if($object->addStock($_GET['id'],$_POST['quantity'],$_POST['expirationDate'])){
			?>
				<div class="alert alert-success">
					Add Stocks Success!
				</div>
			<?php
		}
	}
	$stmt = $object->getDrugById($_GET['id']);
		if($row = $stmt->fetch()){
	?>
	<div class="container">
		<button style="float:right;margin-left: 5px; width:10%;" class="btn btn-secondary">UPDATE</button>
		<button style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD STOCK</button>	
		<h3>Viewing of Drug ID: <span><b>&nbsp;<?php echo $row['drug_id']; ?></b></span></h3>
	</div>
	<br>
	<div class="container">
		<div class="container-fluid">
			<div class="row">
			<div class="col-4">
				<span>Name of Drug :</span>
				<br>
					<?php echo ucfirst($row['drug_name']); ?>	
			</div>
			<div class="col-4">
				<span>Type of Drug :</span>
				<br>
					<?php echo ucfirst($row['drug_type']); ?>
			</div>
			<div class="col-4">
				<span> Manufactured </span>
			<br>
				<?php
	                $convert = new DateTime($row["created_at"]); //create datetime object with received data
	                $date = $convert->format('M d, Y'); 
	                $time = $convert->format('h:m A');
	                echo "<small>Date : &nbsp;<strong>".$date."</strong> &nbsp; Time: &nbsp;<strong>".$time."</strong></small>";
            	?>
            	</div>
            <div class="col-8">
            	<br>
				<span>Price : 
					<strong style="font-family:DejaVu Sans Mono; font-size:16px;">
						<u>Php <?php echo number_format($row['drug_price'],2);  ?></u>
					</strong>
				</span>
			</div>
			<div class="col">
            	<br>
				<h4>Available Stocks : 
					<strong style="font-family:DejaVu Sans Mono;">
							<?php 
				  			if($row['current_stocks'] > 0){
							echo $row['current_stocks'];
				  			}else{
				  			 	echo "0";
				  			 }
				  			?>
					</strong>
				</h4>
			</div>
			<div class="col-lg-12">
				<hr>
				<span style="font-size:22px;"><b>Description :</b></span>
				<br>
					&emsp;&emsp;&emsp;<?php echo ucfirst($row['drug_description']); ?>
			</div>
			</div>
		</div>
	</div>

		<div class="container">
			<div class="container-fluid">
				<hr>
				<span style="font-size:22px;"><b>More Information :</b></span>
				<div class="row" align="center">
					<div class="col-4">
						All Inserted Stocks : <strong><?php echo $row['all_stocks'] ?></strong>
					</div>
					<div class="col-4">
						Sold : <strong><?php echo $row['sold'] ?></strong>
					</div>
					<div class="col-4">
						Total Gained : PHP <strong><?php echo number_format($row['total_gained'],2); ?></strong>
					</div>
				</div>
			</div>
		</div>
		
	<?php
		}
	?>
	<div class="container">
		<div class="container-fluid">
			<hr>
			<span style="font-size:22px;"><b>Stocks Information :</b></span>
		</div>
	</div>
	<div class="row" align="center">
		<div class="col">
			<b>Quantity</b>
		</div>
		<div class="col">
			<b>Manufactured Date</b>
		</div>
		<div class="col">
			<b>Expiration Date</b>
		</div>
	</div>
		<?php
			if($stmt2->rowCount() == 0){
				?>
					<div class="container" align="center">
						<span style="font-size:22px;"><b>No Stocks Available</b></span>
					</div>
				<?php
			}
			while($row = $stmt2->fetch()){
		?>
					<div class="row" align="center">
						<div class="col-4">
							<?php echo $row['stock_quantity']; ?>
						</div>
						<div class="col-4">
							<?php
				                $convert = new DateTime($row["created_at"]); //create datetime object with received data
				                $date = $convert->format('M d, Y'); 
				                $time = $convert->format('h:m A');
				                echo "<small><strong>Date:</strong> ".$date." <strong>Time:</strong> ".$time."</small>";
				            ?> 
						</div>
						<div class="col-4">
							<?php

				                $convert = new DateTime($row["expiration_date"]); //create datetime object with received data
				                $date = $convert->format('M d, Y');
				                echo "<small><strong>Date:</strong> ".$date."</small>";
				            ?>
						</div>
					</div>
		<?php
				}
		?>
	</div>
</div>

<!-- Modal -->
<form action="drug-view.php?id=<?php echo $_GET['id']; ?>" method="POST">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Stocks</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="quantity">
          </div>

          <div class="form-group">
            <label for="expirationDate">Expiration Date</label>
            <input type="date" name="expirationDate" class="form-control" id="expirationDate">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="submitStock" value="Submit">
        </div>
      </div>
    </div>
  </div>
</form>

<?php 
include 'footer.php';
?>