<?php
	$id = null;
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header("location:drug-transaction.php");
	}	

	include'header.php';
    include'class/db.php';
    include'class/controller.php';
	$object = new Controller;
    try {
		$stmt = $object->viewTransactionView($id);
    } catch (PDOException $e) {
        header('location:drug-transaction.php');
    }
	$total = null;
	include'navigation.php';
?>

<div class="col-12">
	<div class="container-fluid">
	    <div class="card shadow-sm">
	        <div class="navigation card-header shadow-sm">
	        <i class="fas fa-receipt"></i></i> Drug Transaction
	        </div>
	        <div class="card-body">
	        	<?php 
	        		if($row = $stmt->fetch()){
                    $price = $row['drug_price'];
    				$total+=$price * $row['quantity'];
    			?>

    			<div class="row">
    				<div class="col">
    					<h4>Transaction Number: <strong><?php echo $row['transactionNo']; ?></strong></h4>
    				</div>
    				<div class="col">
    					<?php
			                $convert = new DateTime($row["created_at"]); //create datetime object with received data
			                $date = $convert->format('M d, Y'); 
			                $time = $convert->format('h:m A');
			                echo "<small style='float:right;'><strong>Date:</strong> ".$date." <strong>Time:</strong> ".$time."</small>";
			            ?>
    				</div>
    			</div>
    			<hr>
    			<h5>Orders:</h5>

    			<div class="row">
    				<div class="col">
    					<strong>NAME</strong>
    				</div>
    				<div class="col">
    					<strong>PRICE</strong>
    				</div>
    				<div class="col">
    					<strong>QUANTITY</strong>
    				</div>
    				<div class="col">
    					<strong>AMOUNT</strong>
    				</div>
    			</div>
    			<br>

				<div class="row">
    				<div class="col">
    					<?php echo $row['drug_name']; ?>
    				</div>
    				<div class="col">
    					PHP <?php echo number_format($price,2); ?>
    				</div>
    				<div class="col">
    					<?php echo $row['quantity']; ?>
    				</div>
    				<div class="col">
    					PHP <?php echo number_format($price * $row['quantity'],2); ?>
    				</div>
    			</div>
    			<?php
    				while($rows = $stmt->fetch()){
                    $price = $row['drug_price'];
                    $total+=$price * $rows['quantity'];
				?>
				<br>
				<div class="row">
    				<div class="col">
    					<?php echo $rows['drug_name']; ?>
    				</div>
    				<div class="col">
    					PHP <?php echo number_format($price,2); ?>
    				</div>
    				<div class="col">
    					<?php echo $rows['quantity']; ?>
    				</div>
    				<div class="col">
    					PHP <?php echo number_format($price * $rows['quantity'],2); ?>
    				</div>
    			</div>
				<?php
    				}
    			?>
                <hr>
    			<div class="row">
    				<div class="col">

    				</div>
    				<div class="col">

    				</div>
    				<div class="col">
    					Sub Total:
    				</div>
    				<div class="col">
    					PHP <?php  echo number_format($total,2); ?>
    				</div>
    			</div>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>
                    <div class="col">
                        VAT:
                    </div>
                    <div class="col">
                        PHP <?php  $vat = $total * 0.12; echo number_format($vat,2); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>
                    <div class="col">
                        Sub Total:
                    </div>
                    <div class="col">
                        PHP <strong><?php  echo number_format($total + $vat,2); ?></strong>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>
                    <div class="col-6">
                        <a href="../Cashier/order-receipt.php?transNo=<?php echo $row['transactionNo']; ?>" target="_blank" class="btn btn-primary btn-sm btn-block">View Receipt</a>
                    </div>
                </div>

    			<?php
    				}else{
				?>
				<p>No data found in this ID. <a href="transaction.php">click here</a> to back.</p>
				<?php
    				}
    			?>
	        </div>
	    </div>
	</div>
</div>

<?php 
	include 'footer.php';
?>
