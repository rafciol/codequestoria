<!doctype html>
<html lang="en" xml:lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta property="og:description" content="CodeQuestoria - Solve code puzzles for free!">
    <meta name="description" content="CodeQuestoria - Solve code puzzles for free!">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:locale" content="pl_PL">
    <meta property=”og:title” content=”Dorian Namyslak - portfolio”>
    <meta property=”og:image” content=”adres URL danego zdjęcia”>
    <meta property=”og:url” content=”https://codequestoria.pl/”>
    <meta property=”fb:app_id” content=””>
    <meta property="og:site_name" content="CodeQuestoria">
    <meta property=”og:type” content=”website”>
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="googlebot-news" content="index, follow">
    <meta name="author" content="Dorian Namyślak">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reddit+Mono:wght@200..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <title>CodeQuestoria</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div id="container">
        <aside id="text-box" class="box-define">
            <h1 id="text-title">Made by Dorian Namyślak</h1>
            <links id="link-box">
                <a href="https://github.com/rafciol" alt="github" title="Github" target="_blank"><img class="link-icons" src="srv/icons/git.webp"></a>
                <a title="rafciolson#7994"><img title="rafciolson#7994" class="link-icons" src="srv/icons/dc.png"></a>
                <a href="mailto:dorianprogramista15@gmail.com"><img class="link-icons" src="srv/icons/mail.png"></a>
                <a href="https://www.instagram.com/dorian_namys/" title="Instagram" target="_blank"><img class="link-icons" src="srv/icons/ig.png"></a>
            </links>
            <p id="rights">All rights reserved Dorian Namyślak <?php echo date("Y"); ?></p>
        </aside>
        <main id="assign-box" class="box-define">
            <div id='lang-list'>
                <form id="lang-form" action="index.php" method="post">
                    <h3 id="lang-title">Choose your programming language:</h3>
                    <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'db_codequestoria');
                    $sql = "SELECT ID_prog_language, Language FROM prog_language";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($fetch = mysqli_fetch_array($result)) {
                            echo "
                                <label class='assign-inputs' onclick='selectedFunction(this)'>
                                    <input class='start-lang-con' type='checkbox' name='languages[]' value='" . $fetch['ID_prog_language'] . "'>" . $fetch['Language'] . "
                                </label>
                            ";
                        }
                    }
                    ?>
                    <p id="output-info"></p>
                    <input class="assign-buttons" type="button" value="Start solving!" onclick="fetchQuestions()">
                </form>
            </div>
            <div id="questions-container" style="display:none;"></div>
        </main>
        <nav id="menu-box" class="box-define">
            <p>Did you find any problems? Please contact me</p>
        </nav>
    </div>
    <script src="main.js" async></script>
</body>
</html>