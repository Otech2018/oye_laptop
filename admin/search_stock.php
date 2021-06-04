<?php     

require "../script/php/connect.php";

?>



<!doctype html>



<html>

	<head>



<?php     





$active= "search_stock";



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



   <title> SEARCH STOCK - OYEMART COMPUTERS </title>




	

	</head>



<body>

	<?php     

require "../script/php/header_admin.php";

?>	

   <div class="container">

   <h1 style='font-family:arial' align='center' class=' tada blue-text'> <i class='fa fa-search'></i> STOCK </h1>

<br/>



     <div class="row">

	

	

		<div class="col m1 l1 s0"></div>

		

		<div class="col m10 l10 s12">

			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>

            <div class="card-content">

			<?php 


			function btns($id){
				$btns = "<a href='edit_stock.php?stock_id=$id' class='btn blue pulse right'>  EDIT <i class='fa fa-edit'></i></a>

  					<a  class='btn red pulse modal-trigger' href='#del$id' >  Delete <i class='fa fa-trash'></i></a>
                    <div id='del$id' class='modal'>
	                    <div class='modal-content'>
	                      <h4>Are you Sure You Want To Delete  This Laptop?</h4>
	                      <a href='#!' class='modal-action modal-close btn green'>No  <i class='fa fa-close'></i></a>
	                      <a  href='del_laptop.php?stock_id=$id' class='btn red right'>  Yes <i class='fa fa-trash'></i></a>
	                        <br/>    
	                    </div>
                    </div>";
                 return $btns;

			}
				

			include('../search.php'); ?>            	

			</div>

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

































