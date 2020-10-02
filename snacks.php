<?php 
    $GLOBALS['pageTitle'] = 'Snacks Object Practice';
    require_once './includes/Snack.Class.php';
    include './templates/header.php'; 

    $snacksFileString = file_get_contents( './data/snacks.json ');

    if ( $snacksFileString )
    {
        $snacksArray = json_decode( $snacksFileString );
        
        if ( $snacksArray )
        {
            var_dump( $snacksArray );
        }
    }
?>



<?php include './templates/footer.php'; ?>