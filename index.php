<!DOCTYPE html>
<?php

include_once 'register.php';


$reg = new Register();







?>






<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
</head>

<body>
      
    <br><br>
    <div class="container">
       <div class="row d-flex justify-content-center">
          <div class="col-md-12">
             <div class="card shadow">
                 
             </div>
             
             <div class="card-header">
                <div class="row">
                   <div class="col-md-6">
                      <h3>All Student Information</h3>
                       
                   </div>
                   
                   <div class="col-md-6">
                      
                      <a href="addStudent.php" class="btn btn-info float-right">Add Student</a>
                       
                   </div>
                    
                </div>
                 
             </div>
             
             
             <div class="card-body" style="text-align:center">
                
                <table class="table table-bordered">
                   
                   <tr>
                       <th>Name</th>
                       <th>E-mail</th>
                       <th>Phone</th>
                       <th>Address</th>
                       <th>Photo</th>
                       <th>Gender</th>
                       <th>Birthday</th>
                       <th>Uni</th>
                       <th>Comment</th>
                       <th>Action</th>
                   </tr>
                   
                   
                   <?php
                    
                    $allstudent = $reg->showStudent();
                    
                    if($allstudent){
                        
                        while($row = mysqli_fetch_assoc($allstudent)){
                            
                            ?>
                            
                           <tr>
                               <td> <?php echo $row['name'];  ?> </td>
                               <td> <?php echo $row['email'];  ?> </td>
                               <td> <?php echo $row['phone'];  ?> </td>
                               <td> <?php echo $row['name'];  ?> </td>
                               <td><img src="<?php echo $row['photo'];  ?>" style="width:100px;"></td>
                               <td> <?php echo $row['gender'];  ?> </td>
                               <td> <?php echo $row['birthday'];  ?> </td>
                               <td> <?php echo $row['uni'];  ?> </td>
                               <td> <?php echo $row['comment'];  ?> </td>
                               <td>
                                 <a href="editStudent.php?id=<?php echo base64_encode($row['studentID'])?>" class="btn btn-warning">Edit</a>
                                 <a href="#" class="btn btn-danger">Delete</a>
                               </td>
                           </tr>
                    <?php    
                        }
                    }
                    
                    
                    
                    ?>
                   
                   
                    
                </table>
                 
             </div>
             
             
             
              
          </div>
           
       </div>
        
    </div>
   
   
   
   
   
   
   
   
   
   
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
