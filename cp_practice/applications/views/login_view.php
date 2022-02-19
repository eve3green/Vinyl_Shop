<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Vinil</title>
    <link rel="stylesheet" href="styles/forms.css">
</head>
<body>
    <form action="" class="ui-form" method="post">
    <h3>Welcome</h3>
        <div class="form-row">
            <input type="text" name="login" required autocomplete="off"><label for="email">Login</label>
        </div>
        <div class="form-row">
            <input type="password" name="password" required autocomplete="off"><label for="password">Password</label>
        </div>
        <input type="hidden" name="form-submitted" value="1" />
    <p><input type="submit" value="Login"></p>
    </form>
    <a href="index.php?action=reg">Don`t have an account? Register</a>
</body>
</html>