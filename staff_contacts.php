<?php

$dbhost = "localhost";
$dbname = "photosenter";
$username = "root";
$password = "";

$db = new PDO("mysql:host=$dbhost; dbname=$dbname", $username, $password);

$stmt = $db->prepare("SELECT jobs.job_title, personal_file.phone_number, employee.full_name FROM employee 
                                                                                            JOIN personal_file 
                                                                                            ON personal_file.employee_code = employee.employee_code 
                                                                                            JOIN jobs 
                                                                                            ON jobs.job_code = employee.job_code");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            background-color: #000000;
            color: #FFFFFF;
            font-family: Arial, sans-serif;
        }
        table {
            margin-top: 50px;
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #FFFFFF;
        }
        th {
            background-color: #FFFFFF;
            color: #000000;
            font-weight: normal;
        }
        td {
            font-size: 16px;
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
    <table>
        <thead>
            <tr>
                <th>ФИО</th>
                <th>Посада</th>
                <th>Номер телефону</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
            <tr>
                <td><?= $row['full_name'] ?></td>
                <td><?= $row['job_title'] ?></td>
                <td><?= $row['phone_number'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <button onclick="goBack()">Назад</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>