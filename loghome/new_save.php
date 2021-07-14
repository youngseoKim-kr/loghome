<?
include("lib_sql.inc");
connect();

		$qry= "SELECT COUNT(*)
				   FROM TEST_MEMBER
				  WHERE USER_ID = '$userid'
				    AND ROWNUM  = 1
				  ";
		parse($qry);
		execute();

		fetchInto(&$col);

		$chk_cnt =$col[0];

		if($chk_cnt == "0")
		{
			$qry ="INSERT INTO TEST_MEMBER ( USER_ID,PASSWD  )
					VALUES ( '$userid','$user_pwd' )";
			$msg = "저장되었습니다.";
		}
		else
		{
			$msg = "이미 가입된 아이디 입니다.";
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
