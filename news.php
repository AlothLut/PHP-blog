<!DOCTYPE html>
<html lang="ru" dir="ltr">
    <head>
        <?php
        require_once 'MySQL_connect.php';

        $sql = 'SELECT * FROM `articles` WHERE `id`= :id';
        $id = $_GET['id'];

        $query = $pdo->prepare($sql);
        $query->execute(['id' => $_GET['id']]);
        $article = $query->fetch(PDO::FETCH_OBJ);


         $pageTitle = $article->title;
         require_once 'blocks/head.php';
         ?>
        <title>Main Page PHP blog</title>
    </head>
    <body>
        <?php require_once 'blocks/header.php';?>
        <main class="container mt-5"> <!-- mt-5 margin top -->
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="jumbotron">
                        <h1><?=$article->title?></h1>
                        <p>
                            <?=$article->intro?>
                            <br><br>
                            <?=$article->textItem?>
                        </p>
                    </div>

                </div>
            <?php require_once 'blocks/aside.php';?>
                </div>
        </main>



        <?php require_once 'blocks/footer.php';?>
    </body>
</html>
