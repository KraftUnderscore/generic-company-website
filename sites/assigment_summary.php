<?php
// difference between dates must be at least 30 days
$start_date = date_create($_POST['project_start']);
$end_date = date_create($_POST['project_end']);


function check_if_valid($d_1, $d_2)
{
    if ($d_1 > $d_2) {
        return False;
    }elseif(intval(date_diff($d_1,$d_2)->format('%a')) < 31){
        return False;
    } else{
        return True;
    }
}

$is_form_valid = check_if_valid($start_date, $end_date);
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
    <h1>Summary</h1>

    <nav class="navbar">
        <a href="/piekarnia/index.html">O nas</a>
        <a href="/piekarnia/login.html">Panel klienta</a>
        <a href="/piekarnia/index.php">Nasze wypieki</a>
    </nav>

    <article class="project_summary">
        <div class="project_type">
            <header>Project type:</header>
            <p><?php
                echo $_POST['app_kind']
                ?>
            </p>
        </div>
        <div class="project_schedule">
            <p>
                Project start: <?php echo $_POST['project_start']; ?>, and project end: <?php echo $_POST['project_end']; ?>
            </p>
        </div>
        <div class="project_description">
            <header>Project description: </header>
            <p>
                <?php echo $_POST['description']; ?>
            </p>
        </div>
        <div class="extras">
            <header>Premium packages:</header>
            <?php
            $extras_array = $_POST['formExtra'];
            if (empty($extras_array)) {
                echo ("<p>No additional premium packages has been chosen</p>");
            } else {
                for ($i = 0; $i < count($extras_array); $i++) {
                    echo ("<p>" . $extras_array[$i] . "</p>");
                }
            }
            ?>

        </div>
        <div class="project_evaluation">
            <header>Is project valid and saved?</header>
            <?php echo $is_form_valid?'<p style="color:green;">true</p>':'<p style="color:red;">false</p>';?>
        </div>
    </article>

</body>

</html>