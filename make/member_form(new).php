<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
function check_recaptcha()
{
  var v = grecaptcha.getResponse();
  if (v.length ==0) {
    alert ("'로봇이 아닙니다.'를 체크해주세요.");
  return false; }
  else
  {
    document.frm.submit();
  }
}
</script>

<script>
   function check_input()
   {
      if (!document.member_form.id.value) {
          alert("아이디를 입력하세요!");
          document.member_form.id.focus();
          return;
      }

      if (document.member_form.id.value.length < 8) {
          alert("아이디는 8자 이상이어야 합니다!");
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value) {
          alert("비밀번호를 입력하세요!");
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value) {
          alert("비밀번호확인을 입력하세요!");
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value) {
          alert("이름을 입력하세요!");
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.email1.value) {
          alert("이메일 주소를 입력하세요!");
          document.member_form.email1.focus();
          return;
      }

      if (document.member_form.pass.value !=
            document.member_form.pass_confirm.value) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      <!-- google reCaptcha -->
      var v = grecaptcha.getResponse();
      if (v.length ==0) {
        alert ("'로봇이 아닙니다.'를 체크해주세요.");
      return false; }
      else
      {
        document.member_form.submit();
      }
   }

   function reset_form() {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
      document.member_form.id.focus();
      return;
   }

   function check_id() {
     window.open("member_check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
   }

   function mail2_check()
   {
     var x = document.member_form.email2;
     if (x.options[x.selectedIndex].value != 'none')
     {
       document.member_form.email3.disabled = true;
     }
     else {
       document.member_form.email3.disabled = false;
     }
   }
</script>
</head>
<body>

	<header>
    	<?php include "header.php";?>
    </header>
	<section>
		<div id="main_img_bar">
            <img src="./img/main_img.png">
        </div>
        <div id="main_content">
      		<div id="join_box">
          	<form  name="member_form" method="post" action="member_insert.php">
			    <h2>회원 가입</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<input type="text" name="id">
				        </div>
				        <div class="col3">
				        	<a href="#"><img src="./img/check_id.gif"
				        		onclick="check_id()"></a>
				        </div>
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass">
				        </div>
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm">
				        </div>
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name">
				        </div>
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">이메일</div>
				        <div class="col2">
                  <input type="text" name="email1">@
                  <select name="email2" onchange="mail2_check()">
                    <option value="none">직접입력</option>
                    <option value="naver.com">naver.com</option>
                    <option value="kakao.com">kakao.com</option>
                    <option value="gmail.co.kr">gmail.co.kr</option>
                  </select>
                  <input type="text" name="email3">
				        </div>
			       	</div>

              <!-- reCAPTCHA 화면 배치 -->
              <div class="g-recaptcha" data-sitekey="6LdqVMsZAAAAADdOI3vYl1YCOQfKhw2Z9OkTEEbZ"></div>

			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
	                	<img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                  			onclick="reset_form()">
	           		</div>
           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section>
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>
