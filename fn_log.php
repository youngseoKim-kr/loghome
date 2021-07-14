<?
include("lib_sql.inc");
		connect();

    $qry= "SELECT COUNT(*)
           FROM TEST_MEMBER
          WHERE USER_ID = '$userid'
            AND PASSWD = '$user_pwd'
            AND ROWNUM  = 1
          ";
    parse($qry);
    execute();

    fetchInto(&$col);

    $chk_cnt =$col[0];
    disconnect();


		if($chk_cnt == "1")
		{
      echo "<script type='text/javascript'>\n"
          ."    alert('로그인 완료');\n"
          //."    window.close();\n"
          ."    location.replace('frame_set.php');\n"
          ."</script>\n";
		}
		else
		{
      echo "<script type='text/javascript'>\n"
          ."    alert('로그인 실패');\n"
          //."    window.close();\n"
          ."    location.replace('index.php');\n"
          ."</script>\n";
		}


    exit();
 ?>
