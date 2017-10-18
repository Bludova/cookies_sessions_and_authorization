<?php
// require_once __DIR__ . './core/functions.php';
// $currentUser = getCurrentUser();
// if (!$currentUser) {
//    redirect('login');
// }
// echo  'Добро пожаловать, ' . $currentUser['name'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Авторизация</title>
</head>
<body>
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                    <h1>Авторизация</h1>
    <form enctype="multipart/form-data" action="login.php" method="get">
        <label><input type="radio" name="entrance" value="guest">Войти как гость</label>
        <label><input type="radio" name="entrance" value="authorization">Авторизация</label>
        <br>
      <input type="submit" class="btn btn-custom btn-lg btn-block" value="Отправить">
</form>


<!-- <ul>
    <li><a href="./logout.php">Авторизация</a></li>
    <li><a href="./logout.php">Войти как гость</a></li>
</ul> -->
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
