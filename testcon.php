    <?php  
 $connect = mysqli_connect("localhost", "root", "", "core3");  
 $number = count($_POST["name"]);  
 $id = 1;
 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
           if(trim($_POST["name"][$i] != ''))  
           {  
                $sql = "INSERT INTO CORE3_med_pack_inc(testname,med_pack_id) VALUES('".mysqli_real_escape_string($connect, $_POST["name"][$i])."',$id)";  
                mysqli_query($connect, $sql);  
           }  
      }  
      echo "Data Inserted";  
       echo  $number; 
 }  
 else  
 {  
      echo "Please Enter Name";  
 }  
 ?> 