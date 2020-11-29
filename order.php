<?php 
  include 'class/db.php';
  include 'class/controller.php';

	$names = $_POST['names'];
	$quantities = $_POST['quantities'];
	$drugIds = $_POST['drugIds'];
	$cash = $_POST['cash'];
	$amounts = $_POST['amounts'];

	$object = new Controller;
	$paymentId = $object->getItems($drugIds,$quantities,$cash,$amounts);

	echo "
		<div class='alert alert-success'>
			<strong>Success! TransactionNo : <i id='transNo'>".$paymentId."</i></strong> <a href='pharmacy-cashier.php'>click here</a> to refresh.
		</div>
	";

?>