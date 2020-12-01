<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="piekarnia_oprogramowania" content="width=device-width">
        <title>Piekarnia oprogramowania</title>
        <link rel="stylesheet" type="text/css" href="styles/index.css">
    </head>
    <body>
        <h1> Piekarnia oprogramowania </h1>
        <nav class="navbar">
        <a href="index.html">O nas</a>
        <a href="login.html">Panel klienta</a>
        <a href="index.php">Nasze wypieki</a>
    </nav>


        <article class="list_item">
            <a href="sites/assigment_form.php/?android">
        <img src='assets/android-logo.png' alt="android logo" width="30px" height="30px">
            <p class="list_item_title">
                Android Application
            </p>
        </a>
            
        </article>
        
        <article class="list_item">
            <a href="sites/assigment_form.php/?web_app">
        <img src='assets/www-logo.png' alt="www logo" width="30px" height="30px">
            <p class="list_item_title">
                Web Application
            </p>
        </a>
            
        </article>

        
        <article class="list_item">
        <a href="sites/assigment_form.php/?swift">
            <img src='assets/swift-logo.png' alt="swift logo" width="30px" height="30px">
            <p class="list_item_title">
                iOS Application
            </p>
        </a>            
        </article>
        <?php include 'sites/footer.php'?>
    </body>
</html>