<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];

    if ($_POST["email2"] == "none")
    {
      $_POST["email2"] = $_POST["email3"];
    }

    $email2  = $_POST["email2"];

    $email = $email1."@".$email2;
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    $ipaddr = $_SERVER['REMOTE_ADDR'];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");

	$sql = "insert into members(id, pass, name, email, regist_day, level, point, ipaddr) ";
	$sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 0, '$ipaddr')";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>
