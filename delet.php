<!DOCTYPE html>
<html>
<head>
    <title>Скасувати замовлення</title>
    <style>
body {
  background-color: black;
  color: white;
  font-family: Arial, sans-serif;
} h2 {
  color: white;
  font-size: 2em;
  margin-bottom: 1em;
} label {
  display: block;
  font-size: 1.2em;
  margin-bottom: 0.5em;
} input[type="text"] {
  padding: 0.5em;
  font-size: 1.2em;
  border: none;
  border-radius: 5px;
  background-color: #333;
  color: white;
  margin-bottom: 1em;
} button[type="submit"] {
  padding: 0.5em 1em;
  font-size: 1.2em;
  border: none;
  border-radius: 5px;
  background-color: #800080;
  color: white;
  cursor: pointer;
} button[type="submit"]:hover {
  background-color: #c71585;
}
</style>
</head>
<body>
    <h2>Скасувати замовлення</h2>
    <form method="post">
        <label for="service_number">Введіть номер замовлення:</label>
        <input type="text" name="service_number" id="service_number">
        <button type="submit">Надіслати</button>
    </form>
</body>
</html>

<?php

$dsn = 'mysql:host=localhost;dbname=photosenter;charset=utf8mb4';
$username = "root";
$password = "";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if (isset($_POST['service_number'])) {
    $order_number = filter_input(INPUT_POST, 'service_number', FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT services.type, price.price FROM price 
            JOIN services ON price.service_number = services.service_number 
            WHERE services.service_number = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$order_number]);

    if ($row = $stmt->fetch()) {
        echo "Order: " . htmlspecialchars($row['type']) . "<br>";
        echo "Price: " . htmlspecialchars($row['price']) . "<br>";
        echo '<button><a href="personal_account.php">Вийти</a></button>';
        echo '<button onclick="confirmDelete()">Видалити замовлення</button>';
    } else {
        echo "Order not found.";
        echo '<button><a href="personal_account.php">Вийти</a></button>';
    }
}

if (isset($_POST['delete_order'])) {
    $order_number = filter_input(INPUT_POST, 'delete_order', FILTER_SANITIZE_NUMBER_INT);
    $sql = "DELETE FROM services WHERE service_number = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$order_number]);
    echo "Order deleted successfully.";
    echo '<button><a href="personal_account.php">Вийти</a></button>';
}

?>

<script>
    function confirmDelete() {
        if (confirm("Ви впевнені, що хочете видалити замовлення?")) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '';
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'delete_order';
            input.value = '<?php echo htmlspecialchars($order_number); ?>';
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>