<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}



header('Content-Type: application/json');

require(dirname(__DIR__, 1) . "/system/config.php");

$refid = $_SESSION['ref'] ?? ''; // Безопасное получение refid

if ($_POST['type'] == 'login') {
    $login = $_POST['login'] ?? '';
    $pass = $_POST['pass'] ?? '';

    if (empty($login) || empty($pass)) {
        echo json_encode(['response' => 'error', 'message' => $translations['incorrect_login_and_or_password']]);
        die();
    }

    $login = mysqli_real_escape_string($connection, $login); // Исправлено: mysqlI -> mysqli

    $user_exists_query = "SELECT * FROM users WHERE login = '$login'";
    $user_result = mysqli_query($connection, $user_exists_query);
    $user_data = mysqli_fetch_assoc($user_result);

    if ($user_data) {
        if (!password_verify($pass, $user_data['password'])) {
            echo json_encode(['response' => 'error', 'message' => $translations['incorrect_login_and_or_password']]);
            die();
        }

        $token_tg_user = md5(microtime(true));
        $user_hash = $user_data['hash'];

        mysqli_query($connection, "UPDATE users SET token_tg_user = '$token_tg_user' WHERE hash = '$user_hash'");

        $_SESSION['hash'] = $user_data['hash'];
        $_SESSION['login'] = 1;
        $postData = json_encode([
            'id' => $user_data['id'],
            'login' => $login,

        ]);
        $ch = curl_init('http://51.250.83.228:2000/userCreate');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        echo json_encode(['response' => 'success']);
    } else {
        echo json_encode(['response' => 'error', 'message' => 'User not registered!']);
    }
    die();
} elseif ($_POST['type'] == 'reg') {
    $login = $_POST['login'] ?? '';
    $pass = $_POST['pass'] ?? '';

    if (empty($login) || empty($pass)) {
        echo json_encode(['response' => 'error', 'message' => 'Login or password is empty']);
        die();
    }

    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
    $login = mysqli_real_escape_string($connection, $login);

    $user_exists_query = "SELECT * FROM users WHERE login = '$login'";
    $user_result = mysqli_query($connection, $user_exists_query);
    $user_data = mysqli_fetch_assoc($user_result);

    if ($user_data) {
        echo json_encode(['response' => 'error', 'message' => 'User already registered!']);
        die();
    }

    $ip = $_SERVER['REMOTE_ADDR'];
    $date_reg = date("Y-m-d H:i:s"); // Исправлен формат времени
    $balance = '0';
    $new_user_hash = md5($login . microtime());

    $sql_select52 = "SELECT * FROM users WHERE ref_id = '$refid'";
    $result52 = mysqli_query($connection, $sql_select52);
    $refid_iduser = null;
    while ($row = mysqli_fetch_array($result52)) {
        $refid_iduser = $row['id'];
    }
    $ref_code_generate = substr(md5($new_user_hash), 0, 10);
    $ref_code = strtoupper($ref_code_generate);

    $user_id = str_pad(mt_rand(1000, 9999999999), 10, '0', STR_PAD_LEFT);

    $new_user_query = "INSERT INTO users
        (login, password, hash, ip, data_reg, balance, ref_id, user_id,game_token)
        VALUES
        ('$login', '$hashedPassword', '$new_user_hash', '$ip', '$date_reg', '$balance', '$refid_iduser', '$user_id','qwe')";
    if (mysqli_query($connection, $new_user_query)) {
        // Получение ID нового пользователя
        $new_user_id = mysqli_insert_id($connection);

        // Обновление реферального баланса
        $selectat123 = "SELECT * FROM users WHERE ref_id = '$refid'";
        $resultat123 = mysqli_query($connection, $selectat123);
        $row44 = mysqli_fetch_array($resultat123);
        if ($row44) {
            $refrandprize = 10; // Укажите реальную переменную или значение
            mysqli_query($connection, "UPDATE users SET balance = balance + $refrandprize, refearn = refearn + $refrandprize, refs = refs + 1 WHERE ref_id = '$refid'");
        }

        // Отправка запроса на /userCreate
        $postData = json_encode([
            'id' => $new_user_id,
            'login' => $login,

        ]);
        $ch = curl_init('http://51.250.83.228:2000/userCreate');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            error_log("Failed to create user on remote server: HTTP $httpCode, Response: $response");
            // Можно вернуть ошибку клиенту, если это критично
            // echo json_encode(['response' => 'error', 'message' => 'Failed to sync user with game server']);
            // die();
        } else {
            error_log("User created on remote server: $response");
        }

        $_SESSION['hash'] = $new_user_hash;
        $_SESSION['login'] = 1;

        echo json_encode(['response' => 'success']);
    } else {
        error_log("Failed to insert user: " . mysqli_error($connection));
        echo json_encode(['response' => 'error', 'message' => 'Failed to register user']);
    }
    die();
}

echo json_encode(['response' => 'error', 'message' => 'Invalid request type']);
die();
