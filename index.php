<?php
require_once 'greeting.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP. Знакомство</title>
    <link rel="stylesheet" href="css/mustard-ui.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>PHP. Знакомство</h1>
    <h2>Задание 2. Создать форму с полями.</h2>

<!--  вывод на экран данный переданных методом POST-->
      <?php if(!empty($_POST['name'])){?>
        <h3>Привет, <?php echo $_POST['surname'];?> <?php echo $_POST['name'];?>!</h3>
      <?php } ?>
    <section>
        <form action="" method="POST">
            <div><label for="">Имя: <input type="text" name="name" value="Василий"></label></div>
            <div><label for="">Фамилия: <input type="text" name="surname" value="Иванов"></label></div>
            <div><input type="submit" class="get-started button button-primary button-large" value="Отправить"></div>
        </form>
    </section>

    <h2>Задание 3. Создать абстрактный класс.</h2>

      <?php if(!empty($_POST['name2'])) {

        $greeting = new Greeting;
        $greeting->new($_POST['name2'], $_POST['surname2']);
        ?>
          <h3><?php echo $greeting->getName();?> </h3>
        <?php
      }
      ?>
    <section>
        <form action="" method="POST">
            <div><label for="">Имя: <input type="text" name="name2" value="Иван"></label></div>
            <div><label for="">Фамилия: <input type="text" name="surname2" value="Васильев"></label></div>
            <div><input type="submit" class="get-started button button-primary button-large" value="Отправить"></div>
        </form>
    </section>


    <h2>Задание 4. Доработать форму из пункта 2. Пишем в базу.</h2>

      <?php if(!empty($_POST['name4'])) {
        $greeting2 = new Greeting;
        // получаем имя и фамилию методом POST и вводим их в объкт
        $greeting2->new($_POST['name4'], $_POST['surname4']);
        // сохраняем в db
        $greeting2->save();
        // читаем из db
        $result = $greeting2->read();
        ?>
<!--   Выводим на экран           -->
        <h3>Привет, <?php echo $result[0]["surname"];?> <?php echo $result[0]["name"];?>!</h3>
        <?php
          }
      ?>
    <section>
        <form action="" method="POST">
            <div><label for="">Имя: <input type="text" name="name4" value="Иван"></label></div>
            <div><label for="">Фамилия: <input type="text" name="surname4" value="Васильев"></label></div>
            <div><input type="submit" class="get-started button button-primary button-large" value="Отправить"></div>
        </form>
    </section>


</div>
</body>
</html>
