<!DOCTYPE html>
<html>
<head>
    <title>Personal account</title>
     <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
        } h1 {
            color: #6B3FA0;
        } a {
            color: white;
            text-decoration: none;
            border-bottom: 1px dotted white;
        } a:hover {
            border-bottom-style: solid;
        } button {
            background-color: #6B3FA0;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
            cursor: pointer;
        } button:hover {
            background-color: #8E6DB2;
        } ul {
            list-style-type: none;
            padding: 0;
        } li {
            margin: 10px 0;
        } li a:before {
            content: "→ ";
        }
    </style>
</head>
<body>
    <h1>Ласкаво просимо, дорогий клієнте</h1>

    <p>Що ви бажаєте зробити?</p>
    <ul>
        <li><a href="udate_add.php">Оновити дані</a></li>
        <li><a href="delet.php">Скасувати замовлення</a></li>
    </ul>
    <button><a href="d4.php">Вийти</a></button>

</body>
</html>

