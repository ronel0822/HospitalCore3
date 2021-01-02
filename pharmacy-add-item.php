<?php 
	include 'header.php';
  include 'navigation.php';
?>

  <div class="card">
    <div class="card-body">
      <div class="form-group">
        <input class="form-control" type="text" name="" style="width:250px; margin-left:75%;" placeholder="Search..">
      </div>
      <select class="browser-default custom-select">
        <option selected>Types Of Medicine's</option>
        <option>Biogesic</option>
        <option>Neozep</option>
        <option>Amoxicillin</option>
        <option>Solmux</option>
      </select>  
      <span>Amount :</span>
        <select class="browser-default custom-select">
          <?php
           
          for($x=1; $x<=100; $x++){
            echo "<option value='".$x."''>".$x."</option>";
          }
          ?>
        </select>
        <span style="margin-top:10px;">Description : 
          <textarea class="form-control" placeholder="Text Here"></textarea>
        </span>
        
    
        <center>
          <button class="btn btn-success">Submit</button>
        </center>
      <br>
  </div>
</div>



<?php
	include 'footer.php';
?>