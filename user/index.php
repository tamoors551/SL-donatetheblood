
<?php 

 
	include 'include/header.php'; 
	if(isset($_SESSION['user_id']) &&!empty($_SESSION['user_id'])){

	
	if(isset($_POST['date'])){
		$showformdata= '
		
		
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>Are you sure to update your record?</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<form target="" method="POST">
	<br>
	<input type="hidden" name="userID" value="' .$_SESSION['user_id'].'">
	<button type="submit" name="updatesave" class="btn btn-danger">Yes</button>

	<button type="button" class="btn btn-info" data-dismiss="alert">
	<span aria-hidden="true">Oops! No </span>
	</button>      
</form>
</div>
		
		';
	}
	if(isset($_POST['userID'])){
		$userID= $_POST['userID'];
		$crntdate= date_create();
		$crntdate= date_format($crntdate, 'Y-m-d');
		$sql= "UPDATE `datablood` SET `save_life_date`= '$crntdate' WHERE id='$userID'";
		if(mysqli_query($connection,$sql)){
			$_SESSION['save_life_date']=$crntdate;

			header("Location:index.php");
		}else{
			echo "Data does not inserted.";
		}
}	}
?>


<style>
	h1,h3{
		display: inline-block;
		padding: 10px;

		.name{
		color: #e74c3c;
		font-size: 22px;
		font-weight: 700;
	}
	.donors_data{
		background-color: white;
		border-radius: 5px;
		margin:20px 5px 0px 5px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		-moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		padding: 20px;
	}
	}
</style>

			<div class="container" style="padding: 60px 0;">
			<div class="row">
				<div class="col-md-12 col-md-push-1">
					<div class="panel panel-default" style="padding: 20px;">
						<div class="panel-body">
							
								<div class="alert alert-danger alert-dismissable" style="font-size: 18px; display: none;">
    						
    								<strong>Warning!</strong> Are you sure you want a save the life if you press yes, then you will not be able to show before 3 months.
    							
    							<div class="buttons" style="padding: 20px 10px;">
    								<input type="text" value="" hidden="true" name="today">
    								<button class="btn btn-primary" id="yes" name="yes" type="submit">Yes</button>
    								<button class="btn btn-info" id="no" name="no">No</button>
    							</div>
  							</div>
							<div class="heading text-center">
								<?php
								 $name = $_SESSION['name'];

							   	   echo	"<h3>Welcome </h3> <h1> $name </h1>"; 
							?>
							</div>
							<p class="text-center">Here you can mennage your account update your profile</p>

							
						   
							<div class="test-success text-center" id="data" style="margin-top: 20px;">

                            <?php
							$diffMonth="";
							
							$savelifedate= $_SESSION['save_life_date'];  
							if($savelifedate=='0'){

								$startdate = date_create('$savelifedate');
								$enddate = date_create();

								$diffdate = datediffer($startdate,$enddate);
								$diffMonth= $diff->m;


							

							}else{
								if($diffMonth >=3){

									echo '<form target="" method="POST">
									<button style="margin-top: 20px;" name="date" id="save_the_life" type="submit" class="btn btn-lg btn-danger center-aligned ">Save The Life</button>
									</form>';

								}else{

									echo '<div class=" donors_date">
								<span class="name">
								  <h2>Congratulation!</h2> </span>
								<span>you already safe the life.you will donate the blood after three months. We are very thankful to you.</span>
								</div>';
							}
						}

								



								
							                                                       
							?>


							
						       
							
                <!-- Display Message here-->
				<?php if(isset($showformdata)) echo $showformdata;                                  ?>
 


						</div>
					</div>
				</div>
			</div>
		</div>
		
		
<?php

include 'include/footer.php'; 
?>