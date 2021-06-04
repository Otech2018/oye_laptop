





<!--------NAV MENU starts------>



 <nav>

    <div class="nav-wrapper orange darken-4"  >

	

  

 <ul id="stock_mob" class="dropdown-content">

<li><a style='font-family:arial !important;' href="items_for_sale.php"> <i class="fa fa-cart-arrow-down"></i>&nbsp;&nbsp;&nbsp;  ITEMS FOR SALE </a></li>

<li><a style='font-family:arial !important;' href="items_not_for_sale.php"> <i class="fa fa-cart-arrow-down"></i>&nbsp;&nbsp;&nbsp;  ITEMS NOT FOR SALE </a></li>

<li><a style='font-family:arial !important;'  href="movement.php"> <i class="fa fa-history"></i>&nbsp;&nbsp;&nbsp; MOVEMENTS </a></li>



 <li><a style='font-family:arial !important;' href="../"> <i class="fa fa-sign-out"></i>&nbsp;&nbsp;&nbsp; LOG OUT </a></li>



</ul>





 <ul id="stock_desk" class="dropdown-content">

<li><a style='font-family:arial !important;' href="items_for_sale.php"> <i class="fa fa-cart-arrow-down"></i>&nbsp;&nbsp;&nbsp;  ITEMS FOR SALE </a></li>

<li><a style='font-family:arial !important;' href="items_not_for_sale.php"> <i class="fa fa-cart-arrow-down"></i>&nbsp;&nbsp;&nbsp;  ITEMS NOT FOR SALE </a></li>

<li><a style='font-family:arial !important;'  href="movement.php"> <i class="fa fa-history"></i>&nbsp;&nbsp;&nbsp; MOVEMENTS </a></li>



 <li><a style='font-family:arial !important;' href="../"> <i class="fa fa-sign-out"></i>&nbsp;&nbsp;&nbsp; LOG OUT </a></li>



</ul>



<a style='font-family:arial !important;' href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i> </a>

		



				

		

        <div id="nav-mobile" class="left hide-on-med-and-down" >

			<a style='font-family:arial !important;' class="standard-logo" href="stock_home.php">

                   <span  style="font-size:50px; position:absolute; top:5px; left:100px; "><img src="../script/img/logo.jpg" alt=" icon" width="150px"  /></span> </a>

		<ul style="position:absolute; top:-7px; right:0px; line-height:1px;">

		

		<li><a style='font-family:arial !important;' href="stock_home.php" class="<?php if ($active === "stock_home"){ echo 'yellow-text';}else { echo 'white-text';} ?>"><b><i class="fa fa-home"></i> &nbsp; DASHBOARD</b></a></li>

			  

        <li><a style='font-family:arial !important;' href="add_stock.php" class="<?php if ($active === "add_stock"){ echo 'yellow-text';}else { echo 'white-text';} ?>"> <i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; ADD STOCK </a></li>

 <li><a style='font-family:arial !important;' href="all_stock.php" class="<?php if ($active === "all_stock"){ echo 'yellow-text';}else { echo 'white-text';} ?>"> <i class="fa fa-cart-arrow-down"></i>&nbsp;&nbsp;&nbsp; ALL STOCK </a></li>

 <li><a style='font-family:arial !important;' href="search_stock.php" class="<?php if ($active === "search_stock"){ echo 'yellow-text';}else { echo 'white-text';} ?>"> <i class="fa fa-search"></i>&nbsp;&nbsp;&nbsp; SEARCH STOCK </a></li>

  <li><a style='font-family:arial !important;' href="sold_items.php" class="<?php if ($active === "sold_items"){ echo 'yellow-text';}else { echo 'white-text';} ?>"> <i class="fa fa-cart-arrow-down"></i>&nbsp;&nbsp;&nbsp; SOLD ITEMS  </a></li>



	  <li><a style='font-family:arial !important;'  href="#!" data-activates="stock_desk"  class="dropdown-button  <?php if ($active === "stock"){ echo 'yellow-text';}else { echo 'white-text';} ?>"><b><i class="fa fa-ellipsis-v fa-2x"></i></b> </a></li>

			  



  </ul>

    </div> </div>



	 </nav>





 <div id="slide-out" class="side-nav" style= "background-color:white;  " >

   <ul> 

   <center>

	<a style='font-family:arial !important;' class="standard-logo" href="stock_home">&nbsp;&nbsp;&nbsp;<img class="x1" src="../script/img/logo.jpg" alt=" icon"  height="100px" />

                    </a> </center>

