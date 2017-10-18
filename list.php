<?php
require_once __DIR__ . '/core/functions.php';
$currentUser = getCurrentUser();
if (!$currentUser && !$_POST['guest']) {
    redirect('login');
}
if (!$currentUser and ($_POST === 'guest')) {
$guest = $_POST['guest'];
// $_POST['guest']
// session_start();
// echo $_SESSION['variable'];
$_SESSION['variable'] = $guest;
}
?>
<!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Список загруженных тестов</title>
  </head>
  <body>
    <h1>Список загруженных тестов</h1>
<div>
<?php
  $filelist = glob("*.json");
          if(!empty($filelist)){
          ?>
      <form enctype="multipart/form-data" action="./test.php" method="get">
        <legend>Список загруженных тестов</legend>
        <br>
        <?php 
          foreach($filelist as $i => $filename) {
          ++$i;
          $name = basename($filename);
        ?>
        <label><input type="radio" name='<?="$i"?>' value='<?="$filename"?>' >
          <?php echo  "№$i-"." ". $filename ;
          }

          ?>
        </label>
       
        <input type="submit" value="Пройти тест">
         </form>
         <?php
       } else {
        echo 'Нет тестов!';
       }
       ?>
         </div>
<hr>
<div>
<?php
        if(@$_REQUEST["$i"]) {
  echo 'Файл удален!';
  foreach($_GET as $i){
    unlink($i);
    }
}

if (!empty($currentUser) ) {
 if(!empty($filelist)){
       echo 'Выбирите файлы для удаления:';
echo '<form name="fom" action="">';
foreach($filelist as  $i => $filename){
   ++$i;
    echo '<input type="radio" name="'.$i.'" value="'.$filename.'">'.$filename.'<label for="'.$i.'">'.$i.'</label>'.'<br>';
    }
echo '<input type="submit" value="Удалить выбранные файлы" >';
echo '</form>'; 
  }     
}
?>
</div>
<ul class="link">
<?php
if (!empty($currentUser) ) {
 ?>
<li><a href="./admin.php">Загрузить тест!</a></li>
 <?php
}
?>
    

    <li><a href="./logout.php">Выход</a></li>
    
</ul>
    
  </body>
</html>