<?php
	include "common.php";
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
				//paging
				$page 			= $_GET[page];								//현재 페이지 번호
				$perPageNum = $_GET[perPageNum];					//한 페이지에 표시할 데이터 수

				if($page == null || $page <= 0) {
					$page = 1;															//page 기본값 1
				}
				if($perPageNum == null || $perPageNum <= 0 || $perPageNum > 100) {
					$perPageNum = 10;												//perPageNum 기본값 10
				}
				$pageStart = ($page - 1) * $perPageNum;
				//



				//데이터 표시
				$searchName = $_POST[searchName];
				if(!$searchName) {
					$query = "SELECT * FROM grade ORDER BY num DESC LIMIT $pageStart, $perPageNum";
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
				//



				//paging algorithm
				$countQuery = "SELECT num FROM grade";
				$countResult = mysql_query($countQuery);
				if(!$countResult) exit("SQL Query Error");
				$totalCount = mysql_num_rows($countResult);												//전체 데이터 수

				$displayPageNum = 5;																							//표시할 페이지 번호 수
				$endPage = ceil($page / $displayPageNum) * $displayPageNum;				//페이징 끝 번호
				$startPage = ($endPage - $displayPageNum) + 1;										//페이징 시작 번호

				$temp = ceil($totalCount / $perPageNum);													//전체 데이터 수를 이용해서 endPage 계산
				if($endPage > $temp) $endPage = $temp;

				$prev = ($startPage == 1) ? false : true;
				$next = ($endPage * $perPageNum >= $totalCount) ? false : true;

				//html add
				if($prev) {
					$prevPage = $startPage - 1;
					echo("<a class='page' href='sj_list.php'> &laquo; </a>");
					echo("<a class='page' href='sj_list.php?page=$prevPage'> < </a>");
				}

				for($i=$startPage ; $i<=$endPage ; $i++) {
					if($page == $i) {
						echo("<a class='page active' href='sj_list.php?page=$i'>$i</a>");
					} else {
						echo("<a class='page' href='sj_list.php?page=$i'>$i</a>");
					}
				}

				if($next) {
					$nextPage = $endPage + 1;
					echo("<a class='page' href='sj_list.php?page=$nextPage'> > </a>");
					echo("<a class='page' href='sj_list.php?page=$temp'> &raquo; </a>");
				}






				mysql_close($connector);
		?>


		</table>
		<h1>totalCount = <?=$totalCount?></h1>
		<h1>startPage = <?=$startPage?></h1>
		<h1>endPage = <?=$endPage?></h1>

</body>

</html>
