<html>
<head>
  <title>Ȩ������ �α���</title>
  <link rel="stylesheet" href="style.css">

</head>
<script language=javascript>


//���̵� ����

window.onload = function() {

        if (getCookie("id")) { // getCookie�Լ��� id��� �̸��� ��Ű�� �ҷ��ͼ� �������
            document.loginForm.userid.value = getCookie("id"); //input �̸��� id�ΰ��� getCookie("id")���� �־���
            document.loginForm.idsave.checked = true; // üũ�� üũ������
        }

    }

    function setCookie(name, value, expiredays) //��Ű �����Լ�
    {
        var todayDate = new Date();
        todayDate.setDate(todayDate.getDate() + expiredays);
        document.cookie = name + "=" + escape(value) + "; path=/; expires="
                + todayDate.toGMTString() + ";"
    }

    function getCookie(Name) { // ��Ű �ҷ����� �Լ�
        var search = Name + "=";
        if (document.cookie.length > 0) { // if there are any cookies
            offset = document.cookie.indexOf(search);
            if (offset != -1) { // if cookie exists
                offset += search.length; // set index of beginning of value
                end = document.cookie.indexOf(";", offset); // set index of end of cookie value
                if (end == -1)
                    end = document.cookie.length;
                return unescape(document.cookie.substring(offset, end));
            }
        }
    }

    function sendit() {
        var frm = document.loginForm;
        if (!frm.userid.value) { //���̵� �Է����� ������.
            alert("���̵� �Է� ���ּ���!");
            frm.userid.focus();
            return;
        }
        if (!frm.user_pwd.value) { //�н����带 �Է����� ������.
            alert("�н����带 �Է� ���ּ���!");
            frm.user_pwd.focus();
            return;
        }

        if (document.loginForm.idsave.checked == true) { // ���̵� ������ üũ �Ͽ�����
            setCookie("id", document.loginForm.userid.value, 7);
            obj = document.forms[0];
            //obj.action = 'fn_log.php';
            //obj.target = "iframe";
             frm.action ="frame_set.php"
           //��Ű�̸��� id�� ���̵��Է��ʵ尪�� 7�ϵ��� ����
        } else { // ���̵� ������ üũ ���� �ʾ�����
            setCookie("id", document.loginForm.userid.value, 0);
            obj = document.forms[0];
            //obj.action = 'fn_log.php';
            //obj.target = "iframe";
             frm.action ="frame_set.php" //��¥�� 0���� �����Ͽ� ��Ű����
        }

        document.loginForm.submit(); //��ȿ�� �˻簡 ����Ǹ� ������ ����.

    }


    function fn_init()
    {
    	location.replace("./index.php");
    }

    function fn_save()
    {
    	obj = document.forms[0];
    	obj.action = 'new_save.php';
    	obj.target = "iframe";
    	obj.submit();
    }

</script>

<body>
  <form  id="loginForm" name="loginForm" method="post">
  <div class="name">
  <h1 style="text-align:center; color: yellow; font-weight:bold;">Login</h1>


  <p><input class="box" type="text" name="userid"  placeholder="User Id"></p>
  <p><input class="box" type="password" name="user_pwd"  placeholder="PassWord"></p>
  <p><button type="submit" name="login" onClick="fn_init()"  >Cancel</button>
  <button type="submit" name="login" onClick="sendit()" >Sign in</button></p>
  <p><input  class="check"type="checkbox" name="idsave" vale="saveOk" >&nbsp&nbsp<label>Stay Signed in</label>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <button class="join" type="submit" name="join" onClick="fn_save()" >Sign up</button></p>
  </div>

</form>
</body>
</html>
