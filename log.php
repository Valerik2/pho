<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			background-color: #000000;
			color: #FFFFFF;
			font-family: Arial, sans-serif;
		}	h1 {
		text-align: center;
		margin-top: 50px;
	} form {
		margin: 0 auto;
		width: 400px;
		text-align: center;
		margin-top: 50px;
	} label {
		display: block;
		margin-top: 20px;
		font-size: 20px;
		text-align: left;
	} input[type="text"] {
		width: 100%;
		padding: 10px;
		border-radius: 5px;
		border: none;
		margin-top: 10px;
		font-size: 16px;
	} input[type="submit"] {
		background-color: #FFFFFF;
		color: #000000;
		padding: 10px 20px;
		border-radius: 5px;
		border: none;
		margin-top: 20px;
		font-size: 16px;
		cursor: pointer;
    </style>
</head>
<body>
	<h1>Вхід</h1>
	<form method="POST" action="d3.php">
		<label for="name">Повне ім'я:</label>
		<input type="text" id="name" name="name">
		 <label for="phone">Номер телефону:</label>
	<input type="text" id="phone" name="phone">
	<input type="submit" value="Відправити">
</form>
</body>
</html>