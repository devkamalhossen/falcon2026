<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <p>Hello {{ $admin->name }},</p>

    <p>You requested a password reset. Click the button below to reset your password:</p>

    <a href="{{ $resetUrl }}" style="padding:10px 20px; background-color:blue; color:white; text-decoration:none;">Reset Password</a>

    <p>If you didn't request this, you can safely ignore this email.</p>
</body>
</html>
