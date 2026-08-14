```php
<?php
session_start();


$host = "localhost";
$dbUser = "root";
$dbPassword = "";
$database = "belga";

$conn = new mysqli($host, $dbUser, $dbPassword, $database);


if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}


$conn->set_charset("utf8mb4");


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}


$username = trim($_POST['username'] ?? '');
$loginPassword = trim($_POST['password'] ?? '');


if ($username === '' || $loginPassword === '') {
    echo "<script>
        alert('Please enter your username and password.');
        window.location='index.php';
    </script>";
    exit();
}


$sql = "SELECT 
            0fficerID,
            Firstname,
            LastName,
            gender,
            username,
            password
        FROM officer
        WHERE username = ?
        LIMIT 1";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL Prepare Error: " . $conn->error);
}

$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows === 1) {

    $officer = $result->fetch_assoc();

   
    if ($loginPassword === $officer['password']) {

       
        $_SESSION['username'] = $officer['username'];
        $_SESSION['0fficerID'] = $officer['0fficerID'];
        $_SESSION['Firstname'] = $officer['Firstname'];
        $_SESSION['LastName'] = $officer['LastName'];
        $_SESSION['gender'] = $officer[' gender'];

        
        header("Location: home.php");
        exit();

    } else {

        
        echo "<script>
            alert('Invalid Username or Password!');
            window.location='index.php';
        </script>";
        exit();
    }

} else {

    
    echo "<script>
        alert('Invalid Username or Password!');
        window.location='index.php';
    </script>";
    exit();
}

$stmt->close();
$conn->close();
?>
```
