<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
</head>
<body>

<h2>Login</h2>

<form action="controller/Login_C.php?method=CekLogin" method="POST">

    <label>Email</label><br>
    <input type="email" name="Email" required>
    <br><br>

    <label>Password</label><br>
    <input type="password" name="Pass" required>
    <br><br>

    <button type="submit">Login</button>

</form>

</body>
</html>