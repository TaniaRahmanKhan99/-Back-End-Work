<?php


include_once 'register.php';

$reg = new Register();



if(isset($_GET['id'])){
    
    $id = base64_decode($_GET['id']);
    
}



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $register = $reg->updateStudent($_POST, $_FILES,  $id);  
}



?>




<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>

       
		body {
		margin:0;
		padding:0;
		font-family: sans-serif;
		background: linear-gradient(#db70b8, #ff8080);
		}

		.login-box {
		position: absolute;
		top: 50%;
		left: 50%;
		width: 700px;
		padding: 40px;
		transform: translate(-50%, -50%);
		background: rgba(0,0,0,.5);
		box-sizing: border-box;
		box-shadow: 0 15px 25px rgba(0,0,0,.6);
		border-radius: 10px;
		}

		.login-box h2 {
		margin: 0 0 30px;
		padding: 0;
		color: #fff;
		text-align: center;
		}

		.login-box .user-box {
		position: relative;
		}

		.login-box .user-box input {
		width: 100%;
		padding: 10px 0;
		font-size: 16px;
		color: #fff;
		margin-bottom: 30px;
		border: none;
		border-bottom: 1px solid #fff;
		outline: none;
		background: transparent;
		}
		.login-box .user-box label {
		position: absolute;
		top:0;
		left: 0;
		padding: 10px 0;
		font-size: 16px;
		color: #fff;
		pointer-events: none;
		transition: .5s;
		}

		.login-box .user-box input:focus ~ label,
		.login-box .user-box input:valid ~ label {
		top: -20px;
		left: 0;
		color: #03e9f4;
		font-size: 12px;
		}

		.a {
		position: relative;
		display: inline-block;
		padding: 10px 20px;
		color: #03e9f4;
		font-size: 16px;
		text-decoration: none;
		text-transform: uppercase;
		overflow: hidden;
		transition: .5s;
		margin-top: 40px;
		letter-spacing: 4px
		}

		.a:hover {
		background: #03e9f4;
		color: #fff;
		border-radius: 5px;
		box-shadow: 0 0 5px #03e9f4,
					0 0 25px #03e9f4,
					0 0 50px #03e9f4,
					0 0 100px #03e9f4;
		}

		.a span {
		position: absolute;
		display: block;
		}

		.a span:nth-child(1) {
		top: 0;
		left: -100%;
		width: 100%;
		height: 2px;
		background: linear-gradient(90deg, transparent, #03e9f4);
		animation: btn-anim1 1s linear infinite;
		}

		@keyframes btn-anim1 {
		0% {
			left: -100%;
		}
		50%,100% {
			left: 100%;
		}
		}

		.a span:nth-child(2) {
		top: -100%;
		right: 0;
		width: 2px;
		height: 100%;
		background: linear-gradient(180deg, transparent, #03e9f4);
		animation: btn-anim2 1s linear infinite;
		animation-delay: .25s
		}

		@keyframes btn-anim2 {
		0% {
			top: -100%;
		}
		50%,100% {
			top: 100%;
		}
		}

		.a span:nth-child(3) {
		bottom: 0;
		right: -100%;
		width: 100%;
		height: 2px;
		background: linear-gradient(270deg, transparent, #03e9f4);
		animation: btn-anim3 1s linear infinite;
		animation-delay: .5s
		}

		@keyframes btn-anim3 {
		0% {
			right: -100%;
		}
		50%,100% {
			right: 100%;
		}
		}

		.a span:nth-child(4) {
		bottom: -100%;
		left: 0;
		width: 2px;
		height: 100%;
		background: linear-gradient(360deg, transparent, #03e9f4);
		animation: btn-anim4 1s linear infinite;
		animation-delay: .75s
		}

		@keyframes btn-anim4 {
		0% {
			bottom: -100%;
		}
		50%,100% {
			bottom: 100%;
		}
		}

    </style>


    <link rel="stylesheet" href="">
</head>

<body>
   
   
   <br><br>
    <div class="container">

        <div class="row ">

            <div class="col-md-2"></div>

            <div class="col-md-8">
                <div class="card shadow">
                
                    <?php
                    
                    if(isset($register)){
                        
                        
                        
                     ?>   
                    
                
                
                    <div class="alert alert-warning alert-dismissible fade show">
                       
                       <strong><?php echo $register; ?></strong>
                       
                       <button type="button" class="close" data-dismiss="alert" aria-close="Close">
                           
                           <span aria-hidden="true">&times;</span>
                       </button>

                    </div>
                    
                    <?php
                    
                    }
                    
                    
                    ?>
                    
                    
                    
            
                    
                    
                    <div class="card-header" style="background-color: #ffe6e6">
                       
                       <div class="row">
                          <div class="col-md-6">						  
                             <h3>Edit Student Information</h3>                             
                          </div>

						  <div class="col-md-6">
                             <a href="index.php" class="btn btn-info float-right">Student List</a>
                              
                          </div>
                           
                       </div>
                        
                    </div>
                    
                    <div class="card-body">


                        <?php
                            
                            $getStd = $reg->getStudentById($id);
                        
                        
                        
                            if($getStd){
                                while($row = mysqli_fetch_assoc($getStd)){
                        ?>

                        
                        <form method="POST" enctype="multipart/form-data">
                            
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Enter your Name" class="form-control" value="<?php echo $row['name'];?>">
    
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter your Email" class="form-control" value="<?php echo $row['email'];?>">
                            
                            <label>Phone</label>
                            <input type="text" name="phone" placeholder="Enter your Phone Number" class="form-control" value="<?php echo $row['phone'];?>">
                            
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control">
                            <img src="<?php echo $row['photo'];?>" style="width:100px;" class="img-thumbnail">
                            <br>

                            <label>Gender:</label><br>
                            <input type="radio" name="gender" value="Male" >
                            <label>Male</label>
                            <input type="radio" name="gender" value="Female" >
                            <label>Female</label>
                            <input type="radio" name="gender" value="Others">
                            <label>Others</label><br>

                            <label >Date of Birth</label>
                            <input type="date" name="birthday" class="form-control" value="<?php echo $row['birthday'];?>">

                            <label>Choose Your University</label>
                            <select  name="uni" class="form-control">
                            <option class="form-control" value="">(select one)</option>
                            <option value="1">University of Melbourne</option>
                            <option value="2">The University of Sydney</option>
                            <option value="3">Monash University</option>
                            <option value="4">University of Queensland</option>
                            <option value="5">Others</option>
                            </select>
                            
                            <label>Address</label>
                            <textarea name="address" class="form-control" placeholder="Your Address"><?php echo $row['address'];?></textarea>

                            <label>Your Comment</label>
                            <textarea name="comment" class="form-control" placeholder="Your Comment" ><?php echo $row['comment'];?></textarea>
                            
                            </label>
                            <label for="terms-and-conditions">
                            <input id="terms-and-conditions" type="checkbox" required name="terms-and-conditions" class="inline" /> I accept the <a href="">terms and conditions</a>
                            </label>
                            <br>
                            
                            <input class="a btn btn-success form-control" style="color:white; background-color:#ff99bb" type="submit" name="submit" value="Update" >
                            <br>
                            <br>

                            </form>

                            <?php           
                                    }
                                }
                            
                            ?>

                    </div>
                
                    


                </div>

            </div>

			

        </div>

    </div>

	<br>
	<br>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>