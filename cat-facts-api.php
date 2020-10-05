<?php 
    session_start();
    $GLOBALS['pageTitle'] = 'Cat Facts - (External API Test)';
    include './templates/header.php';

    // @link https://alexwohlbruck.github.io/cat-facts/docs/endpoints/facts.html
    $dailyCatFactResponse = file_get_contents( 'http://cat-fact.herokuapp.com/facts/random' );

    if ( $dailyCatFactResponse )
    {
        $dailyCatFact = json_decode( $dailyCatFactResponse );

        ?>
            <h2>Today's cat fact:</h2>
            <p><?php echo $dailyCatFact->text; ?></p>
        <?php
    }

    include './templates/footer.php';
?>