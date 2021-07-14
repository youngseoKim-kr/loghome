<?
include("lib_sql.inc");
connect();

		$qry= "SELECT COUNT(*)
				   FROM TEST_MEMBER
				  WHERE USER_ID = '$id_id'
				    AND ROWNUM  = 1
				  ";
		parse($qry);
		execute();

		fetchInto(&$col);

		$chk_cnt =$col[0];

		if($chk_cnt == "0")
		{
			$name="kimyoungseo";
			$qry ="INSERT INTO TEST_MEMBER ( USER_ID,PASSWD,USER_NM, HP_NO, ADDRESS, JOB_CD, CREATE_ID, CREATE_DTIME  )
					VALUES ( '$id_id','$id_pass','$id_name','$id_number', '$id_address', '$id_job', '$name' , TO_CHAR(sysdate,'yyyymmddhh24miss') )";
			$msg = "저장되었습니다.";
		}
		else
		{
			$qry ="UPDATE TEST_MEMBER
				   SET PASSWD='$id_pass'
				   , USER_NM='$id_name'
				   , HP_NO = '$id_number'
				   , ADDRESS ='$id_address'
				   ,JOB_CD = '$id_job'
				   WHERE USER_ID ='$id_id'
				   ";
			$msg = "수정되었습니다.";
		}
		parse($qry);
		execute();
		disconnect();


	echo "<script type='text/javascript'>\n".
	"alert('$msg');\n".
	"window.close();\n".
	  "</script>\n";
    exit();
?>
