<?
include("include.inc");
//include("lib_sql.inc");
connect();
$TD_WIDTH = array(40,100,90,80,90,70);

$WIDTH = array_sum($TD_WIDTH);

$HEIGHT = 350;
?>
<html>
<script language=javascript>
function fn_search() {
	frm.action = './new_test_01.php';
	frm.target = '';
	frm.submit();
}
function fn_search2(m_name) {
	parent.JIKUK_REGI.location.href = './new_test_02.php?uid='+m_name;
}
</script>


<body>
<form name="frm" method="post">
사용자 ID : <input type=text name="id" length="10">
<input type=button value="조회" onClick="fn_search()"></form>

<?

	$table->twidth = $WIDTH;
	$table->tclass = "div-description";

	$table->rect_width=$WIDTH;
	$table->rect_head();
    $table->border=0;
    $table->width = $WIDTH;
    $table->table_head();

    $table->table_tail();

	$table->div_width = $WIDTH;
	$table->div_thead();
	$table->table_head();
    $table->td_width = $TD_WIDTH;
    $table->table_body("NO","사용자 ID","이름","연락처","주소","직업");
	$table->table_tail();
	$table->div_ttail();

	$table->div_height= $HEIGHT;
	$table->div_head();
    $table->width = $WIDTH;
    $table->table_head();
	$table->td_width = $TD_WIDTH;



	if($id !=null)
	{
	$qry = "SELECT ROWNUM NO
	, USER_ID
    , USER_NM
    , HP_NO
    , ADDRESS
    , DECODE(JOB_CD, 0 , '선택', 1 , '회사원' , 2, '자영업','기타') JOB_CD
	FROM TEST_MEMBER
	WHERE USER_ID = '$id'
 ";

	}
	else{
		$qry = "SELECT ROWNUM NO
	, USER_ID
    , USER_NM
    , HP_NO
    , ADDRESS
    , DECODE(JOB_CD, 0 , '선택', 1 , '회사원' , 2, '자영업','기타') JOB_CD
	FROM TEST_MEMBER
 ";
	}


 parse($qry);
 execute();

 while(fetchInto_assoc($col))
  {
	$table->td_width = $TD_WIDTH;
	$table->td_script( "","ondblClick=fn_search2('$col[USER_ID]')");
	$table->table_body(
		$col[NO]
		, $col[USER_ID]
		, $col[USER_NM]
		, $col[HP_NO]
		, $col[ADDRESS]
		, $col[JOB_CD]
	);
 }

?>
</form>
 </body>
</html>
