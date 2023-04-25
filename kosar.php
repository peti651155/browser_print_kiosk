<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Kosár</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Kosár</h1>
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
					echo "<tr>";
					echo $total;
					echo "</tr>";
				?>
			</tbody>
		</table>
		<br />
		<b><p>Összesen: <?php echo $total ?> Ft</p></b>
		<button onclick="window.location.href='eventlist.php'">Vissza az eseménylistához</button>
		<button onclick="window.location.href='fizetes.php'">Tovább a fizetéshez</button>
	</div>
</body>
</html>
