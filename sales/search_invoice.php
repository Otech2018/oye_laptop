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



   <title> SEARCH INVOICE - OYEMART COMPUTERS </title>

<style>

















</style>

	

	</head>



<body>

	<?php     

require "../script/php/header_sales.php";

?>	

   <div class="container">

   <h1 align='center' class=' tada blue-text'><i class='fa fa-search'></i>   INVOICE </h1>

<br/>

<form method='post'>

     <div class="row">

	

	

		<div class="col m12 l12 s12">

			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>

            <div class="card-content">

			

		

			  

			  

			   <div class="input-field col m5 l5 s12">

				<select required name='invoice_location'>

				     

				  <?php 

							

							 	$sql_location = "select id as location_id, name as location_name  from $db1.business_locations where  id  ='$user_location'   ";

								$get_locations = $connect ->query($sql_location);	

								while ($get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH)){

										

								extract($get_locations_data );

								echo "<option value='$location_id'> $location_name </option>";

									}	

						?>

				</select>

				<label> <b> Select Location </b> </label>

			  </div>

			  

			   <div class="input-field col m5 l5 s12">

				  <input id="email" type="text" required name='invoice_search'>

				  <label for="email"><i class='fa fa-search'></i>  Invoice (Physical Or Internal)  From  Invoice</label>

				</div>

				

			  <div class="input-field col m2 l2 s12">

				<button type='submit' class='btn deep-orange pulse' name='view_invoice'>  <i class='fa fa-search'></i> </button>

		

			  </div>

			

			

			<div class='row'>

			  </div>

	

			</div>

			</div>

		

		</div>

		

		



	</div>



	

   

      

      

      <div class="row " >

	

	

		<div class="col m1 l1 s0"></div>

		

		

		

			<div class="col m10 l10 s12">

				<form method='post'>

				<?php

							if( isset($_POST['view_invoice']) ){

								$invoice_location = addslashes(htmlentities($_POST['invoice_location']));

								 $invoice_search = addslashes(htmlentities($_POST['invoice_search']));

								if( $invoice_location ==='all'){

								 $get_invoice = new run_query("select * from sales where  invoiceNumber like '%$invoice_search%' OR physicalInvoiceNumber like '%$invoice_search%'   order by invoice_id desc");

								

								 }else{

								  $get_invoice = new run_query("select * from sales  where (  invoiceNumber like '%$invoice_search%' OR physicalInvoiceNumber like '%$invoice_search%' ) and locationId='$invoice_location'   order by invoice_id desc ");

								

								 }

								if( $get_invoice->num_rows >= 1){	

								$no =1;								

										while(	$get_invoice_data =	$get_invoice->result() ){

										

											extract($get_invoice_data );

											

											

											 $sql_location = "select id as location_id, name as location_name  from $db1.business_locations where  id= '$locationId'   ";

											$get_locations = $connect ->query($sql_location);	

											$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);

											extract($get_locations_data );

											

											$get_user = new run_query("select * from users where user_id= '$soldBy' ");

											$get_user_data =	$get_user->result();

											extract($get_user_data );

											

											$get_stock = new run_query("select * from stock where id= '$stock_id' ");

											$get_stock_data =	$get_stock->result();

											extract($get_stock_data ); extract($get_invoice_data );

											

										
											

											$add_payment ="";

												if($balance_amt >=1){

													

													$add_payment ="<a class='btn green right' href='payment2.php?add_payment=$invoice_id' title='ADD PAYMENT'><i class='fa fa-money'></i> <i class='fa fa-plus'></i></a>";

												}

												

												$amount = number_format("$amount",2,".",","); 

												$amt_paid = number_format("$amt_paid",2,".",","); 

												$balance_amt = number_format("$balance_amt",2,".",","); 

													echo "			

													

															<ul class='collapsible popout ' data-collapsible='accordion'>

																<li>

																  <div class='collapsible-header deep-orange white-text'> $model ($RAM  RAM) (N$amount) $saleDate </div>

																  <div class='collapsible-body blue lighten-5'>

																  <table class='bordered striped z-depth-3 ' >

																  <tr> <td> <b>STOCK ID: </b></td> <td>    $stock_id </td>  </tr>

																 <tr> <td> <b>STOCK MODEL: </b></td> <td>    $model </td>  </tr>

																 <tr> <td> <b>STOCK SERIAL/IMEI: </b></td> <td>    $serial </td>  </tr>

																

																<tr> <td> <b>INVOICE NUMBER: </b></td> <td>   $invoiceNumber </td>  </tr>

																	 <tr> <td> <b> PHYSICAL INVOICE NUMBER: </b></td> <td>   $physicalInvoiceNumber </td>  </tr><tr> <td> <b> STATUS: </b></td> <td>   $status </td>  </tr>

																  </table>

																 <br/><br/>

																    <table class='bordered striped z-depth-3 ' >

																  <tr> <td> <b>CUSTOMER NAME: </b></td> <td>    $buyerName</td>  </tr>

																 <tr> <td> <b>CUSTOMER ADDRESS: </b></td> <td>    $buyerAddress</td>  </tr>

																 <tr> <td> <b>CUSTOMER PHONE </b></td> <td>    $buyerPhone </td>  </tr>

																

																 </table>

																   <br/><br/>

																   <table class='bordered striped z-depth-3 ' >

																  <tr> <td> <b>SALE LOCATION: </b></td> <td>    $location_name </td>  </tr>

																	<tr> <td> <b> DATE SOLD: </b></td> <td>   $dateSold </td>  </tr>

																	 <tr> <td> <b> PRICE SOLD: </b></td> <td>  <b> $amount </b></td>  </tr>

																	<tr> <td> <b> AMOUNT PAID: </b></td> <td>   $amt_paid </td>  </tr>

																	 <tr> <td> <b> BALANCE : </b></td> <td style='color:red;'>   $balance_amt </td>  </tr>

																	



																	<tr> <td> <b>SOLD BY: </b></td> <td>   $user_username </td>  </tr>

																

																

																  </table>

																  

																  

																  

															

																  <br/><br/><br/> <b>COMMENTS</b><hr/>

																  $invoice_comments

																	<br/> <br/><br/> 

																	<a class='btn blue ' href='payments.php?invoice_id=$invoiceNumber' title='View PAYMENT'>VIEW PAYMENT(S)</a>

												

																	$add_payment	

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



   </div>





	



<br/><br/><br/><br/>



<?php

 

require "../script/php/footer_home.php";

require "../script/mlc/script_foot.php";

?>





</body>



</html>

































