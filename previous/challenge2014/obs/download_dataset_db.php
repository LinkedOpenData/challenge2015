<?php
	require_once dirname(__FILE__) . '/util/lod_db.php';
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=dataset-db.csv");


	$db = LodDb::getInstance();
//	$rows = $db->executeQueryRaw("select id, name, abstract, application_name, copyright, license from application_2013");
	$rows = $db->executeQueryRaw("select * from dataset_2013");

	if($rows){
		//�@�t�B�[���h���̕\��
		for($i=0;$i<mysql_num_fields($rows);$i++){
			print(mysql_field_name($rows,$i).",");
		}
		print("\n");
		// �e�s�̏���\��
		for($j=0;$j<mysql_num_rows($rows);$j++){
			for($k=0;$k<mysql_num_fields($rows);$k++){
				$out=mysql_result($rows,$j,$k);
// replace "���s�R�[�h" -> "\t", and convert UTF-8
				print("\"".str_replace(array("\r\n","\r","\n"),"\t" ,mb_convert_encoding($out,"UTF-8","UTF-8"))."\",");
			}
			print("\n");
		}

	} else {
		echo 'No Registration';
	}
?>
