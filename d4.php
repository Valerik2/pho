<!DOCTYPE html>
<html>
<head>
    <title>Another Page</title>
    <style>
        body {
            background-color: #000000;
            color: #FFFFFF;
            font-family: Arial, sans-serif;
        } 
        h1 {
            text-align: center;
            margin-top: 50px;
        } 
        p {
            text-align: center;
            margin-top: 20px;
            font-size: 20px;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
            margin-top: 50px;
        }
        li {
            display: inline-block;
            margin-right: 20px;
        }
        a {
            display: block;
            color: #FFFFFF;
            text-align: center;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #FFFFFF;
            transition: all 0.3s ease;
        }
        a:hover {
            background-color: #FFFFFF;
            color: #000000;
        }
        button {
            display: block;
            margin: 0 auto;
            margin-top: 50px;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background-color: #FFFFFF;
            color: #000000;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Ласкаво просимо</h1>
    <p>Виберіть наступну сторінку:</p>
<ul>
    <li><a href="service_and_orders.php">Обслеговування та замовлення</a></li>
    <li><a href="staff_contacts.php">Контакти співробітників</a></li>
    <li><a href="warehouse.php">Товари, які на складі</a></li>
    <li><a href="personal_account.php">Особистий кабінет</a></li>
</ul>
<button><a href="log.php">Вийти</a></button>
</body>
</html>
