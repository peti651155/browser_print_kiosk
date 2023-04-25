<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Nyugta</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<center><h1>Nyugta</h1></center>
		<table>
			<thead>
				<tr>
					<th>Név</th>
					<th>Ár</th>
					<th>Mennyiség</th>
				</tr>
			</thead>
			<tbody>
				<?php
							session_start();
			$cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : array();
			$total = 0;
			foreach ($cart as $item) {
				echo "<tr>";
				echo "<td>" . $item["name"] . "</td>";
				echo "<td>" . $item["datum"] . "</td>";
				echo "<td>" . $item["quantity"] . "</td>";
				echo "</tr>";
				$total += $item["datum"] * $item["quantity"];
			}
			?>
		</tbody>
	</table>
	<b><p>Összesen: <?php echo $total ?> Ft</p></b>
	
</div>
<?php
  // JavaScript kód a window.print() automatikus futtatásához
  echo '<script>
		window.addEventListener(\'load\', () => {
		window.print();
		window.location.href = "eventlist.php";
		});
	</script>';
?>

</body>
</html>