<!DOCTYPE html>
<html lang="ru" dir="ltr">
    <head>
        <?php
        $pageTitle = 'Регистрция PHP blog';
        require_once 'blocks/head.php';
        ?>
    </head>
    <body>
        <?php require_once 'blocks/header.php';?>
        <main class="container mt-5"> <!-- mt-5 margin top -->
            <div class="row">
                <div class="col-md-8 mb-4">
                    <h4>Регистрация</h4>
                    <form action='' method="post">
                        <label for="username">Ваше имя</lable>
                        <input type="text" name="username" id="username" class="form-control">

                        <label for="login">Ваш login</lable>
                        <input type="text" name="login" id="login" class="form-control">

                        <label for="email">Ваш email</lable>
                        <input type="email" name="email" id="email" class="form-control">

                        <label for="pass">Ваш пароль</lable>
                        <input type="password" name="pass" id="pass" class="form-control">

                        <div class="alert alert-danger mt-2" id="errorBlock"></div>

                        <button type="button" id="regUser" class="btn btn-success mt-5">Зарегестрироваться</button>
                    </form>
                </div>
            <?php require_once 'blocks/aside.php';?>
                </div>
        </main>



        <?php require_once 'blocks/footer.php';?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- создаем AJAX запрос -->
        <script>
        $('#regUser').click(function(){
            var username = $('#username').val();
            var login = $('#login').val();
            var email = $('#email').val();
            var pass = $('#pass').val();
            $.ajax({
                url: 'ajax/regForm.php',
                type: 'POST',
                cache: false,
                // передаем данные в массив POST в regForm.php
                data: {'username' : username, 'login' : login, 'email' : email, 'pass' : pass},
                dataType: 'html',
                success: function(data) {
                    if (data == 'Готово') {
                    $('#regUser').text('Готово');
                    $('#errorBlock').hide();
                 } else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(data);
                 }
                }
            });
        });
        </script>
    </body>
</html>
