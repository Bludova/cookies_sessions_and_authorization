<?php
require_once __DIR__ . '/core/functions.php';
$currentUser = getCurrentUser();
if (!$currentUser) {
  http_response_code(403);
  //echo "error";
  exit();
    // redirect('login');
}
  // if (array_key_exists($number, $filelist)) {
   // echo "Массив содержит элемент $number.";
  // } else {
  //     http_response_code(404);
  //     exit();
  // }

//echo  'Добро пожаловать, ' . $currentUser['name'];

if(@$_REQUEST['userfile']) {
   header("Location: ./list.php",TRUE,302);
}
?>
<!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Загрузить тест</title>
  </head>
  <body>
    <h1>Загрузить JSON-файл c тестом.</h1>
    <form enctype="multipart/form-data" method="POST">
      Загрузить JSON-файл <input name="userfile" type="file">
      <br>
     <input type="submit" value="Отправить">
    </form>
    <hr>

          <?php
      if(isset($_FILES['userfile'] ['name']) && !empty($_FILES['userfile'] ['name']))
       {
      if($_FILES['userfile'] ['error'] == UPLOAD_ERR_OK &&
       move_uploaded_file($_FILES['userfile'] ['tmp_name'], $_FILES['userfile'] ['name']))
       {
      echo "Файл с текстом загружен! <br>";
       }else 
         {
         echo " Ошибка: Файл с текстом не загружен! <br>";
         }
       }
      ?>
<ul class="link">
    <li><a href="./logout.php">Выход</a></li>
    <li><a href="./list.php">Выбрать тест!</a></li>
</ul>

    
  </body>
</html>