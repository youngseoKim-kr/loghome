<?
include("lib_sql.inc");
connect();
		$time = date("Y-m-d H:i:s");
		$name="kimyoungseo";
		$qry ="INSERT INTO TEST_MEMBER ( USER_ID,PASSWD,USER_NM, HP_NO, ADDRESS, JOB_CD, CREATE_ID, CREATE_DTIME  )
				VALUES ( $id_id,$id_pass,$id_name,$id_number, $id_address, $id_job, $name , $time )";
		parse($qry);
		execute();
		disconnect();

	echo "<script type='text/javascript'>\n"."
	alert('저장되었습니다.');\n"."
	  window.close();\n"."
	  </script>\n";
    exit();
?>
