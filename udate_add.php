<?php
$dsn = 'mysql:host=localhost;dbname=photosenter';
$username = "root";
$password = "";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$new_name = filter_input(INPUT_POST, 'new_name', FILTER_SANITIZE_STRING);
$new_phone = filter_input(INPUT_POST, 'new_phone', FILTER_SANITIZE_STRING);

if (!empty($new_name)) {
    $stmt = $pdo->prepare('UPDATE client SET full_name = :name WHERE client_code = :id');
    $stmt->execute(['name' => $new_name, 'id' => $id]);
    echo 'Ім\'я успішно змінено!';
}

$stmt = $pdo->prepare('SELECT phone_number FROM client WHERE client_code = :id');
$stmt->execute(['id' => $id]);
$client = $stmt->fetch();
$phone = $client['phone_number'];

if (!empty($new_phone)) {
    $stmt = $pdo->prepare('UPDATE client SET phone_number = :phone WHERE client_code = :id');
    $stmt->execute(['phone' => $new_phone, 'id' => $id]);
    echo 'Номер телефону успішно змінено!';
    $phone = $new_phone;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Оновити профіль</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #663399;
            border-radius: 10px;
        }

        label {
            margin-bottom: 10px;
            font-size: 20px;
        }

        input[type="text"] {
            padding: 5px;
            margin-bottom: 10px;
            font-size: 18px;
            border-radius: 5px;
            border: none;
        }

        button[type="submit"], button {
            padding: 10px;
            margin-top: 20px;
            font-size: 18px;
            background-color: #fff;
            color: #663399;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #663399;
            color: #fff;
        }
    </style>
</head>
<body>
    <form method="post">
        <label for="id">ID клієнта:</label>
        <input type="text" name="id" id="id" required>
        <br>
        <label for="new_name">Нове ім'я:</label>
        <input type="text" name="new_name" id="new_name">
        <br>
        <label for="new_phone">Новий номер телефону:</label>
        <input type="text" name="new_phone" id="new_phone">
        <br>
        <button type="submit">Оновити</button>
        <button><a href="personal_account.php">Вийти</a></button>
    </form>
</body>
</html>