<hr />

<li><a style='font-family:arial !important;' href="stock_home.php" class="<?php if ($active === "stock_home"){ echo 'orange-text text-darken-4';}else { echo 'blue-text text-darken-3';} ?>"><b><i class="fa fa-home"></i> &nbsp; DASHBOARD</b></a></li>

		

    <li><a style='font-family:arial !important;' href="add_stock.php" class="<?php if ($active === "add_stock"){ echo 'orange-text text-darken-4';}else { echo 'blue-text text-darken-3';} ?>"> <i class="fa fa-plus"></i>&nbsp;ADD STOCK </a></li>

 <li><a style='font-family:arial !important;' href="all_stock.php" class="<?php if ($active === "all_stock"){ echo 'orange-text text-darken-4';}else { echo 'blue-text text-darken-3';}  ?>"> <i class="fa fa-cart-arrow-down"></i>&nbsp; ALL STOCK </a></li>

 <li><a style='font-family:arial !important;' href="search_stock.php" class="<?php if ($active === "search_stock"){ echo 'orange-text text-darken-4';}else { echo 'blue-text text-darken-3';}  ?>"> <i class="fa fa-search"></i>&nbsp;&nbsp;&nbsp; SEARCH STOCK </a></li>

  <li><a style='font-family:arial !important;' href="sold_items.php" class="<?php if ($active === "sold_items"){ echo 'orange-text text-darken-4';}else { echo 'blue-text text-darken-3';}  ?>"> <i class="fa fa-cart-arrow-down"></i>&nbsp;&nbsp;&nbsp; SOLD ITEMS  </a></li>

 

  <li><a style='font-family:arial !important;' href="items_for_sale.php" class="<?php if ($active === "sold_items"){ echo 'orange-text text-darken-4';}else { echo 'blue-text text-darken-3';}  ?>"> <i class="fa fa-cart-arrow-down"></i>&nbsp; ITEMS FOR SALE  </a></li>

  <li><a style='font-family:arial !important;' href="items_not_for_sale.php" class="<?php if ($active === "sold_items"){ echo 'orange-text text-darken-4';}else { echo 'blue-text text-darken-3';}  ?>"> <i class="fa fa-cart-arrow-down"></i>&nbsp;ITEMS NOT FOR SALE  </a></li>

 

			  <li><a style='font-family:arial !important;' href="../" class="<?php if ($active === "fdd"){ echo 'orange-text text-darken-4';}else { echo 'blue-text text-darken-3';}  ?>"><b><i class="fa fa-sign-out"></i>&nbsp; LOG OUT</b></a></li>

			  

	</ul>

	</div>



	 

<!--------NAV MENU ENDS------>



<br/>

<h4 class='ui label blue-text'> 

<?php 



if( !loggedin() ){



	echo "<script>	window.location.replace(\"index.php\"); </script>";

}





$user_data_id = $_SESSION['user_id'];

  

	$user = new run_query("select * from users where user_id = '$user_data_id' and user_status ='1'");

	$user_data =	$user->result();

	extract($user_data );

	

		$sql_location2 = "select id as location_id, name as user_location2  from $db1.business_locations where id='$user_location' ";

					$get_locations2 = $connect ->query($sql_location2);	

					$get_locations_data2 = $get_locations2 ->fetch(PDO::FETCH_BOTH);

					

								extract($get_locations_data2 );

								



if ($user_permission !=2){



 echo "<script>	window.location.replace(\"index.php\"); </script>";

}



echo "Hello  $user_username   | Date:  $Date_lg <hr/>  $user_location2 ";  ?>

</h4>









