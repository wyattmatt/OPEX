<!DOCTYPE html>
<html>
<head>
    <title>Password Reset OTP</title>
</head>
<body>
    <h1>Password Reset Request</h1>
    <p>You have requested to reset your password. Use the following 6-digit OTP code to proceed:</p>
    <h2 style="background: #f4f4f4; padding: 10px; display: inline-block; letter-spacing: 5px;">{{ $otp }}</h2>
    <p>This code will expire in 10 minutes.</p>
    <p>If you did not request a password reset, please ignore this email.</p>
</body>
</html>
