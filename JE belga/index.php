<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="login-box">
        <h2 class="text-center">Central Police Department</h2>
        <p class="text-center">Please Valid Information</p>

        <form action="check.php" method="POST">

            <div class="mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>

            <div class="mb-3 position-relative">
                <input type="password" class="form-control" id="pwd" name="password" placeholder="Password" required>

                <i class="bi bi-eye-fill eye-icon" id="togglePwd"></i>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>

        </form>
    </div>
</div>

<script src="script.js"></script>

</body>
</html>