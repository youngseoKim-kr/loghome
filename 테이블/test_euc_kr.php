<?
include("include.inc");
?>

<html>
<script language=javascript>
function fn_Search()
{
		var obj = document.forms[0];
		//obj1 = document.forms[1];

		//alert(obj1.user_id1.value);

    if(obj.my_name.value == '')
    {
        alert('사용자ID를 입력하십시오');
        obj.user_id.focus();
        return;
    }

		if(!confirm('조회하시겠습니까?'))
		{
		 	return;
    }
    else
    {
	    obj.action = 'test_euc_kr.php';
			obj.target = "";
	    obj.submit();
	  }
}
function fn_Save()
{
	obj = document.forms[0];
	obj.action = 'get_sql.php';
	obj.target = "iframe";
	obj.submit();
}
function fn_del(my_name) {
	frm.my_name.value =my_name;

	if (my_name==null) {
	alert('삭제할 내용을 선택해주세요!!');
	}

	else {
		frm.action='./del_sql.php';
		frm.target = '';
		frm.submit();
	}

}
</script>


<body>
<form name="frm" method="get" >
	<p> 사용자ID <input type="text" name="my_name" size="20">
	<input type="button" name="buttonDelete" value="초기화">
	<input type="button" name="buttonSearch" value="조회" onClick="fn_Search();">
	<input type="button" name="buttonSearch" value="삭제" onClick="fn_del();">
	<input type="button" value="저장" onClick="fn_Save();" > </p>


<?
	$qry="select USER_ID, PASSWD, USER_NM, HP_NO,ADDRESS,JOB_CD
		  FROM TEST_MEMBER
		  WHERE USER_ID='$my_name'";
		  parse($qry);
		  execute();

    while(fetchInto_assoc(&$col))
    {
	  $user_id = $col[USER_ID];
	  $user_pw = $col[PASSWD];
	  $user_nm = $col[USER_NM];
	  $user_no = $col[HP_NO];
	  $user_ad = $col[ADDRESS];
	  $user_cd = $col[JOB_CD];
    };
    parseFree();
?>



	<!-- 테이블 작성 -->
	<table border="2">
		<th style="text-align: center;" colspan= "2" >사용자 등록</th>
		<tr>
			<td style="text-align: center;">ID</td>
			<td><input type="text" name="id_id" value="<?=$user_id?>" size="40"></td>
		</tr>
		<tr>
			<td style="text-align: center;">비밀번호</td>
			<td><input type="text" name="id_pass" value="<?=$user_pw?>" size="40"></td>
		</tr>
		<tr>
			<td style="text-align: center;">이름</td>
			<td><input type="text" name="id_name" value="<?=$user_nm?>" size="40"></td>
		</tr>
		<tr>
			<td style="text-align: center;">연락처</td>
			<td><input type="text" name="id_number" value="<?=$user_no?>" size="40"></td>
		</tr>
		<tr>
			<td style="text-align: center;">주소</td>
			<td><input type="text" name="id_address" value="<?=$user_ad?>" size="40"></td>
		</tr>
		<tr>
			<td style="text-align: center;">직업</td>
			<td>
			<select name="id_job" style="width:317px;height:20px; " value="<?=$user_cd?>">
			  <option value="선택">선택</option>
			  <option value="회사원">회사원</option>
			  <option value="자영업">자영업</option>
			  <option value="기타">기타</option>
			</td>
		</tr>

	</table>
</form>
</body>
</html>
