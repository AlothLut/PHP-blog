<!DOCTYPE html>
<html lang="ru" dir="ltr">
    <head>
        <?php
         $pageTitle = 'PHP blog';
         require_once 'blocks/head.php';
         ?>
        <title>Main Page PHP blog</title>
    </head>
    <body>
        <?php require_once 'blocks/header.php';?>
        <main class="container mt-5"> <!-- mt-5 margin top -->
            <div class="row">
                <div class="col-md-8 mb-4">
                    <?php
                    require_once 'MySQL_connect.php';

                    $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
                    $query = $pdo->query($sql);
                    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                        echo "<h2>$row->title</h2>
                            <p>$row->intro</p>
                            <p><b>Автор:</b>$row->author</p>
                            <a href='news.php?id=$row->id' title='$row->title'>
                            <button class='btn btn-info mb-4'>Прочитать больше</button>
                            </a>";


                    }
                    ?>
                </div>
            <?php require_once 'blocks/aside.php';?>
                </div>
        </main>



        <?php require_once 'blocks/footer.php';?>
    </body>
</html>
