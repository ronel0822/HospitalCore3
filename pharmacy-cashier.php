<?php 
include 'header.php';
include 'navigation-cashier.php';
include 'class/db.php';
include 'class/controller.php';
$object = new Controller;
$stmt = $object->getAllDrugHavingStocks();
$name = null;
$amount = null;
?>
<div class="container-fluid">
	<div class="row">

		<div class="col-2" align="center" style="border-right: 0.02px solid gray;">
			<span style="font-size:22px;"><b>Patient Order</b></span>
			<br>
			<div class="form-group">
				<input type="number" name="orderNumber" class="form-control" style="margin-bottom: 10px;">
				<input type="button" name="orderSubmit" class="btn btn-primary" value="Submit">
			</div>
			
		</div>

		<div class="col-6" style="border-right: 0.02px solid gray;">
			<center><span style="font-size:22px;"><b>Selection of Item</b></span></center>
			<div class="form-group">
				<label>Quantity :</label>
				<input type="number" name="quantity" id="quantity" class="form-control-sm">
				<span id='quantityWarning' class='badge badge-danger' style='margin-left:5px;'></span>
			</div>
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
				  <tr align="center">
				      <th>#</th>
				      <th>Name</th>
				      <th>Price</th>
				      <th>Type</th>
				      <th>Stocks</th>
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
				      <td><?php echo number_format($row['drug_price'],2); ?></td>
				      <td><?php echo ucfirst($row['drug_type']); ?></td>
  				      	<td>
  				  			<?php 
  				  			if($row['current_stocks'] > 0){
								echo $row['current_stocks'];
  				  			}else{
  				  			 	echo "0";
  				  			 }
  				  			?>
  				      		</td>
				      <td align="center">
				      	<?php 
			  			if($row['current_stocks'] > 0){
							?>
							<button id='selector<?php echo $count; ?>' title="Select" class='btn btn-outline-primary btn-sm' onclick='return addGetParameter(<?php echo $row['drug_id'] ?>)'><i class="fas fa-plus"></i></button>
							<?php
			  			}else{
			  			 	echo "No Stocks";
			  			 }
			  			?>
				      	</td>
				  </tr>
				  <?php
				    $count++;
				    }
				  ?>
				</tbody>
			</table>
		</div>

		<div class="col">
			<center><span style="font-size:22px;"><b>Seleted Items</b></span></center>
			<div id='message'></div>
			<div class="row">
				<div class="col">
					<strong>Quantity</strong>
				</div>
				<div class="col">
					<strong>Name</strong>
				</div>
				<div class="col">
					<strong>Total</strong>
				</div>
			</div>
			<div id="selection"></div>

            <div class='container'>
              <button id='addToReceipt' class="btn btn-success btn-block" disabled="true">SUBMIT</button>
            </div>

            <hr>
            <center><span style="font-size:22px;"><b>Punch</b></span></center>
            <div class="row">
				<div class="col">
					<strong>Quantity</strong>
				</div>
				<div class="col">
					<strong>Name</strong>
				</div>
				<div class="col">
					<strong>Total</strong>
				</div>
			</div>
			<div id='cart'></div>

			<div class='row'>
            <div class='col'>
            </div>
            <div class='col'>
              <strong>TOTAL:</strong>
            </div>
            <div class='col'>
              <strong id='total'></strong>
            </div>
          </div>
          <hr>
          <label for="cash">Cash : </label>
          <input type="number" name="cash" id="cash" class="form-control-sm">
          <button id='submit' class="btn btn-success btn-block" disabled="true"><a id='order-receipt' style="text-decoration: none;color:white;">SUBMIT</a></button>

		</div>

	</div>
</div>
<?php
include 'footer.php';
?>