<?
include("lib_sql.inc");
connect();
echo "아이디 확인".$my_name;
$qry = "DELETE FROM TEST_MEMBER
WHERE USER_ID='$my_name'
 ";

parse($qry);
execute();
disconnect();

 echo "<script type='text/javascript'>
 alert('삭제되었습니다.');
 window.close();</script>"
 ?>
