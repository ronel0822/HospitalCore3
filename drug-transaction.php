<?php
  include'header.php';
  include'navigation.php';
  include'class/db.php';
  include'class/controller.php';
  $object = new Controller;
?>

<div class="col -12">
	<div class="container-fluid">
	    <div class="card shadow-sm">
	        <div class="navigation card-header shadow-sm">
	        <h3 style="float:left";>Drug Transaction</h3>
	        <a href="pharmacy-cashier.php" class="btn btn-primary" style="float:right;">Cashier Section</a>
	        </div>
	        <div class="card-body">
		      	<?php
		      		$test = $object->viewTransaction();
		      	?>
				<table id="dtVerticalScrollExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead align="center">
						<th>#</th>
						<th>Transaction No</th>
						<th>Date</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php
						$count = 1;
							for ($i=count($test)-1; $i > 0 ; $i--) { 
								?>
						<tr>
							<td align="center">
								<?php echo $count; ?>
							</td>
							<td align="center">
								<?php echo $test[$i]["transactionNo"]; ?>
							</td>
							<td align="center">
								<?php
					                $convert = new DateTime($test[$i]["created_at"]); //create datetime object with received data
					                $date = $convert->format('M d, Y'); 
					                $time = $convert->format('h:m A');
					                echo "<strong>Date:</strong> ".$date." <strong>Time:</strong> ".$time;
					            ?>
							</td>
							<td align="center">
								<a href="transaction-view.php?id=<?php echo $test[$i]['transactionNo'] ?>" class="btn btn-primary btn-sm">View</a>
							</td>
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