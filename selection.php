<?php
      include 'class/db.php';
      include 'class/controller.php';
      $id = $_POST['newId'];
      $quantity = $_POST['quantity'];
      $object = new Controller;
      $stmt = $object->getDrugById($id);

      if($row = $stmt->fetch()){
        $amount = $row['drug_price'];
        echo "
                <div class='row'>

                    <div class='col'>
                        <p id='drug_quantity'>".$quantity."</p>
                    </div>


                    <div class='col'>
                    <p id='drug_name'>".$row['drug_name']."</p>
                    </div>

                    <div class='col'>
                      <p>PHP <strong id='drug_amount'>".number_format($row['drug_price'] * $quantity,2)."</strong></p>
                    </div>
                </div>
            ";

      }

?>