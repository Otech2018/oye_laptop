<?php     
require "../script/php/connect.php";
?>

<!doctype html>

<html>
	<head>

	
<?php     


$active= "location";

require "../script/mlc/script_head.php";


$cookie_s = "authorize";

$get_authorize = new run_query("select cookie_name from authorize where cookie_id = 1");  
						    $get_authorize_data =	$get_authorize->result();
						    extract($get_authorize_data );
						    
if(isset($_COOKIE[$cookie_s])){
    $current_cookie = $_COOKIE[$cookie_s];
    if($current_cookie == $cookie_name){
  $cookie_title = "DE-AUTHORIZE THIS SYSTEM";
  $cookie_button = "orange";
  $cookie_sign = "minus";
  $cookie_button_name = "deauthorize";
    }
  
}else{
    
  $cookie_title = "AUTHORIZE THIS SYSTEM";
  $cookie_button = "green";
  $cookie_sign = "plus";  
  $cookie_button_name = "authorize";
}
  
  
				if( isset($_POST['add_cookie']) ){
				 $cookie_name = addslashes(htmlentities($_POST['cookie_name']));
				$cookie_time = addslashes(htmlentities($_POST['cookie_time']));
					
					//	$query_check  =new run_query("select * from authorize //where cookie_name='$cookie_name' ");
					//	if( $query_check->num_rows >= 1){
							//	  echo "<script>
								//			alert('Cookie Name  Already Exist//..Try Using A Different Name  ');
									//		window.location.replace(\"auth.php\"//);
											
									//</script>"; 
					//	}else{
						
						$query_run  =new run_query("update authorize set cookie_name='$cookie_name', cookie_time='$cookie_time' where cookie_id = 1");
							 
							  echo "<script>
											alert('Authorization Password Updated Successfully');
											window.location.replace(\"auth.php\");
											
									</script>"; 
						
						}
						if( isset($_POST['authorize']) ){
						    
						    header("Location: Set System.php");
								
						    
						}
						
						if( isset($_POST['deauthorize']) ){
						    header("Location: Unset System.php");
						}

				
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

   <title> SYSTEM AUTHORIZATION  - OYEMART COMPUTERS </title>
<style>








</style>
	
	</head>

<body>
	<?php     
require "../script/php/header_admin.php";
?>		
   <div class="container">
   <h1 align='center' class=' tada blue-text'><i class='fa fa-gift'></i>   UPDATE AUTHORIZATION </h1>
<br/>

     <div class="row">
	
	
		<div class="col m12 l12 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			
			  
			 <form method='post'>
			  
			
				
			  <div class="input-field col m12 l12 s12">
				  <input id="email" type="text" required  name='cookie_name'>
				  <label for="email">   Enter Authorization Password </label>
				</div>
			  
			    <div class="input-field col m12 l12 s12">
				  <input id="email" type="text" required  name='cookie_time'>
				  <label for="email">  Enter Expiration In Days </label>
				</div>
				
			    <div class="input-field col m12 l12 s12">
				<center>
				<button type='submit' class='btn deep-orange pulse' name='add_cookie'>  <i class='fa fa-plus'></i> </button>
				</center>
			  </div>
			  </form>
			
			<div class='row'>
			  </div>
	
			</div>
			</div>
		
		</div>
		
		

	</div>

 <div class="container">
   <h1 align='center' class=' tada blue-text'><i class='fa fa-gift'></i>  <? echo $cookie_title; ?> </h1>
<br/>

     <div class="row">
	
	
		<div class="col m12 l12 s12">
			<div class="card z-depth-1 blue-text" style='border-radius:30px; background-color:#fbe9e7;'>
            <div class="card-content">
			
			  
			 <form method='post'>
			 
			  
			  <div class="input-field col m12 l12 s12">
				<center>
				<button type='submit' class='btn deep-<?echo $cookie_button; ?> pulse' name='<?echo $cookie_button_name;?>'>  <i class='fa fa-<?echo $cookie_sign; ?>'></i> </button>
				</center>
			  </div>
			</form>
			
			<div class='row'>
			  </div>
	
			</div>
			</div>
		
		</div>
		
		

	</div>

	
  
      <div class="row " >
	
	
		<div class="col m1 l1 s0"></div>
		
		
		
			<div class="col m10 l10 s12">
				 	 <table class="table bordered striped z-depth-3 " id='location'  width='100%' >
						  <thead>
						 <tr>
								<th>ID</th>
								<th>AUTHORIZATION</th>
								<th>DAYS</th>
								
						 </tr>
						</thead>
						<tbody>
						
							<?php 
								$get_authorize = new run_query("select * from authorize ");
								
							while(	$get_authorize_data =	$get_authorize->result() ){
							
								extract($get_authorize_data );
								echo "
									<tr>
										<td> $cookie_id </td>
										<td> $cookie_name </td>
										<td> $cookie_time  </td>
									
									</tr>
								
								";
								
									
					}
								?>
						
						</tbody>
					 </table>
					
			</div>
		
		<div class="col m1 l1 s0"></div>

	</div>

	

   </div>


	

<br/><br/><br/><br/>

<?php
 
require "../script/php/footer_home.php";
require "../script/mlc/script_foot.php";
?>

<script>
    $(document).ready(function() {
    var table = $('#location').DataTable( {
        responsive: true,
         "pageLength": 10,
      
      
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );

</script>
</body>

</html>
















