<?php
    require_once './core/functions.php';
    // if (getCurrentUser()) {
    //     redirect('index');
    // }
    $errors = [];
    if (isPost()) {
        if(login(getParam('login'), getParam('password'))) {
            redirect('list');
        } else {
            $errors[] = 'Невалидный логин или пароль';
        }
        // Проверяем логин и пароль
        // И если корректно, то редиректим на index.php
    }

if(login(getParam('login'), getParam('password'))) {
            redirect('list');
        }



    if (empty($_GET))
    {
         redirect('index');
    }
 if(($_GET['entrance'] !== 'guest') and ($_GET['entrance'] !== 'authorization'))
  {
      http_response_code(404);
      exit();
  }
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
                    <?php if (!empty($errors)) ?>
                        <ul>
                            <?php foreach ($errors as $error){?>
                                <li><?= $error;} ?></li>
                            
                        </ul>
                    <? endif; ?>
<?php
if (!empty($_GET['entrance']) and ($_GET['entrance'] === 'guest'))
{
    ?>
      <form method="POST" action="./list.php" id="login-form">
                        <div class="form-group">
                        <p>Введите имя</p>
                            <label for="lg" class="sr-only">Введите имя</label>
                            <input type="text" name="guest" id="lg" class="form-control">
                        </div> 
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Войти как гость">
                    </form>

      <?php
       }
       if (!empty($_GET['entrance']) and ($_GET['entrance'] === 'authorization'))
          {
          ?>
          <hr>

                    <form method="POST" id="login-form">
                        <div class="form-group">
                        <p>Логин:</p>
                            <label for="lg" class="sr-only">Логин</label>
                            <input type="text" name="login" id="lg" class="form-control">
                        </div>
                        <div class="form-group">
                        <p>Пароль:</p>
                            <label for="key" class="sr-only">Пароль</label>
                            <input type="password" name="password" id="key" class="form-control">
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Войти">
                    </form>
                    <hr>
<?php
}
?>

                </div>
            </div> 
        </div>
    </div> 
</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- <p>Page © - 2014</p>
                <p>Powered by <strong><a href="http://www.facebook.com/tavo.qiqe.lucero" target="_blank">TavoQiqe</a></strong></p> -->
            </div>
        </div>
    </div>
</footer>
</body>
</html>