<?php

$project_type = $_SERVER['QUERY_STRING'];

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="piekarnia_oprogramowania" content="width=device-width">
    <title>Piekarnia oprogramowania</title>
    <link rel="stylesheet" type="text/css" href="/piekarnia/styles/index.css">
</head>

<body>
    <h1>
        <?php
        switch ($project_type) {
            case 'android':
                echo 'Android app form';
                break;

            case 'swift':
                echo 'Swift app form';
                break;

            case 'web_app':
                echo 'Web app form';
                break;

            default:
                echo 'idk bro';
                break;
        } ?>
    </h1>

    <nav class="navbar">
        <a href="/piekarnia/index.html">O nas</a>
        <a href="/piekarnia/login.html">Panel klienta</a>
        <a href="/piekarnia/index.php">Nasze wypieki</a>
    </nav>

    <form method="post" action="/piekarnia/sites/assigment_summary.php">
        <div class="form_body">
        </div>
        <div>
            
            <input type="hidden" name="app_kind" value="<?php echo (isset($project_type)) ? $project_type : ''; ?>">
        </div>
        <div>
            <p>Data rozpoczęcia projektu</p>
            <input type="date" name="project_start">
        </div>
        <div>
            <p>Data końca projektu</p>
            <input type="date" name="project_end">
        </div>
        <p>Opis projektu</p>
        <textarea name="description" rows="6" cols="36">
            
        </textarea>
        <p>Dodatkowe pakiety</p>
        <div class="extra_commodities">
        <input type="checkbox" name="formExtra[]" value="Secure+ package"/> Secure+ package<br/>
        <input type="checkbox" name="formExtra[]" value="Fast+ package"/> Fast+ package<br/>
        <input type="checkbox" name="formExtra[]" value="Style+ package"/> Style+ package<br/>
        <input type="checkbox" name="formExtra[]" value="Super+ package"/> Super+ package<br/>
        </div>
        <div class="form_footer">
            <input type="submit" value="Submit">
        </div>
    </form>

</body>

</html>