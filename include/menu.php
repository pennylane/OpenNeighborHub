<div id='main_menu'>
    <div class='menu_elem active'>
        <i class="fas fa-home"></i> Home
    </div>
    <div class='menu_elem'>
        <i class="far fa-newspaper"></i> News
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

<?php
if (check_session()) {
    if (check_admin()) {
        echo '    
        <div class="menu_elem prelast">
            <i class="fas fa-user-circle"></i> Profile
        </div>            
        <div class="menu_elem last">
            <i class="fas fa-cogs"></i> Settings
        </div>            
        ';
    } else {
        echo '
        <div class="menu_elem last">
            <i class="fas fa-user-circle"></i> Profile
        </div>            
        ';
    }
} else {
    echo '
    <div class="menu_elem last">
        <i class="fas fa-sign-in-alt"></i> Log in
    </div>            
    ';
}
?>
</div>

