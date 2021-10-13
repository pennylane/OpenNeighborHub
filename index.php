<!DOCTYPE html>

<?php
require_once 'app/files.php';
require_once 'app/session.php';

verify_session();
//$uid = get_uid();

if (check_method('GET')) {
}

$site_name = $GLOBALS['config']['site']['site_name'];
$site_title = $GLOBALS['config']['site']['site_title'];
$site_lang = $GLOBALS['config']['site']['site_lang'];
$site_theme = $GLOBALS['config']['site']['site_theme'];
?>

<html>

    <head>
        <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico">
        <?php print '<link rel="stylesheet" href="styles/'.$site_theme.'/main-dark.css">' ?>
    </head>

    <body>

        <?php include 'include/header.php' ?>

        <?php include 'include/menu.php' ?>

        <div id='main-container'>
            <h3>Welcome</h3>

            <p>
                TBD ...
            </p>

        </div>
    
    </body>

</html>
