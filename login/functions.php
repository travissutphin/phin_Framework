<?php
/* LOGIN.FUNCTIONS */
/*****************************************************************/

/** 
  * @desc	attempt to log the user in and redirect appropriately
  * @param	$_POST['email'] - $_POST['password']
  * @return none
*/
	function validate_Login()
	{			  
		$email = cleanInput_Security($_POST['USER_EMAIL']);
		$password = cleanInput_Security($_POST['USER_PASSWORD']);
		
		$sql = 'SELECT '.COLUMNS_SYSTEM_TBL_USERS.' FROM system_tbl_users users ';	
	  	$sql.= " WHERE users.USER_EMAIL = '".$email."' ";	
	  	$sql.= "   AND users.USER_PASSWORD = '".$password."' ";  

echo $sql;

		$result = $_SESSION['QUERY']($_SESSION['connection'],$sql);
		
		// error reporting 
		if($result === false) 
		{ error_report_Helpers('Error Validating Login - (validate_Login)',$sql,$result); }
	
		$num_rows = $_SESSION['NUM_ROWS']($result);
		  
		if($num_rows == "1") // login credentials are correct 
		{
			while($row = $_SESSION['FETCH_ARRAY']($result))
			{	
				set_variables_Login($row['user_ID']); // save session vars for this user
				header( 'Location: ../control_panel/' ) ;
				exit;
			}
		}else{
			header( 'Location: view.php?message=user_not_found' ) ;
			exit;
		}
		
		return $result;
	}
/*****************************************************************/

/** 
  * @desc
  * @param
  * @return
*/
	function set_variables_Login($id)
	{
		$result = read_Users($id,$email=FALSE);
	
	  	// error reporting 
	  	if($result === false) 
	  	{ 
			error_report_Helpers('Error Setting Login Variables - login.functions.set_variables_Login',$sql,$result);
	  	}
	  
	  	while ($row = $_SESSION['FETCH_ARRAY']($result))
	  	{	
			$_SESSION['users.is_logged_in'] = TRUE ;
		 	$_SESSION['users.id'] = $row['USER_ID'] ;
		 	$_SESSION['users.email'] = $row['USER_EMAIL'] ;
		 	$_SESSION['users.name_first'] = $row['USER_NAME_FIRST'] ;
		 	$_SESSION['users.name_last'] = $row['USER_NAME_LAST'] ;
		 	$_SESSION['users.role_id'] = $row['ROLE_ID'] ;
 		 	$value_roles = read_values_Roles($row['ROLE_ID']);
			$_SESSION['users.role'] = $value_roles['name'];
		 	$_SESSION['users.login_attempts'] = $row['LOGIN_ATTEMPTS'] ;
	  	}
	}
/*****************************************************************/

/** 
  * @desc
  * @param
  * @return
*/
	function clear_variables_Login()
	{
	   unset($_SESSION['users.id']) ;
	   unset($_SESSION['users.email']) ;
	   unset($_SESSION['users.name_first']) ;
	   unset($_SESSION['users.name_last']) ;
	   unset($_SESSION['users.role_id']) ;
	   unset($_SESSION['users.login_attempts']) ;
	   unset($_SESSION);
		
	  header( 'Location: '.site_Url() ) ; 	
	  exit;
	}
/*****************************************************************/

/** 
  * @desc
  * @param
  * @return
*/
	function validate_variables_Login()
	{
		if(!isset($_SESSION['users.role_id']))
		{
		  $_SESSION['message'] = "timed_out";
		  header( 'Location: '.site_Url() ) ;
		  exit;
		}
	}
/*****************************************************************/

?>