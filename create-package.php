<?php 
  include 'header.php';
  include 'navigation.php';
 if(isset($_POST['submit'])){
   $number = count($_POST["name"]);  
   $id = $_POST['id'];
    if($number > 0)  
    {  
      for($i=0; $i<$number; $i++)  
      {  
        if(trim($_POST["name"][$i] != ''))  
        {  
          $sql = "INSERT INTO CORE3_med_pack_inc(testname,med_pack_id) VALUES('".mysqli_real_escape_string($conn,$_POST["name"][$i])."',$id)";  
          mysqli_query($conn, $sql);  
        }  
      }  
    }  
    else  
    {  

    }
      $mp_id = $_POST['id'];
      $mp_name = $_POST['name1'];
      $mp_price = $_POST['price'];
      $mp_desc = $_POST['desc'];
      $sql = "INSERT INTO CORE3_med_pack (id,mp_name,mp_price,mp_desc) 
      VALUES('".$mp_id."','".$mp_name."','".$mp_price."','".$mp_desc."')";
      if(mysqli_query($conn,$sql)){
      echo "<script> Swal.fire('','Success','success').then(function(){
      location.href = 'package-list.php'; }); </script>";
      }else{
        echo "<script> Swal.fire('','Success','success').then(function(){
        location.href = 'create-package.php'; }); </script>";
      }
 } 

  $sql = "SELECT * FROM core3_med_pack ORDER BY id DESC LIMIT 1";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
?>

<div class="col -12">
  <div class="container-fluid">
    <div class="card shadow-sm">
        <div class="navigation card-header shadow-sm">
        <h1 class="h3 mb-0 text-gray-800">Create Medical Package</h1>
        </div>
        <div class="card-body">
          <form action="create-package.php" method="POST" name="add_name" id="add_name">
            <div class="row">
              <div class="col-sm-6">
                <div class="container">
                  <div class="form-group">
                    <label for="id">Package #:</label>
                    <input type="hidden" class="form-control" id="id" value="<?php echo $row['id']+1; ?>" name="id" >
                    <input type="text" class="form-control" id="id"  value="<?php echo $row['id']+1; ?>" name="id" disabled>
                    </div>
                    <div class="form-group">
                    <label for="name">Package Name:</label>
                    <input type="text" class="form-control" id="name1" placeholder="Enter Package Name" name="name1">
                    </div>
                    <div class="form-group">
                    <label for="price">Package Price:</label>
                    <input type="number" class="form-control" id="price" placeholder="Enter Package Price" name="price">
                    </div>
                    <div class="form-group">
                    <label for="desc">Package Description:</label>
                    <textarea type="text" class="form-control" id="desc" placeholder="Enter Package Description" name="desc"></textarea>
                    </div>
                </div>
              </div>
                <div class="col-sm-6">
                  <div class="container">
                    <div class="form-group">
                        <span>Inclusion(s):</span>
                        <table id="dynamic_field"> 
                        <br> 
                        <tr style="height:45px;">  
                          <td><input type="text" name="name[]" placeholder="Enter Additional" class="form-control name_list" /></td>  
                          <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                        </tr>
                        </table>  
                      </div>
                  </div>
              </div> 
            <div class="col-sm-6">
              <div class="container"> 
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </div> 
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
include 'footer.php';
?>

<script>  
$(document).ready(function(){  
     var i=1;  
     $('#add').click(function(){  
          i++;  
          $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
     });  
     $(document).on('click', '.btn_remove', function(){  
          var button_id = $(this).attr("id");   
          $('#row'+button_id+'').remove();  
     });  
     $('#submit').click(function(){            
          $.ajax({  
               url:"create_package.php",  
               method:"POST",  
               data:$('#add_name').serialize(),  
               success:function(data)  
               {  
                    alert(data);  
                    $('#add_name')[0].reset();  
               }  
          });  
     });  
});  
</script>