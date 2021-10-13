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
?>

<html>

    <head>
        <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico">
        <?php print '<link rel="stylesheet" href="styles/main-dark.css">' ?>
    </head>

    <body>

        <div id='head'>
            <img class='head_img left' src="assets/sunflower-gnome.png" alt="Sunflower & Garden Gnome">
            <h1 id='site_title'> <?php echo $site_name ?> </h1>
            <h2 id='site_subtitle'> <?php echo $site_title ?> </h2>
            <img class='head_img right' src="assets/sunflower-gnome.png" alt="Sunflower & Garden Gnome">
        </div>
        <hr>

        <div id='main_menu'>
            <div class='menu_elem active'>
                <i class="fas fa-home"></i> Home
            </div>
            <div class='menu_elem'>
                <i class="far fa-lightbulb"></i> Wiki
            </div>
            <div class='menu_elem'>
                <i class="fas fa-glass-cheers"></i> Events
            </div>            
            <div class='menu_elem'>
                <i class="fas fa-book-open"></i> Blog 
            </div>            
            <div class='menu_elem prelast'>
                <i class="fas fa-user-circle"></i> Profile
            </div>            
            <div class='menu_elem last'>
                <i class="fas fa-cogs"></i> Settings
            </div>            
        </div>

        <div id='main-container'>
            <h3>Welcome</h3>

            <p>
                TBD ...
            </p>

        </div>
    
    </body>

</html>
