<html>
	<head>
		<title>CSS Layout</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="admin.css" rel="stylesheet" />
	</head>
	<body>
		<div id="container">
			<div id="header">Admin Panel</div>
			<div id="menu">
				<a id="mnav" onclick="showmenu()">&#9776;</a>
				<ul id="menuul">
					<li><a target="qafqaz" href="admin.html" >Home</a></li>
					<li><a target="qafqaz" href="" >Package</a></li>
					
				</ul>
			</div>
			<div id="content">
			
				<td>
					<iframe src="" frameborder="0" name="qafqaz" width="100%" height="100%"></iframe>
				</td>
				
			</div>
			<div id="footer"></div>
		</div>
		<script>
			function showmenu() {
				var x = document.getElementById("menuul");
				if (x.style.display == "none") {
					x.style.display = " block";
				} else {
					x.style.display = "none";
				}
			}
		</script>
	</body>
</html>