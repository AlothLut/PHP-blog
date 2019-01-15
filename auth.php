<!DOCTYPE html>
<html lang="ru" dir="ltr">
    <head>
        <?php
        $pageTitle = 'Авторизация PHP blog';
        require_once 'blocks/head.php';
        ?>
    </head>
    <body>
        <?php require_once 'blocks/header.php';?>
        <main class="container mt-5"> <!-- mt-5 margin top -->
            <div class="row">
                <div class="col-md-8 mb-4">
                <?php
                if($_COOKIE['login'] == ''):
                ?>
                    <h4>Авторизация</h4>
                    <form action='' method="post">


                        <label for="login">Ваш login</lable>
                        <input type="text" name="login" id="login" class="form-control">

                        <label for="pass">Ваш пароль</lable>
                        <input type="password" name="pass" id="pass" class="form-control">

                        <div class="alert alert-danger mt-2" id="errorBlock"></div>

                        <button type="button" id="authUser" class="btn btn-success mt-5">Войти</button>
                    </form>
                    <?php
                   else:
                     ?>
                 <h2><?=$_COOKIE['login']?></h2>
                 <button class="btn btn-danger" id="exitButton">Выйти</button>
                    <?php
                endif;
                     ?>
                </div>
            <?php require_once 'blocks/aside.php';?>
                </div>
        </main>



        <?php require_once 'blocks/footer.php';?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- создаем AJAX запрос -->
        <script>
        $('#authUser').click(function(){
            var login = $('#login').val();
            var pass = $('#pass').val();
            $.ajax({
                url: 'ajax/authForm.php',
                type: 'POST',
                cache: false,
                // передаем данные в массив POST в regForm.php
                data: {'login' : login, 'pass' : pass},
                dataType: 'html',
                success: function(data) {
                    if (data == 'Готово') {
                    $('#authUser').text('Готово');
                    $('#errorBlock').hide();
                    document.location.reload(true);
                 } else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(data);
                 }
                }
            });
        });

        $('#exitButton').click(function(){
            $.ajax({
                url: 'ajax/exit.php',
                type: 'POST',
                cache: false,
                // передаем данные в массив POST в regForm.php
                data: {},
                dataType: 'html',
                success: function(data) {
                document.location.reload(true);
                }
            });
        });
        </script>
    </body>
</html>
