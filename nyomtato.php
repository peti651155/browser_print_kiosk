<!DOCTYPE html>
<html>
<head>
	<title>Printers List</title>
</head>
<body>
	<h1>Printers List</h1>
	<button onclick="printersList()">List Printers</button>
	<ul id="printers"></ul>
	<script>
		function printersList() {
			var printers = navigator.getPrinters();
			var list = document.getElementById("printers");
			list.innerHTML = "";
			for (var i = 0; i < printers.length; i++) {
				var printer = printers[i];
				var item = document.createElement("li");
				item.appendChild(document.createTextNode(printer.name));
				list.appendChild(item);
			}
		}
	</script>
</body>
</html>
