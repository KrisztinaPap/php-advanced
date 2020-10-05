<?php

header( 'Content-type: app/JSON; charset=UTF-8' );

if ( isset( $_GET['search'] ) && ( !empty( $_GET['search'] ) ) )
{
    // echo "{\"response\":\"Search term: {$_GET['search']}\"}";
    $snacksJSONString = file_get_contents( '../data/snacks.json' );
    // echo $snacksJSONString;
    if ( $snacksJSONString !== FALSE )
    {
        $snackList = json_decode( $snacksJSONString ); 
        if ( $snackList !== NULL)
        {
            $matchingSnacks = array();
            foreach ( $snackList as $snack )
            {
                if ( stristr( $snack[0], $_GET['search'] ) )
                {
                    array_push( $matchingSnacks, $snack );
                }
            }
            if (!empty( $matchingSnacks ))
            {
                echo json_encode( $matchingSnacks );
            }
        }
        else
        {
            echo "{\"response\":\"ERROR: Unable to convert Snacks list from JSON.\"}";
        }
    }
    else 
    {
        echo "{\"response\":\"ERROR: Unable to retrieve Snacks list.\"}";
    }
}
else
{
    echo "{\"response\":\"ERROR: No search term present.\"}";
}