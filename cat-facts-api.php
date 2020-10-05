<?php 
    session_start();
    $GLOBALS['pageTitle'] = 'Cat Facts - (External API Test)';
    include './templates/header.php';

    // @link https://alexwohlbruck.github.io/cat-facts/docs/endpoints/facts.html
    $dailyCatFactResponse = file_get_contents( 'https://cat-fact.herokuapp.com/facts/random' );

    if ( $dailyCatFactResponse )
    {
        $dailyCatFact = json_decode( $dailyCatFactResponse );

        ?>
            <h2>Today's cat fact:</h2>
            <p><?php echo $dailyCatFact->text; ?></p>
        <?php
    }

    ?>

    <h2>Request Animal Facts</h2>
    <form action="#" method="POST">
        <label for="amount">Enter the Amount of Facts:
        <input type="number" id="amount" name="amount"></label>
        <label for="animal-type">Enter the Type of Animal:
            <select id="animal-type" name="type">
                <option value="cat">Cat</option>
                <option value="dog">Dog</option>
                <option value="horse">Horse</option>
                <option value="snail">Snail</option>
        </label>
        <input type="submit" value="Get Animal Facts!">
    </form>    

    <?php

    if (isset( $_POST['amount']) && isset( $_POST['type']))
    {
        $factsListResponse = file_get_contents( "https://cat-fact.herokuapp.com/facts/random?amount={$_POST['amount']}&animal_type={$_POST['type']}");

        if ( $factsListResponse )
        {
            $factsList = json_decode( $factsListResponse );
            ?>
                <h2>List of 
                <?php echo ucfirst( $_POST['type']) ; ?>
                Facts</h2>
            <ol>
                <?php foreach ( $factsList as $fact ) : ?>
                    <li>
                        <?php echo $fact->text; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
            <?php
        }
    }
    
    

    include './templates/footer.php';