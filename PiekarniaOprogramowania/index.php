<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="piekarnia_oprogramowania" content="width=device-width">
        <title>Piekarnia oprogramowania</title>
        <link rel="stylesheet" type="text/css" href="styles/index.css">
    </head>
    <body>
        <h1> Hello From WSL</h1>
        Hello, today is <?php echo date('l, F jS, Y'); ?>.
        <?php print( $_SERVER['REQUEST_URI'])?>


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