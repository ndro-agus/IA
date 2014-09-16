<?
	session_cache_expire(600);
	session_name("PHPSESSID");
	session_start();
	
	$title = "Jinsun HMS";
	$database = "hms";
	//$database = "hendroa1_hms"; //published database
	
	$dayNames = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$monthNames = array('January','February','March','April','May','June','July','August','September','October','November','December');

	if($_GET["j"] == "jin"){
		unset($_SESSION['modul_name']);
		unset($_SESSION['submodul_name']); 
		unset($_SESSION['filename']); 
	}
	
	ini_set('max_execution_time', 0);//EXECUTE UNLIMITED
	ini_set('memory_limit', '-1');
?>
