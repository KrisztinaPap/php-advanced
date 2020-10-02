<?php 
    $GLOBALS['pageTitle'] = 'Snacks Object Practice';
    require_once './includes/Snack.Class.php';
    include './templates/header.php'; 

    $snacks = [];

    $snacksFileString = file_get_contents( './data/snacks.json ');

    if ( $snacksFileString )
    {
        $snacksArray = json_decode( $snacksFileString );

        if ( $snacksArray )
        {
            foreach ( $snacksArray as $snack )
            {
                $snacks[] = new Snack( ...$snack );
            }
            // var_dump( $snacks );
        }
    }
?>

<?php if ( !empty( $snacks ) ) : ?>
    <h2>Our Snacks:</h2>
    <?php foreach ( $snacks as $snack ) $snack->output(); ?>
<?php else : ?>
    <p>Sorry, no snacks found!</p>
<?php endif; ?>


<?php include './templates/footer.php'; ?>