<?php
    if ($_COOKIE['login']=='') {
        //header — Отправка HTTP-заголовка
        header('Location: reg.php');
        exit();
    }
 ?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
    <head>
        <?php
        $pageTitle = 'Добавление статьи';
        require_once 'blocks/head.php';
        ?>
    </head>
    <body>
        <?php require_once 'blocks/header.php';?>
        <main class="container mt-5"> <!-- mt-5 margin top -->
            <div class="row">
                <div class="col-md-8 mb-4">
                    <h4>Добавление статьи</h4>
                    <form action='' method="post">
                        <label for="title">Заголовок</lable>
                        <input type="text" name="title" id="title" class="form-control">

                        <label for="intro">Интро статьи</lable>
                        <textarea name="intro" id="intro" class="form-control"></textarea>

                        <label for="textItem">Текст статьи</lable>
                        <textarea name="textItem" id="textItem" class="form-control"></textarea>


                        <div class="alert alert-danger mt-2" id="errorBlock"></div>

                        <button type="button" id="article_add" class="btn btn-success mt-5">Добавить</button>
                    </form>
                </div>
            <?php require_once 'blocks/aside.php';?>
                </div>
        </main>



        <?php require_once 'blocks/footer.php';?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- создаем AJAX запрос -->
        <script>
        $('#article_add').click(function(){
            var title = $('#title').val();
            var intro = $('#intro').val();
            var textItem = $('#textItem').val();
            $.ajax({
                url: 'ajax/addArticle.php',
                type: 'POST',
                cache: false,

                data: {'title' : title, 'intro' : intro, 'textItem' : textItem},
                dataType: 'html',
                success: function(data) {
                    if (data == 'Готово') {
                    $('#article_add').text('Готово');
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
