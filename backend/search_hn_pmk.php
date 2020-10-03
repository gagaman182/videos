<?php
	 header('Access-Control-Allow-Origin: *');
   

include 'connect.php';
$hn = $_GET["hn"];
// $vn = $_GET["vn"];

// $hn = '19638/52';
// $vn = '42873932';

$data=array();

$strSQL  = "SELECT
OPD_WAREHOUSE.HN AS HN,
to_char(OPD_WAREHOUSE.OPD_DATE,'DD/MM/YYYY', 'NLS_CALENDAR=''THAI BUDDHA'' NLS_DATE_LANGUAGE=THAI') AS OPD_DATE,
PLACES.HALFPLACE,
OPD_WAREHOUSE.OPD_NO,
OPD_WAREHOUSE.OPD_DATE
FROM
OPD_WAREHOUSE
INNER JOIN PLACES ON OPD_WAREHOUSE.PLA_PLACECODE = PLACES.PLACECODE
WHERE
OPD_WAREHOUSE.HN = '".$hn."'
AND MARK_YN = 'Y'
and OPD_WAREHOUSE.PLA_PLACECODE in ('1221','1228','1223')
order by OPD_WAREHOUSE.OPD_DATE  desc




	

	
";
//and DISEASE_WAREHOUSE.HN = '".$hn."'

$objParse = oci_parse ($objConnect, $strSQL);
oci_execute($objParse,OCI_DEFAULT);
while($rs_pmk=oci_fetch_array($objParse,OCI_BOTH)){


	$a['hn']=$rs_pmk[0];
	$a['opddate']=$rs_pmk[1];
	$a['halfplace']=$rs_pmk[2];
	$a['opdno']=$rs_pmk[3];

	
	


	
	array_push($data,$a);
}	
	
// $data_array2 = array("data" => $data);

echo json_encode($data);

oci_close($objConnect);





?>
