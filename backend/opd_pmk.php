<?php
	 header('Access-Control-Allow-Origin: *');
   

include 'connect.php';
$opdno = $_GET["opdno"];




$data=array();

$strSQL  = "SELECT
PATIENTS.HN,
PATIENTS.PRENAME||''||PATIENTS.NAME||' '||PATIENTS.SURNAME as name,
PATIENTS.ID_CARD as idcard,
CREDIT_TYPES.NAME as rightname,
to_char(OPD_WAREHOUSE.OPD_DATE,'DD/MM/YYYY', 'NLS_CALENDAR=''THAI BUDDHA'' NLS_DATE_LANGUAGE=THAI') AS OPD_DATE,
OPD_WAREHOUSE.PATIENT_AGE as age,
 CASE WHEN PATIENTS.SEX = 'M' THEN 'ชาย' ELSE 'หญิง'  END as SEX,
 DOC_DBFS.PRENAME||''||DOC_DBFS.NAME||' '||DOC_DBFS.SURNAME as docname,
 PLACES.HALFPLACE,
 case when OPD_WAREHOUSE.OPD_VISIT_TYPE = 'R' THEN 'ทะเบียน'
 when OPD_WAREHOUSE.OPD_VISIT_TYPE = 'D' THEN 'นัด'
 when OPD_WAREHOUSE.OPD_VISIT_TYPE = 'O' THEN 'Own visit'
 when OPD_WAREHOUSE.OPD_VISIT_TYPE = 'W' THEN 'Ward'
 when OPD_WAREHOUSE.OPD_VISIT_TYPE = 'C' THEN 'Consult' end as visittype,
 case when MARK_YN = 'Y' then 'ตรวจแล้ว'  else 'ไม่ได้ตรวจ'  end as MARK_YN,
 OPD_WAREHOUSE.OPD_NO as opdno

FROM
	OPD_WAREHOUSE
INNER JOIN PATIENTS on OPD_WAREHOUSE.HN = PATIENTS.HN
LEFT JOIN CREDIT_TYPES ON OPD_WAREHOUSE.CREDIT_ID = CREDIT_TYPES.CREDIT_ID
LEFT JOIN DOC_DBFS on OPD_WAREHOUSE.DD_DOC_CODE = DOC_DBFS.DOC_CODE
LEFT JOIN PLACES on OPD_WAREHOUSE.PLA_PLACECODE = PLACES.PLACECODE
where OPD_WAREHOUSE.OPD_NO = '".$opdno."'




	

	
";
//and DISEASE_WAREHOUSE.HN = '".$hn."'

$objParse = oci_parse ($objConnect, $strSQL);
oci_execute($objParse,OCI_DEFAULT);
while($rs_pmk=oci_fetch_array($objParse,OCI_BOTH)){


	$a['hn']=$rs_pmk[0];
	$a['name']=$rs_pmk[1];
	$a['idcard']=$rs_pmk[2];
    $a['rightname']=$rs_pmk[3];
    $a['opddate']=$rs_pmk[4];
    $a['age']=$rs_pmk[5];
    $a['sex']=$rs_pmk[6];
    $a['docname']=$rs_pmk[7];
    $a['halfplace']=$rs_pmk[8];
    $a['visittype']=$rs_pmk[9];
    $a['markyn']=$rs_pmk[10];
    $a['opdno']=$rs_pmk[11];

	
	


	
	array_push($data,$a);
}	
	
// $data_array2 = array("data" => $data);

echo json_encode($data);

oci_close($objConnect);





?>
