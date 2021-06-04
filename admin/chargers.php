
<?php     

require "../script/php/connect.php";

?>



<!doctype html>



<html>

	<head>



<?php     





$active= "payment";



require "../script/mlc/script_head.php";

?>





<!-------

	<meta name="viewport" content="width=1024">

   



   <meta name="viewport" content="width=device-width, initial-scale=1">

	

	--->

	

	 <meta name="viewport" content="width=device-width, initial-scale=1">

	

    <meta name="description" content=" FAST AND AMAZING ">

    <meta name="keywords" content=" OYEMART COMPUTERS  ">

 <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="msapplication-tap-highlight" content="no">

    

  <meta http-equiv="pragma" content="no-cache" />



   <title> ALL CHARGERS - OYEMART COMPUTERS </title>

<style>

















</style>

	

	</head>



<body>

	<?php     

require "../script/php/header_admin.php";

?>	

   <div class="container">

   <h1 align='center' class=' tada blue-text'>  ALL CHARGERS </h1>

<br/>

<form method='post'>

     

     <div class="row">

	

	

		<div class="col m1 l1 s0"></div>

		

		<div class="col m10 l10 s12">

			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>

            <div class="card-content">

			<form method='post'>

			<div class="input-field col m3 l3 s12">

				<select required name='payment_location'>

				    <option value="all"   selected >All Location </option>

				

				  <?php 

								

							 	$sql_location = "select id as location_id, name as location_name from $db1.business_locations ";

								$get_locations = $connect ->query($sql_location);	

								while ($get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH)){

					

							

								extract($get_locations_data );

								echo "<option value='$location_id'> $location_name </option>";

									}	

						?>

				</select>

				<label> <b> Select Location </b> </label>

			  </div>

			  

					 <div class="input-field col m3 l3 s12">

			  FROM (DATE)

				<input type="date" required name='start_date'>

			 </div>

			  

			  

			   <div class="input-field col m3 l3 s12">

			  TO (DATE)

				<input type="date" required name='end_date'>

			 </div>

			 

			 

			  

			  <div class="input-field col m3 l3 s12">

				<button type='submit' class='btn deep-orange pulse' name='view_payment'>  VIEW <i class='fa fa-eye'></i></button>

		

			  </div>

			</form>

			

			<div class='row'>

			  </div>

	

			</div>

			</div>

		

		</div>

		

		

		

		<div class="col m1 l1 s0"></div>



	</div>



	

   

      <div class="row " >

	

	

		<div class="col m1 l1 s0"></div>

		

		

		

			<div class="col m10 l10 s12">

				<form method='post'>

				<?php

							if( isset($_POST['view_payment']) ){

								$payment_location = addslashes(htmlentities($_POST['payment_location']));

								 $start_date = addslashes(htmlentities($_POST['start_date']));

								$end_date = addslashes(htmlentities($_POST['end_date']));

								if( $payment_location ==='all'){

								 $get_payments = new run_query("select * from charger where date between '$start_date' and  '$end_date'  order by id desc ");

								

								 }else{

								  $get_payments = new run_query("select * from charger where user_location='$payment_location' and date between '$start_date' and  '$end_date'  order by id desc ");

								

								 }

								 echo " <h3 align='center' style='color:orange'>From  $start_date To  $end_date </h3>";

								if( $get_payments->num_rows >= 1){	



								$no =1;								

											while(	$get_payments_data =	$get_payments->result() ){

										

											extract($get_payments_data );

											

											 	$sql_location = "select id as location_id, name as location_name  from $db1.business_locations where  id= '$user_location' ";

												$get_locations = $connect ->query($sql_location);	

												$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);

												

											extract($get_locations_data );

											

											$get_user = new run_query("select * from users where user_id= '$seller_id' ");

											$get_user_data =	$get_user->result();

											extract($get_user_data );

											

											$get_stock = new run_query("select * from stock where id= '$laptop_id' ");

											$get_stock_data =	$get_stock->result();

											extract($get_stock_data );

											

										

											

													echo "		


															<ul class='collapsible popout ' data-collapsible='accordion'>

																<li>

																  <div class='collapsible-header deep-orange white-text'> 
																  
																  $no - 	$charger_name   -  $date
																   </div>

																  <div class='collapsible-body blue lighten-5'>



																   <table class='bordered striped z-depth-3 ' >

																  <tr> <td> <b>CHARGER NAME: </b></td> <td>    $charger_name </td>  </tr>

																	

																	 <tr> <td> <b>DATE: </b></td> <td>   $date </td>  </tr>

																

																

																  </table>

																    <br/><br/>

																  <table class='bordered striped z-depth-3 ' >

																  <tr> <td> <b>STOCK ID: </b></td> <td>    $laptop_id </td>  </tr>

																 <tr> <td> <b>STOCK MODEL: </b></td> <td>    $model </td>  </tr>

																 <tr> <td> <b>STOCK SERIAL/IMEI: </b></td> <td>    $serial </td>  </tr>

																

																  </table>

																

																  

																   <br/><br/>

																   <table class='bordered striped z-depth-3 ' >

																  <tr> <td> <b>SALE LOCATION: </b></td> <td>    $location_name </td>  </tr>

																	

																	 <tr> <td> <b>SOLD BY: </b></td> <td>   $user_username </td>  </tr>

																

																

																  </table>

																  


																	<br/> <br/><br/> 

																	

																		

																  </div>

																</li>			

																		 </ul>

		

													

													

													";

													

													

													$no++;	

												}

								 

								}else{

										echo "<script>

											alert('No Result Found!');

											

									</script>"; 

								}

							}

							

					?>

					

						</form>

														

			</div>

		

		<div class="col m1 l1 s0"></div>



	</div>



	

</form>



   </div>





	



<br/><br/><br/><br/>



<?php

 

require "../script/php/footer_home.php";

require "../script/mlc/script_foot.php";

?>





</body>



</html>

































