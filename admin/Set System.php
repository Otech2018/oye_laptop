<?php
 ob_start();    
require "../script/php/connect.php";
$active= "location";

require "../script/mlc/script_head.php";

 			    //check if cookie can be enabled on system
						    setcookie("test_cookie", "test", time() + 3600, '/');

if(count($_COOKIE) > 0) {
    echo "authorization can be enabled.";
} else {
    echo "authorization can not be enabled.";
}
$cookie_s = "authorize"; //cookie name
													    
						  $get_authorize = new run_query("select * from authorize where cookie_id = 1");  
						    $get_authorize_data =	$get_authorize->result();
						    extract($get_authorize_data );
								$expire = time() + $cookie_time * 86400;
								setcookie($cookie_s, $cookie_name, $expire, "/", "oyemart.com");
								
if(isset($_COOKIE[$cookie_s])){
  echo "<script>
											alert('Authorization was Successfull');
											window.location.replace(\"auth.php\");
											
									</script>";   
    
}else{
 echo "<script>
											alert('Authorization could not be set');
											window.location.replace(\"auth.php\");
											
									</script>";      
}
								
						    
						
						
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>