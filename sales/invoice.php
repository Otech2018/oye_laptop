<?php     

require "../script/php/connect.php";





		if(isset($_GET['remove']))  {

			$_SESSION['sell_stock_id'] ="";

			 echo "<script>

							window.location.replace(\"invoice.php\");

																										

						</script>";

		}

		

		

		

			if( isset($_GET['stock_id']) ){

								 $stock_id = addslashes(htmlentities($_GET['stock_id'])) ;



								$_SESSION['sell_stock_id'] = $stock_id;

								 echo "<script>

								window.location.replace(\"invoice.php\");

																											

							</script>"; 

								 

					}

					

			

					if( isset($_GET['remove_charger']) ){

								

								$_SESSION['charger'] = '';

								$_SESSION['charger_name'] = '';

								 echo "<script>

								window.location.replace(\"invoice.php\");

																											

							</script>"; 

								 

					}

					

					

				

					

			if(isset($_GET['customer_id']))  {

								

								 $customer_id = addslashes(htmlentities($_GET['customer_id'])) ;

								$get_customer = new run_query("select * from customers  where customer_id='$customer_id' ");

															

														$get_customer_data =	$get_customer->result();

														

															extract($get_customer_data );

															

													$_SESSION['customer_id'] = $customer_id;

													$_SESSION['customer_name'] = $customer_name;

													$_SESSION['customer_address'] = $customer_address;

													$_SESSION['customer_phone'] = $customer_phone;

													$_SESSION['check_cus'] = $customer_permission;

													


												$_SESSION['referrer_amt'] = 	0;						
												$_SESSION['referrer'] = '';
													 echo "<script>

														window.location.replace(\"invoice.php\");

																																	

													</script>";

													

													

																}else{
 												

														 	if(isset($_GET['customer_name']) && isset($_GET['customer_address']) && isset($_GET['customer_phone']) )  {



													 $customer_name = addslashes(htmlentities($_GET['customer_name'])) ;

													 $customer_address = addslashes(htmlentities($_GET['customer_address'])) ;

													 $customer_phone = addslashes(htmlentities($_GET['customer_phone'])) ;

													

													$_SESSION['customer_id'] = "no id";

													$_SESSION['customer_name'] = $customer_name;

													$_SESSION['customer_address'] = $customer_address;

													$_SESSION['customer_phone'] = $customer_phone;

													$_SESSION['check_cus'] = $customer_phone;



													$_SESSION['referrer_amt'] = 	0;						
												$_SESSION['referrer'] = '';
														

															 echo "<script>

																window.location.replace(\"invoice.php\");

																																			

															</script>";

																			

																}

																

																

																}

										

															

																

										if( isset( $_SESSION['check_cus'])  and !empty( $_SESSION['check_cus'])){

										$customer_id = $_SESSION['customer_id'];

										$customer_name = $_SESSION['customer_name'] ;

										$customer_address = $_SESSION['customer_address'];

										$customer_phone = $_SESSION['customer_phone'] ;

										

										}else{

											

																 echo "<script>

																	window.location.replace(\"set_customer.php\");

																																				

																</script>";

										}

				



						

						

						

						 	if(isset($_POST['set_physical_invoice'])  )  {

										 $physical_invoice = addslashes(htmlentities($_POST['physical_invoice'])) ;

													

												$_SESSION['physical_invoice'] = $physical_invoice;

													 echo "<script>

														window.location.replace(\"invoice.php\");

																																			

															</script>";

																			

																}

																

									if(isset($_GET['set_referrer'])  )  {

										 $referrer = addslashes(htmlentities($_GET['referrer'])) ;

										$referrer_amt = addslashes(htmlentities($_GET['referrer_amt'])) ;

												 $_SESSION['referrer_amt'] = 	$referrer_amt;

						

												$_SESSION['referrer'] = $referrer;

													 echo "<script>

														window.location.replace(\"invoice.php\");

																																			

															</script>";

																			

																}

																

																

																

																

											 	if(isset($_GET['remove_referrer'])  )  {

											 $_SESSION['referrer_amt'] = 	0;

						

												$_SESSION['referrer'] = '';

													 echo "<script>

														window.location.replace(\"invoice.php\");

																																			

															</script>";

																			

																}		







									if(isset($_GET['price_btn'])  )  {

										 $sales_price = addslashes(htmlentities($_GET['sales_price'])) ;

										$sales_comment = addslashes(htmlentities($_GET['sales_comment'])) ;

										if(!isset( $_SESSION['referrer_amt'])){

													 $_SESSION['referrer_amt'] ='0';

													$_SESSION['referrer'] = 'NO REFERRER';

												}

												 $_SESSION['sales_comment'] = 	$sales_comment;

												$_SESSION['sales_price'] = $sales_price;

												

											$charger = $_SESSION['charger'];

											$referrer_amt = $_SESSION['referrer_amt'];

											$referrer =$_SESSION['referrer'] ;

											$sales_comment = $_SESSION['sales_comment'] ;

											$sales_price =$_SESSION['sales_price'];

											$physical_invoice =$_SESSION['physical_invoice'] ;

											$customer_id =$_SESSION['customer_id'] ;

											$customer_name =$_SESSION['customer_name'];

											$customer_address =$_SESSION['customer_address'];

											$customer_phone =$_SESSION['customer_phone'] ;

											$check_cus =$_SESSION['check_cus'] ;

											$sell_stock_id =$_SESSION['sell_stock_id'] ;

											$invoice =$_SESSION['invoice'] ;			

												

												

												

												

												

													 echo "<script>

														window.location.replace(\"payment.php\");

																																			

															</script>";

																			

																}																

																

																

	



 	if(isset($_GET['clear_all'])  )  {

											 $_SESSION['referrer_amt'] = 	'';

											$_SESSION['referrer'] = '';

											 $_SESSION['sales_comment'] = '';

											$_SESSION['sales_price'] = '';

											$_SESSION['physical_invoice'] = '';

											$_SESSION['customer_id'] = '';

											$_SESSION['customer_name'] = '';

											$_SESSION['customer_address'] = '';

											$_SESSION['customer_phone'] = '';

											$_SESSION['check_cus'] = '';

											$_SESSION['sell_stock_id'] = '';

										    $_SESSION['charger'] = '';

										

													 echo "<script>

														window.location.replace(\"invoice.php\");

																																			

															</script>";

																			

																}		

?>



<!doctype html>



<html>

	<head>



<?php     





$active= "laptop_mgt";



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



   <title> SALE DETAILS - OYEMART COMPUTERS </title>

<style>

















</style>

	

	</head>



<body>

	<?php     

require "../script/php/header_sales.php";







		$invoice1 =  new run_query("select * from sales ");

						$invoice23 =   $invoice1->num_rows + 100001;

						$invoice = "$user_location-$invoice23 ";

						$_SESSION['invoice'] =  $invoice;

						



						if( isset($_GET['charger_btn']) ){

								 $charger = addslashes(htmlentities($_GET['charger'])) ;

								 if( $charger=='NO_CHARGER' ){

								 

								 	$_SESSION['charger_name'] = 'NO CHARGER';

									$_SESSION['charger'] = 'NO_CHARGER';

										 echo "<script>

											window.location.replace(\"invoice.php\");

																														

										</script>"; 

								 

								 }else{

								 $sql_check = "select * from $db1.products where id='$charger'  and enable_stock =1 ";

								$sql_run_check = $connect ->query($sql_check);	

								 

							if	($sql_run_check ->rowCount() >=1){

								
				
					$result = $sql_run_check ->fetch(PDO::FETCH_ASSOC);

						$name = $result['name'];

						$item_id = $result['id'];

						

						$_SESSION['charger_name'] = $name;

								 



								$_SESSION['charger'] = $charger;

								 echo "<script>

								window.location.replace(\"invoice.php\");

																											

							</script>"; 

							}else{

							

							 echo "<script>

							 alert('Laptop Charger Not In your Location. Try Another Charger ');

								window.location.replace(\"invoice.php\");

																											

							</script>"; 

							

							}	 

					}

	

			}

?>	



			

			

				 

				 

   <div class="container">

   <h1 align='center' class=' tada blue-text'><i class='fa fa-search'></i>   GET DETAILS</h1>

<br/>

<form method='post'>



<div class="row">

	

	

		<div class="col m12 l12 s12">

			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#e6ee9c;'>

            <div class="card-content">

			

			<h3 align='center'>CUSTOMER</h3>

			  

			  

			  

			   <div class="input-field col m6 l6 s12">

				  <input id="email" type="text" required readonly value='<?php echo $customer_name; ?>' >

				  <label for="email">Customer Name </label>

				</div>

			

			  

			  

			  <div class="input-field col m6 l6 s12">

				  <input id="email" type="text" required readonly  value='<?php echo $customer_phone; ?>' >

				  <label for="email"> Customer Phone </label>

				</div>

				

			 <div class="input-field col m12 l12 s12">

				  <input id="email" type="text" required readonly  value='<?php echo $customer_address; ?>' >

				  <label for="email"> Customer Address </label>

				</div>

			

			<div class='row'>

			

				

			  </div>

	

			</div>

			</div>

		

		</div>

		

		



	</div>



	

	

     <div class="row">

	

	

		<div class="col m12 l12 s12">

			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>

            <div class="card-content">

			

			<h3 align='center'>INVOICE</h3>

			  

			  

			  

			   <div class="input-field col m5 l5 s12">

				  <input id="email" type="text" value='<?php echo $invoice; ?>' readonly>

				  <label for="email">INVOICE </label>

				</div>

			

			  

			  <form method='post'>

			  <div class="input-field col m5 l5 s12">

				  <input id="email" type="text" required  name='physical_invoice' <?php 



					if( isset( $_SESSION['physical_invoice'])  and !empty( $_SESSION['physical_invoice'])){

					$physical_invoice = $_SESSION['physical_invoice'];

					echo "value='$physical_invoice' ";  

					}





				  ?>  >

				  <label for="email"> Physical Invoice </label>

				</div>

				

			 <div class="input-field col m2 l2 s12">

				  <center>

				<button type='submit' class='btn deep-orange pulse' name='set_physical_invoice'>  SET </button>

				</center>

			</div>

			</form>

			<div class='row'>

			

				

			  </div>

	

			</div>

			</div>

		

		</div>

		

		



	</div>



	

    



  

      <div class="row">

	

	

		<div class="col m12 l12 s12">

			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#e8eaf6;'>

            <div class="card-content">

			

			<h3 align='center'> SET LAPTOP </h3>

			  
				<?php

				

				 if(isset($_SESSION['sell_stock_id']) && !empty($_SESSION['sell_stock_id'])){

				 

				$sell_stock_id =  $_SESSION['sell_stock_id'];

				$get_stocks = new run_query("select * from stock where id ='$sell_stock_id' ");

				$get_stocks_data =	$get_stocks->result();

				extract($get_stocks_data ); $price = number_format("$price",2,".",","); 

				

				

											$sql_location = "select id as location_id, name as location_name  from $db1.business_locations where id= '$currentLocation'  ";

											$get_locations = $connect ->query($sql_location);	

											$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);

											extract($get_locations_data );

											

											

															

											$get_user = new run_query("select user_username as user_username1 from users where user_id= '$recordedBy' ");

											$get_user_data =	$get_user->result();

											extract($get_user_data );

											
											

											$get_processor_type = new run_query("select * from laptop_processor_type where processor_id= '$processorType' ");

											$get_processor_type_data =	$get_processor_type->result();

											extract($get_processor_type_data );

											

												$get_scr = new run_query("select * from laptop_screen where screen_id= '$screenSize' ");

											$get_scr_data =	$get_scr->result();

											extract($get_scr_data );

												

											if ( $status == 2 ){

												$status = "Not For Sale";

											}else if ( $status == 3 ){

												$status = " For Sale";

											}else  if ( $status == 4 ){

													$status = "<div style='color:red; font-weight:bold'>On Transit</div>";

											}

											

											

								$remove_btn =" &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <a  href='invoice.php?remove=$id' class=' red-text right '><i class='fa fa-close'></i></a>";

										

						

													echo "			

													

															<ul class='collapsible popout ' data-collapsible='accordion'>

																			<li>

																			  <div class='collapsible-header  green accent-2 black-text'> $model  ($RAM  RAM ) ($HDD  HDD)  $remove_btn </div>

																			  <div class='collapsible-body'>

																			  <br/> <b>STOCK ID:  $id </b>

																				 <br/> <b>MODEL:  $model  </b>

																				  <br/> <b>SERIAL/IMEI:   $serial  </b>

																				  <br/> <b>BATERY SERIAL:    $battSerial  </b>

																				  <br/> <b>HARD DRIVE SIZE:    $HDD </b>

																				  <br/> <b>HARD DRIVE TYPE:    $HDDtype </b>

																				  <br/> <b>RAM SIZE:   $RAM </b>

																				  <br/> <b>RAM TYPE:   $RAMtype </b>

																				  <br/> <b>DEDICATED VIDEO RAM:   $VRAM </b>

																				  <br/> <b>PROCESSOR TYPE:   $processor_type </b>

																				  <br/> <b>SCREEN SIZE:   $screen_size </b>

																				  <br/> <b>CURRENT LOCATION:   $location_name </b>

																				  <br/> <b>STATUS:   $status </b>

																				   <br/> <b>PRICE:  $price  </b>

																				      <br/> <b>RECORDED BY:  $user_username1  </b>

																				  <br/> <b>DATE ADDED:   $dateRecorded </b>

																				   <br/> <b>LAST UPDATE:   $lastUpdate </b>

																				  

																				  

																				  <br/><br/><br/> <b>COMMENTS</b><hr/>

																				  $comments

																					<br/> <br/><br/> <b>ISSUES</b> <br/>

																					$issues 

																					<hr/>

																			

																			  </div>

																			</li>

																			

																		 </ul>

		

													

													

													";

					}else{

					
						?>

		<form method='post'>


<!-- row starts -->
<div class='row'>

  
  <div class="col m1 l1 s0"></div>


<!-- location select starts here -->
  <div class="input-field col m3 l3 s12">

          <select required name='stock_location'>

          <?php 

            $loca_selec= " disabled='disabled' ";
            if ($user_permission ==1){

             echo " <option value='all'   >All Location </option>";
              $loca_selec= "";
            }
            
                $sql_location = "select id as location_id, name as location_name from $db1.business_locations ";

          $get_locations = $connect ->query($sql_location); 

          while ($get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH)){

                extract($get_locations_data );

                if( $location_id == $user_location ){

                  echo "<option value='$location_id' selected > $location_name </option>";

                

                }else{

                    echo "<option value='$location_id' $loca_selec > $location_name </option>";

                  } 

                }

            ?>

        </select>

        <label> <b> Select Location </b> </label>

        </div>
        <!-- location select ends here -->



<!-- search type starts here -->
  <div class="input-field col m2 l2 s12">
     <select required name='search_column' required >
      <option value='model'   >Laptop Model </option>
      <option value='serial'   >Serial Number </option>
     </select>
  </div>
  <!-- search type ends here -->


<!-- search text starts here -->
  <div class="input-field col m3 l3 s12">
      <input id="email" type="text" required name='search'>  

          <label for="email"> <i class='fa fa-search'></i> From Stock  </label>

</div>
<!-- search text ends here -->


<!-- search btn starts here -->
  <div class="input-field col m1 l1 s12">
          <button type='submit' class='btn deep-orange pulse' name='view_stock'>   <i class='fa fa-search'></i></button>
</div>
<!-- search btn ends here -->
  


  </div>
  <!-- row closes -->




  <?php

              if( isset($_POST['view_stock']) ){ //btn isset starts here

                $stock_location = addslashes(htmlentities($_POST['stock_location']));
                $search_column = addslashes(htmlentities($_POST['search_column']));
                $search = addslashes(htmlentities($_POST['search']));
                 if( $stock_location ==='all'){
                     $get_stocks = new run_query("select * from stock where status=3 and $search_column  like '%$search%'  ");
                   }else{
                     $get_stocks = new run_query("select * from stock  where currentLocation='$stock_location' and status=3 and $search_column  like '%$search%'  ");
                 }

                   // num of rows starts 
                 if( $get_stocks->num_rows >= 1){  
                      $result_no = $get_stocks->num_rows;
                      echo "<h3 align='center'> $result_no Result(s) for $search ($search_column)</h3>";
                     $no =1;
                     while(  $get_stocks_data =  $get_stocks->result() ){ // the while loops starts
                      extract($get_stocks_data ); 
                      $price = number_format("$price",2,".",","); 

                    $sql_location = "select id as location_id, name as location_name from $db1.business_locations  where  id= '$currentLocation'  ";
                    $get_locations = $connect ->query($sql_location); 
                    $get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);
                    extract($get_locations_data );  

                      $get_user = new run_query("select user_username as user_username1 from users where user_id= '$recordedBy' ");
                      $get_user_data =  $get_user->result();
                      extract($get_user_data );

                      $get_processor_type = new run_query("select * from laptop_processor_type where processor_id= '$processorType' ");
                      $get_processor_type_data =  $get_processor_type->result();
                      extract($get_processor_type_data );
                      
                        $get_scr = new run_query("select * from laptop_screen where screen_id= '$screenSize' ");
                      $get_scr_data = $get_scr->result();
                      extract($get_scr_data );

                      if ( $status == 2 ){
                        $status = "Not For Sale";
                      }else if ( $status == 3 ){
                        $status = " For Sale";
                      }else  if ( $status == 4 ){
                        $status = "<div style='color:red; font-weight:bold'>On Transit</div>";
                      }
                 $btns = "<a  href='invoice.php?stock_id=$id' class='btn green pulse '>  Select  </a>";

  echo "      
 <ul class='collapsible popout ' data-collapsible='accordion'>
    <li>
      <div class='collapsible-header deep-orange white-text'>$no |  $model  ($RAM  RAM ) ($HDD  HDD)   </div>
          <div class='collapsible-body'>
            <div class='z-depth-3 ' style='padding:15px;'>
               <table class='bordered striped' >
                <tr><td>STOCK ID:  </td><td> $id </td></tr>
                 <tr><td>MODEL:  </td><td> $model  </td></tr>
                  <tr><td>SERIAL/IMEI:   </td><td> $serial  </td></tr>
                  <tr><td>BATERY SERIAL:    </td><td> $battSerial  </td></tr>
                  <tr><td>HARD DRIVE SIZE:    </td><td> $HDD  </td></tr>
                  <tr><td>HARD DRIVE TYPE:</td><td>$HDDtype</td></tr> <tr><td>EXTRA HARD DRIVE SIZE:    </td>
                  <td> $extraHDD </td></tr>  <tr><td>EXTRA HARD DRIVE TYPE:    </td>
                  <td> $extraHDDtype </td></tr>
                  <tr><td>RAM SIZE:   </td><td> $RAM  </td></tr>
                  <tr><td>RAM TYPE:   </td><td> $RAMtype </td></tr>
                  <tr><td>DEDICATED VIDEO RAM:   </td><td> $VRAM </td></tr>
                  <tr><td>PROCESSOR TYPE:   </td><td> $processor_type </td></tr>
                  <tr><td>SCREEN SIZE:   </td><td> $screen_size </td></tr>
                  <tr><td>CURRENT LOCATION:   </td><td> $location_name </td></tr>
                  <tr><td>STATUS:   </td><td> $status </td></tr>
                   <tr><td>PRICE:  </td><td> $price  </td></tr>
                    <tr><td>RECORDED BY:  </td><td> $user_username  </td></tr>
                  <tr><td>DATE ADDED:   </td><td> $dateRecorded </td></tr>
                   <tr><td>LAST UPDATE:   </td><td> $lastUpdate </td></tr>
               </table>
              </div>
            <br/><br/><br/> <b>COMMENTS</b><hr/>
            $comments

            <br/> <br/><br/> <b>ISSUES</b> <br/>
            $issues 
            <hr/>

            $btns                         

        </div>

    </li>
</ul>";

$no++;
                      } // the while loops ends
                   }else{ //else for number of rows
                      echo "<h3 align='center'>No Resut Found!</h3>";
                   }
                   // num of rows ends
              }  //btn isset ends here
         }  //if else ends here
  ?>

</form>

	

			</div>

			</div>

		

		</div>

		

		



	</div>



	

	 <div class="row">

	

	

		<div class="col m6 l6 s12">

			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#f0f4c3;'>

            <div class="card-content">

			

			<h3 align='center'>CHARGER</h3>

			

			

				<div class='row'>

				

				<?php 



					if( isset( $_SESSION['charger'])  and !empty( $_SESSION['charger'])){

					$charger_name = $_SESSION['charger_name'];

					echo "

					

					 <form method='GET'>

			  <div class='input-field col m8 l8 s12'>

				  <input id='email' type='text'   name='charger'  readonly  value='$charger_name'>

				  <label for='email'> Selected Charger </label>

				</div>

				

				

			 <div class='input-field col m4 l4 s12'>

				  <center>

					<button type='submit' class='red-text' name='remove_charger'> <i class='fa fa-close'></i></button>

				</center>

			</div>

			</form>

			

			

					

					";  

					}else{    ?>

					

						<form method='get'>

			<div class="input-field col m8 l8 s12">

			

				  <select required name='charger'>

				  <option value='NO_CHARGER'    >No Charger </option>

				<?php 

							

					$sql = "select * from $db1.products where category_id='5'  and enable_stock =1";
					$sql_run = $connect ->query($sql);	

					while ($result = $sql_run ->fetch(PDO::FETCH_ASSOC)){

						$name = $result['name'];

						$item_id = $result['id'];

						echo "   <option value='$item_id'> $name </option>

							<br/>";

							



							}	

						

					

			?>

				

				</select>

				<label> <b> Select Charger </b> </label>

			  </div>

			  

			  

			  <div class="input-field col m4 l4 s12">

					<center>

								<button type='submit' class='btn green' name='charger_btn'> SET </button>

					</center>

			  

			  </div>

			  

			  </form>

			  

					<?php 

					}?>

			

			

			  

			  </div>

			<h3 align='center'>REFERRER</h3>

			

			

				<div class='row'>

			

			<?php 



					if( isset( $_SESSION['referrer'])  and !empty( $_SESSION['referrer'])){

					$referrer = $_SESSION['referrer'];

					$referrer_amt = $_SESSION['referrer_amt'];

					echo "

					

					 <form method='GET'>

			  <div class='input-field col m4 l4 s12'>

				  <input id='email' type='text'   name='referrer'  readonly value='$referrer'>

				  <label for='email'> Referrer </label>

				</div>

				<div class='input-field col m4 l4 s12'>

				  <input id='email' type='number'   name='referrer_amt'  readonly value='$referrer_amt'>

				  <label for='email'> Referrer Amt</label>

				</div>

				

			 <div class='input-field col m2 l2 s12'>

				  <center>

					<button type='submit' class='red-text' name='remove_referrer'> <i class='fa fa-close'></i></button>

				</center>

			</div>

			</form>

			

			

					

					";  

					}else{    ?>

					

					 <p>

			 <br/>

				  <input name="sale" type="radio" id="not" checked  required  onclick="$('#old_cus').hide(); $('#new_cus').hide();  $('#ref_amt').hide();"   />

				  <label for="not">NO REFERRER</label>

				  <br/>

				  <input name="sale" type="radio" id="yes" required  onclick="$('#old_cus').show(); $('#new_cus').hide(); $('#ref_amt').show();" />

				  <label for="yes">REGISTERED CUSTOMER</label>

				 <br/>

				  <input name="sale" type="radio" id="no"  required  onclick="$('#old_cus').hide(); $('#new_cus').show();  $('#ref_amt').show();"  />

				  <label for="no">WALK-IN REFERRER</label>

				</p>

				

				<?php 	

					}





				  ?>

				

			

				

				

			</div>

			

			  	<div class='row'  id='new_cus'  style='display:none;'>

			  

			  

				

			  <form method='GET'>

			  <div class="input-field col m4 l4 s12">

				  <input id="email" type="text" required  name='referrer'   >

				  <label for="email"> Referrer </label>

				</div>

				

				 <div class="input-field col m4 l4 s12">

				  <input id="email" type="number" required  name='referrer_amt'   >

				  <label for="email"> Referrer Amt</label>

				</div> 

				

			 <div class="input-field col m2 l2 s12">

				  <center>

				<button type='submit' class='btn green pulse' name='set_referrer'>  SET </button>

				</center>

			</div>

			</form>

			

		

			

				

			  </div>

			  

			  

			  

			  		<div class='row'  id='old_cus'  style='display:none;'>

			   <form method='post'>

				

			 <div class="input-field col m8 l8 s12">

				  <input id="email" type="text" required name='search_customer'>

				  <label for="email"><i class='fa fa-search'></i>  From Customer</label>

				</div>

				

			  <div class="input-field col m2 l2 s12">

				<button type='submit' class='btn deep-orange pulse' name='view_customer'>  <i class='fa fa-search'></i> </button>

		

			  </div>

			</form>

		

	

		



	</div>



	

			

			<div class='row'>

			

				<div class="col m1 l1 s0"></div>

		

		

		

				<div class="col m10 l10 s12">

				<?php

							if( isset($_POST['view_customer']) ){

								$search_customer = addslashes(htmlentities($_POST['search_customer']));

								 $get_customer = new run_query("  SELECT * FROM `customers` WHERE (customer_id like '%$search_customer%' OR customer_permission like '%$search_customer%' OR customer_Reg_date like '%$search_customer%'  OR customer_name like '%$search_customer%'  OR customer_address like '%$search_customer%'  OR customer_phone like '%$search_customer%'  OR customer_email like '%$search_customer%' )  and  customer_permission !='0'   ");

								

								if( $get_customer->num_rows >= 1){			

								$no =1;

										while(	$get_customer_data =	$get_customer->result() ){

										

											extract($get_customer_data );

											

											

											$sql_location = "select id as location_id, name as location_name  from $db1.business_locations where id= '$user_location'  ";

											$get_locations = $connect ->query($sql_location);	

											$get_locations_data = $get_locations ->fetch(PDO::FETCH_BOTH);

											extract($get_locations_data );

												

											echo "			

													

															<ul class='collapsible popout ' data-collapsible='accordion'>

																			<li>

																			  <div class='collapsible-header deep-orange white-text'> $no |  $customer_name  ($customer_phone ) </div>

																			  <div class='collapsible-body'>

																			<br/> <b> FULL NAME: $customer_name :</b>

																			  <br/> <b> PHONE : $customer_phone </b>

																			  <br/> <b> EMAIL : $customer_email </b>

																			  <br/> <b>ADDRESS :  $customer_address </b>

																			 <br/> <b>PERMISSION:  $customer_permission </b>

																			  <br/> <b>DATE ADDED: $customer_Reg_date </b>

																			

																				<br/> <br/><br/> 

																				

																				 <form method='GET'>

																				 <div class='row'>

																			   <input id='email' type='hidden'   name='referrer'    value='$customer_name'>

																				

																				<div class='input-field col m8 l8 s12'>

																				  <input id='email' type='number'   name='referrer_amt'  required value=''>

																				  <label for='email'> Referrer Amt</label>

																				</div>

																				

																			 <div class='input-field col m4 l4 s12'>

																				  <center>

																					<button type='submit' class='btn green' name='set_referrer'> SET </button>

																				</center>

																			</div> 

																			</div>

																			</form>

																			  </div>

																			</li>

																			

																		 </ul>

		

													

													

													";

													

													$no ++;

														

												}

								 

									}else{

									echo "<script>

										alert('No Result Found!');

												

										</script>"; 

									}

							

							}

							

					?>

					

						

			</div>

		

		<div class="col m1 l1 s0"></div>

		

			  </div>

	

			</div>

			</div>

		

		</div>

		

		

		<div class="col m6 l6 s12">

			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#e3f2fd;'>

            <div class="card-content">

			

			

			  

			   <form method='GET'>

			   <div class="input-field col m12 l12 s12">

				  <input id="email" type="text" required  name='sales_price' <?php 



					if( isset( $_SESSION['sales_price'])  and !empty( $_SESSION['sales_price'])){

					$sales_price = $_SESSION['sales_price'];

					echo "value='$sales_price' ";  }?>  >

					

				  <label for="email">SOLD PRICE </label>

				</div>

			

			 <div class="input-field col m12 l12 s12">

          <textarea id="textarea1" class="materialize-textarea" name='sales_comment'>

		  <?php 



					if( isset( $_SESSION['sales_comment'])  and !empty( $_SESSION['sales_comment'])){

					$sales_comment = $_SESSION['sales_comment'];

					echo "$sales_comment ";  

					}  ?>

		  

		  </textarea>

          <label for="textarea1">Comments</label>

        </div>

				

				  <div class="input-field col m12 l12 s12">

						  <center>

								<button type='submit' class='btn green' name='price_btn'> SUBMIT </button>

								

						

							<a  class='btn red pulse modal-trigger' href="#modal1" >  CANCEL </a>

						</center>

						

						</form>

						  <!-- Modal Structure -->

						  <div id="modal1" class="modal">

							<div class="modal-content">

							  <h4>Are you Sure You Want To Cancel This Transaction?</h4>

								<a href="#!" class="modal-action modal-close btn green">No  <i class='fa fa-close'></i></a>

							

							<a class=" btn red right" href="invoice.php?clear_all=good" >Yes  <i class='fa fa-trash'></i></a>

							

							</div>

										

						 </div>

			       </div>

				   

				   <div class='row'></div>

	

			</div>

		

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

































