<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <p>Click the following link to reset your password:</p>
    <a href="{{ url('reset-password/'.$token) }}">Reset Password</a>
</body>
</html>
