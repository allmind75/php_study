<?php
	include "common.php";

	$searchName = $_POST[searchName];

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>성적 처리</title>
	<link rel="stylesheet" href="font.css">
</head>

<body>

	<a href="sj_new.html">글쓰기</a>

	<form name="form" method="post" action="sj_list.php">
			<input type="text" name="searchName" value="<?=$searchName?>">
			<input type="submit" value="검색">
	</form>
	<hr>

	<table width="400" border="1" cellpadding="1" cellspacing="0">
		<tr bgcolor="lightblue">
			<td width:="50" align="center">번호</td>
			<td width="100" align="center">이름</td>
			<td width="50" align="center">국어</td>
			<td width="50" align="center">영어</td>
			<td width="50" align="center">수학</td>
			<td width="50" align="center">총점</td>
			<td width="50" align="center">평균</td>
		</tr>

		<?php



				if(!$searchName) {
					$query = "SELECT * FROM grade ORDER BY num DESC";
				} else {
					$query = "SELECT * FROM grade WHERE name LIKE '%$searchName%' ORDER BY num DESC";
				}

				$result = mysql_query($query);
				if(!$result) exit("SQL Query Error");

				$count = mysql_num_rows($result);				//총 rows 수



				for($i=0 ; $i < $count ; $i++) {
					$row = mysql_fetch_array($result);			//데이티베이스의 필드이름을 값의 key로 가져옴
					echo("
						<tr bgcolor='lightyellow'>
							<td width='50'>$row[num]</td>
							<td width='100'><a href='sj_edit.php?num=$row[num]&name=$row[name]&kor=$row[kor]&math=$row[math]&eng=$row[eng]&total=$row[total]&avg=$row[avg]'>$row[name]</a></td>
							<td width='50' align='right'>$row[kor]</td>
							<td width='50' align='right'>$row[eng]</td>
							<td width='50' align='right'>$row[math]</td>
							<td width='50' align='right'>$row[total]</td>
							<td width='50' align='right'>$row[avg]</td>
							<td width='50'><a href='sj_delete.php?num=$row[num]' onclick='return confirm(\"삭제할까요?\")'>삭제</a></td>
						</tr>
					");
				}

				mysql_close($connector);
		?>


		</table>

</body>

</html>
