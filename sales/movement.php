<?php     

require "../script/php/connect.php";

?>



<!doctype html>



<html>

	<head>



<?php     





$active= "stock";



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



   <title> MOVEMENTS - OYEMART COMPUTERS </title>

<style>

















</style>

	

	</head>



<body>

	<?php     

require "../script/php/header_sales.php";

?>	

   <div>

   <h1 style='font-family:arial' align='center' class=' tada blue-text'> <i class='fa fa-history'></i> LAPTOP MOVEMENTS </h1>

<br/>



     <div class="row">

	

	

		<div class="col m1 l1 s0"></div>

		

		<div class="col m10 l10 s12">

			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>

            <div class="card-content">

			<form method='post'>

				<!-- search type starts here -->
  <div class="input-field col m2 l2 s12">
     <select required name='search_column' required >
      <option value='model'   >Laptop Model </option>
      <option value='serial'   >Serial Number </option>
     </select>
  </div>
  <!-- search type ends here -->


			<div class="input-field col m3 l3 s12">

				<input type='text' required name='search'>

				

				<label> <b> <i class='fa fa-search'></i> </b> </label>

			  </div>

			  

					 <div class="input-field col m2 l2 s12">

			  FROM (DATE)

				<input type="date" required name='start_date'>

			 </div>

			  

			  

			   <div class="input-field col m2 l2 s12">

			  TO (DATE)

				<input type="date" required name='end_date'>

			 </div>

			 

			 

			  <div class="input-field col m2 l2 s12">


				

				<button type='submit' class='btn deep-orange pulse' name='view_stock'>  VIEW <i class='fa fa-eye'></i></button>

		

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

	

	

		

		

			<div class="col m12 l12 s12">

			

				

					

						  <table class='bordered striped '>

			

			<tr>

			<th> S/N </th>

			<th> STOCK ID</th>

			<th> DATE </th>

			<th>MODEL</th>

			<th>SENDER</th>

			<th>RECEIVER</th>

			<th>STATUS</th>

		<th>ACTION</th>

			</tr>

			

				<?php

							if( isset($_POST['view_stock']) ){

								$search = addslashes(htmlentities($_POST['search']));

								 $start_date = addslashes(htmlentities($_POST['start_date']));

								$end_date = addslashes(htmlentities($_POST['end_date']));
								$search_column = addslashes(htmlentities($_POST['search_column']));

								

						

								 $get_stocks = new run_query("select * from stock where status >=2 and $search_column  like '%$search%'  ");

								

								

								if( $get_stocks->num_rows >= 1){	

												//code goes here	

																						while(	$get_stocks_data =	$get_stocks->result() ){

										

																									extract($get_stocks_data );

																									 $get_cart = new run_query("select * from movements  where  status_move !='NOT_SET' and stockId='$id' and moveDate between '$start_date' and  '$end_date'  ");

																											if( $get_cart->num_rows >= 1){	

																													$no =1;								

																														while(	$get_cart_data =	$get_cart->result() ){

																															

																																extract($get_cart_data );

																																

																																$get_stock = new run_query("select * from stock where id= '$stockId' ");

																																$get_stock_data =	$get_stock->result();

																																extract($get_stock_data );

																																


																																$get_reciver = new run_query("select user_username as receiver_un, user_location as reciver_location_id  from users where user_id= '$receiver' ");

																																$get_reciver_data =	$get_reciver->result();

																																extract($get_reciver_data );

																																

																																$get_sender = new run_query("select user_username as sender_un, user_location as sender_location_id  from users where user_id= '$sender' ");

																																$get_sender_data =	$get_sender->result();

																																extract($get_sender_data );

																																

																																$sql_reciver_location = "select name as receiver_location_name from $db1.business_locations where id= '$reciver_location_id' ";

																																$reciver_locations = $connect ->query($sql_reciver_location);	

																																$reciver_locations_data = $reciver_locations ->fetch(PDO::FETCH_BOTH);

																																extract($reciver_locations_data );

																																

																																

																																$sql_sender_location = "select name as sender_location_name from $db1.business_locations where id= '$sender_location_id' ";

																																$sender_locations = $connect ->query($sql_sender_location);	

																																$sender_locations_data = $sender_locations ->fetch(PDO::FETCH_BOTH);

																																extract($sender_locations_data );

																																

																																

																																echo "

																																

																																<tr>

																																	<td> $no </td>

																																	<td> $stockId </td>

																																	 <td> $moveDate </td>

																																	<td> $model </td>

																																	<td> $sender_un ( $sender_location_name) </td>

																																	<td> $receiver_un ( $receiver_location_name) </td>

																																	<td> $status_move </td>

																																	<td>

																																		

																																		<a  class='red-text modal-trigger' href='#stock$id' >   <i class='fa fa-info'></i>nfo</a>

																																			

																																				  

																																				  

																																				   <div id='stock$id' class='modal'>

																																						<div class='modal-content'>

																																							<a href='#!' class='modal-action modal-close  red-text right'>  <i class='fa fa-close'></i></a>

																																									  <br/> <b>STOCK ID:  $id </b>

																																									 <br/> <b>MODEL:  $model  </b>

																																									  <br/> <b>SERIAL/IMEI:   $serial  </b>

																																									  <br/> <b>BATERY SERIAL:    $battSerial  </b>

																																									  <br/> <b>HARD DRIVE SIZE:    $HDD  </b>

																																									  <br/> <b>HARD DRIVE TYPE:    $HDDtype </b>

																																									  <br/> <b>RAM SIZE:   $RAM   </b>

																																									  <br/> <b>RAM TYPE:   $RAMtype </b>

																																									 

																																									  <br/><br/><br/> <b>COMMENTS</b><hr/>

																																									  $m_comments

																																									  

																																									

																																						</div>

																																						

																																					  </div>

																																		</td>

																																	</tr>

																																

																																

																																";

																																$no++;

																														}

																														

																													}

																								

			

																							}

																	}
						} //if isset ends

					?>

					

						</table>

														

			</div>

		

		

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

































