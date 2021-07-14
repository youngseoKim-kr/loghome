<?
include("include.inc");
//include("lib_sql.inc");
connect();
$TD_WIDTH = array(40,100,90,80,90);

$WIDTH = array_sum($TD_WIDTH);

$HEIGHT = 350;

?>
<html>
<script language=javascript>
function fn_save()
{
	obj = document.forms[0];
	obj.action = 'new_save.php';
	obj.target = "iframe";
	obj.submit();
}
function fn_del()
{
		obj = document.forms[0];
	  //obj.my_name.value = my_name;

	  if(obj.id_id.value == "")
	  {
	  		alert("삭제할 아이디를 선택해주세요.");
	  		return;
	  }

		if(!confirm('삭제하시겠습니까?'))
		{
		 	return;
    }
		obj.action = 'new_del.php';
		obj.target = "";
    obj.submit();

}
function fn_init()
{
	location.replace("./new_test_02.php");
}
</script>

<body>
<form name="frm" method="post">
사용자 ID : <input type=text name="uid" length="10">
<input type=reset value="초기화" onClick="fn_init()">
<input type=button value="삭제" onClick="fn_del()">
<input type=button value="저장" onClick="fn_save()">
<iframe name=iframe src=/iframe.php width=0 height=0 frameborder=0></iframe>

<?



	$qry = "SELECT  USER_ID
	   , PASSWD
	   , USER_NM
	   , HP_NO
	   , ADDRESS
	   , JOB_CD
	   , CREATE_ID
	   FROM TEST_MEMBER
	   WHERE USER_ID = '$uid'
 ";

parse($qry);
execute();

while(fetchInto_assoc($col))
{
	  $USER_ID = $col[USER_ID];
	  $PASSWD = $col[PASSWD];
		$USER_NM = $col[USER_NM];
		$HP_NO = $col[HP_NO];
		$ADDRESS = $col[ADDRESS];
		$JOB_CD = $col[JOB_CD];
		$CREATE_ID = $col[CREATE_ID];
		//$CREATE_DTIME = $col[CREATE_DTIME];

}

$table->twidth = $WIDTH;
$table->tclass = "div-description";

$table->rect_width=$WIDTH;
$table->rect_head();
    $table->border=0;
    $table->width = $WIDTH;
    $table->table_head();
    $table->td_align(middle);
    $table->table_body("<font color=blue>사용자 등록</font>");
	$table->table_tail();
$table->rect_tail();
$table->rect_width=$WIDTH;
$table->rect_head();
$table->width = $WIDTH;
   /* $table->table_head();
	$table->table_body("ID : ",'<input type=text name="id_id" value=$USER_ID length="10" placeholder="id">');
    $table->table_body("비밀번호 : ",'<input type=text name="id_pass" value="<?=$PASSWD?>"length="10" placeholder="pw">');
	$table->table_body("이름 : ",'<input type=text name="id_name" value="<?=$USER_NM?>"length="10" placeholder="name">');
	$table->table_body("연락처 : ",'<input type=text name="id_number" value="<?=$HP_NO?>"length="10" placeholder="num">');
	$table->table_body("주소 : ",'<input type=text name="id_id" value="<?=$USER_ID?>" length="10" placeholder="id">');
	$table->table_tail();
	*/

$table->table_tail();
$table->rect_tail();

?>
ID : <input type=text name="id_id" value="<?=$USER_ID?>" length="10" placeholder="id"><br>
비밀번호 : <input type=text name="id_pass" value="<?=$PASSWD?>"length="10" placeholder="pw"><br>
이름 : <input type=text name="id_name" value="<?=$USER_NM?>"length="10" placeholder="name"><br>
연락처 : <input type=text name="id_number" value="<?=$HP_NO?>"length="10" placeholder="num"><br>
주소 : <input type=text name="id_address" value="<?=$ADDRESS?>"length="10" placeholder="adress"><br>
직업 :
<select name="jobs">
         <option value="0" <? if($JOB_CD == '0') ECHO 'SELECTED' ?>>선택</option>
         <option value="1" <? if($JOB_CD == '1') ECHO 'SELECTED' ?>>회사원</option>
		 <option value="2" <? if($JOB_CD == '2') ECHO 'SELECTED' ?>>자영업</option>
		 <option value="3" <? if($JOB_CD == '3') ECHO 'SELECTED' ?>>기타</option>
 </select>

</form>
</body>
</html>
