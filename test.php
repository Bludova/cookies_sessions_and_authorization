<?php
require_once __DIR__ . '/core/functions.php';
$currentUser = getCurrentUser();
// if (!$currentUser) {
//     redirect('login');
// }
 // and !$_POST['guest']
  $nomTest = ($_GET);
  foreach($nomTest as $number => $k) {
  }

  $json = file_get_contents(__DIR__ ."/$k");
  $data = json_decode($json, true);
  $issues_1 = $data["question_1"];
  $issues_2 = $data["question_2"];
  $filelist = glob("*.json");

  array_unshift($filelist, "1");
  foreach($filelist as $i => $filename) {
  $name = basename($filename);
   ++$i;
  }

  if (array_key_exists($number, $filelist)) {
   // echo "Массив содержит элемент $number.";
  } else {
      http_response_code(404);
      exit();
  }
    if (empty($_GET))
    {
       http_response_code(404);
      exit();
  }
  //     if (!$filelist)
  //   {
  //      http_response_code(404);
  //     exit();
  // }
?>
<!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Список загруженных тестов</title>
    <style>
      .error {
      color: red;
      font-size: 120%;
     } 
      .correctly {
      color: #00A72A; 
      font-size: 120%; 
     } 
    </style>
  </head>
  <body>
    <h1>Пройдите тест</h1>

    <form enctype="multipart/form-data" action="" method="POST">
      <fieldset name="q1">
        <legend><?= $issues_1["label"]; ?></legend>
        <label><input type="radio" name="q1" value='<?= $issues_1["option_1"];?>' ><?= $issues_1["option_1"]; ?></label>
        <label><input type="radio" name="q1" value='<?= $issues_1["option_2"];?>' ><?= $issues_1["option_2"]; ?></label>
        <label><input type="radio" name="q1" value='<?= $issues_1["option_3"];?>' ><?= $issues_1["option_3"]; ?></label>
        <label><input type="radio" name="q1" value='<?= $issues_1["option_4"];?>' ><?= $issues_1["option_4"]; ?></label>
      </fieldset>

      <fieldset name="q2">
        <legend><?= $issues_2["label"]; ?></legend>
        <label><input type="radio" name="q2" value='<?= $issues_2["option_1"];?>' ><?= $issues_2["option_1"]; ?></label>
        <label><input type="radio" name="q2" value='<?= $issues_2["option_2"];?>' ><?= $issues_2["option_2"]; ?></label>
        <label><input type="radio" name="q2" value='<?= $issues_2["option_3"];?>' ><?= $issues_2["option_3"]; ?></label>
        <label><input type="radio" name="q2" value='<?= $issues_2["option_4"];?>' ><?= $issues_2["option_4"]; ?></label>
      </fieldset>

      <input type="submit" value="Отправить">
    </form>
    <?php
    if(isset($_POST['q1']) and (isset($_POST['q2'])))
     {
     if($_POST['q1'] ===  $issues_1["result"] and $_POST['q2'] ===  $issues_2["result"]) 
     {
    ?> 
   
    <span class="correctly"> Вы ответили верно! </span><br>
     <img src="./certificate.php">
    <?php
  } else {
    ?>
    <span class="error">Вы ответили неправельно! Попробуйте еще раз)</span>
      <?php
        }
      }

      ?>
 <hr>
<ul class="link">

      <?php
if (!empty($currentUser) ) {
 ?>

<li><a href="./admin.php">Загрузить тест!</a></li>
 <li><a href="./list.php">Выбрать тест!</a></li>
 <?php
}
?>
   <li><a href="./logout.php">Выход</a></li>
   </ul>
   
  </body>
</html>
