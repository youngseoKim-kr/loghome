<?
include "include.inc";
$WIDTH=1010;
connect();
?>


<HTML>
<HEAD>
</HEAD>
<BODY topmargin=0 leftmargin=0 rightmargin=0 ><CENTER><FORM METHOD=POST>
<INPUT TYPE=HIDDEN NAME=jikuk_cd>
<?
echo "<BR>";
echo "<TABLE BORDER=0 WIDTH=$WIDTH><TR>";
echo "<TD WIDTH=635 ALIGN=CENTER VALIGN=TOP>
<IFRAME NAME='JIKUK_LIST' SRC='./new_test_01.php' WIDTH=648 HEIGHT=600 FRAMEBORDER=0 SCROLLING=NO></IFRAME></TD>";
echo "<TD WIDTH=355 ALIGN=LEFT VALIGN=TOP>
<IFRAME NAME='JIKUK_REGI' SRC='./new_test_02.php' WIDTH=500 HEIGHT=600 FRAMEBORDER=0 SCROLLING=NO></IFRAME></TD>";
echo "</TR></TABLE>";

?>
</FORM>
</CENTER>
</BODY>
</HTML>







<new_del>  //삭제

<?
include("lib_sql.inc");
		connect();
$qry = "DELETE FROM TEST_MEMBER
		WHERE USER_ID = '$id_id'";
		parse($qry);
		execute();

		disconnect();
		echo "<script type='text/javascript'>\n"
        ."    alert('$id_id'+'삭제되었습니다.');\n"
        //."    window.close();\n"
        ."    location.replace('new_test_02.php');\n"
        ."</script>\n";
    exit();
 ?>
