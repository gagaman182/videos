<?php
	 header('Access-Control-Allow-Origin: *');
   

include 'connect.php';



$sql = "SELECT pic FROM PATIENT_PICTURE where PAT_RUN_HN||'/'||PAT_YEAR_HN = '9070/52'";
$stid = oci_parse ($objConnect, $strSQL);
oci_execute($objParse,OCI_DEFAULT);
$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
if (!$row) {
header('Status: 404 Not Found');
} else {
$img = $row['pic']->load();
header("Content-type: image/jpeg");
print $img;
}

?>
