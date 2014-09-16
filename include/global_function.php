<?
function koneksi(){
	$koneksi = ADONewConnection("mysql");
	//$koneksi->Connect("ip_address", "user_database", "pass_database", "database");
	//$koneksi->Connect("localhost", "hendroa1_jin", "Jinsun123", "hendroa1_hms");
	$koneksi->Connect("localhost", "root", "", "hms");
	
	if($koneksi){ return($koneksi); }
	else{ return("err : ". $koneksi->ErrorMsg(). "<br>KONEKSI MYSQL ERROR..!!!"); }
}

function GetModul($m,$koneksi){
	$sql = "SELECT modul_name,icon,bg FROM modules WHERE modul_id = $m";
	$hasil = $koneksi->Execute($sql);
	
	while (!$hasil->EOF){
		$modul_name = $hasil->fields["modul_name"];
		$icon = $hasil->fields["icon"];
		$bg = $hasil->fields["bg"];
		$hasil->MoveNext();
	}
	$_SESSION["id_modul"] = $m;
	$_SESSION["modul_name"] = strtolower($modul_name);
	$_SESSION["icon"] = strtolower($icon);
	$_SESSION["bg"] = strtolower($bg);
	return $_SESSION["modul_name"];
}

function GetSubmodul($sm,$koneksi){
	$sql = "SELECT submodul_id,submodul_name FROM submodules WHERE submodul_id = $sm";
	$hasil = $koneksi->Execute($sql);
	
	while (!$hasil->EOF){
		$submodul_id = $hasil->fields["submodul_id"];
		$submodul_name = $hasil->fields["submodul_name"];
		$hasil->MoveNext();
	}
	$_SESSION["id_submodul"] = $sm;
	$_SESSION["submodul_id"] = $submodul_id;
	$_SESSION["submodul_name"] = strtolower($submodul_name);
	return $_SESSION["submodul_name"];
}

function GetPlace($area,$koneksi){
	$sql = "SELECT area_id FROM master_area WHERE area_name = '$area'";
	$hasil = $koneksi->Execute($sql);
	
	while (!$hasil->EOF){
		$area_id = $hasil->fields["area_id"];
		$hasil->MoveNext();
	}
	
	return $area_id;
}

function GetField($sql){
	$koneksi = koneksi();
	$hasil = $koneksi->Execute($sql);
	if ($hasil == false) {
		die("error SQL" . $koneksi->ErrorMsg() . "<br><br>$sql<br><br><br>");
	}else{
		while (!$hasil->EOF){ $RequestField = $hasil->fields[0]; $hasil->MoveNext(); }
	}
	return $RequestField;
}

function SQLExec($sql){
	$koneksi = koneksi();
	$hasil = $koneksi->Execute($sql);
	if ($hasil == false) {
		die("error SQL" . $koneksi->ErrorMsg() . "<br><br>$sql<br><br><br>");
	}else{
		return $hasil;
	}
}

function GetMemberID($member_type,$koneksi){
	$sql = "SELECT COUNT(*) AS jumlah FROM member WHERE member_type = '$member_type'";
	$hasil = $koneksi->Execute($sql);
	
	while (!$hasil->EOF){
		$jumlah = $hasil->fields["jumlah"];
		$hasil->MoveNext();
	}
	return "1224".$jumlah;
}

function hitung_data($table,$koneksi){
	$sql = "SELECT COUNT(*) AS jumlah FROM $table";
	$hasil = $koneksi->Execute($sql);
	
	while (!$hasil->EOF){
		$jumlah = $hasil->fields["jumlah"];
		$hasil->MoveNext();
	}
	
	return $jumlah;
}
?>
