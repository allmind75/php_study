<?php
		include "common.php";

		$num   = $_GET[num];
		$name  = $_GET[name];
		$kor   = $_GET[kor];
		$eng   = $_GET[eng];
		$math  = $_GET[math];
		$total = $_GET[total];
		$avg   = $_GET[avg];
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>성적프로그램</title>
	<link rel="stylesheet" href="font.css">
</head>

<script language="javascript">
	function cal_jumsu()
	{
		form1.hap.value=Number(form1.kor.value) + Number(form1.eng.value) + Number(form1.mat.value);
		form1.avg.value=(form1.hap.value/3.).toFixed(1);
	}
</script>

<body>

<form name="form1" method="post" action="sj_update.php">
<input type="hidden" name="num" value="<?=$num?>">

<table width="300" border="1" cellpadding="1" cellspacing="0" bgcolor="lightyellow">
  <tr>
    <td width="100" align="center" bgcolor="lightblue">이름</td>
    <td width="200">
      <input type="text" name="name" size="20" value="<?=$name?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">국어</td>
    <td width="200">
      <input type="text" name="kor" size="6" value="<?=$kor?>" onChange="javascript:cal_jumsu();">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">영어</td>
    <td width="200">
      <input type="text" name="eng" size="6" value="<?=$eng?>" onChange="javascript:cal_jumsu();">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">수학</td>
    <td width="200">
      <input type="text" name="math" size="6" value="<?=$math?>" onChange="javascript:cal_jumsu();">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">총점</td>
    <td width="200">
      <input type="text" name="total" size="6" value="<?=$total?>" readonly style="border:0;background-color:#ffffe0">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="lightblue">평균</td>
    <td width="200">
      <input type="text" name="avg" size="6" value="<?=$avg?>" readonly style="border:0;background-color:#ffffe0">
    </td>
  </tr>
</table>
<br>
<table width="300" border="0">
  <tr>
    <td align="center">
	  <input type="submit" value="수정"> &nbsp
	  <input type="button" value="뒤로가기" onclick="javascript:history.back();">
	</td>
  </tr>
</table>

</form>

</body>
</html>
