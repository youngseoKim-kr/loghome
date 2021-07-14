<html>
<head>
  <title>홈페이지 로그인</title>
  <link rel="stylesheet" href="style.css">

</head>
<script language=javascript>


//아이디 저장

window.onload = function() {

        if (getCookie("id")) { // getCookie함수로 id라는 이름의 쿠키를 불러와서 있을경우
            document.loginForm.userid.value = getCookie("id"); //input 이름이 id인곳에 getCookie("id")값을 넣어줌
            document.loginForm.idsave.checked = true; // 체크는 체크됨으로
        }

    }

    function setCookie(name, value, expiredays) //쿠키 저장함수
    {
        var todayDate = new Date();
        todayDate.setDate(todayDate.getDate() + expiredays);
        document.cookie = name + "=" + escape(value) + "; path=/; expires="
                + todayDate.toGMTString() + ";"
    }

    function getCookie(Name) { // 쿠키 불러오는 함수
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
        if (!frm.userid.value) { //아이디를 입력하지 않으면.
            alert("아이디를 입력 해주세요!");
            frm.userid.focus();
            return;
        }
        if (!frm.user_pwd.value) { //패스워드를 입력하지 않으면.
            alert("패스워드를 입력 해주세요!");
            frm.user_pwd.focus();
            return;
        }

        if (document.loginForm.idsave.checked == true) { // 아이디 저장을 체크 하였을때
            setCookie("id", document.loginForm.userid.value, 7);
            obj = document.forms[0];
            //obj.action = 'fn_log.php';
            //obj.target = "iframe";
             frm.action ="frame_set.php"
           //쿠키이름을 id로 아이디입력필드값을 7일동안 저장
        } else { // 아이디 저장을 체크 하지 않았을때
            setCookie("id", document.loginForm.userid.value, 0);
            obj = document.forms[0];
            //obj.action = 'fn_log.php';
            //obj.target = "iframe";
             frm.action ="frame_set.php" //날짜를 0으로 저장하여 쿠키삭제
        }

        document.loginForm.submit(); //유효성 검사가 통과되면 서버로 전송.

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
