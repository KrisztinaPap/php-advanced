<?php

header( 'Content-type: app/JSON; charset=UTF-8' );

if ( isset( $_GET['search'] ) && ( !empty( $_GET['search'] ) ) )
{
    // echo "{\"response\":\"Search term: {$_GET['search']}\"}";
    $snacksJSONString = file_get_contents( '../data/snacks.json' );
    echo $snacksJSONString;
}
else
{
    echo "{\"response\":\"ERROR: No search term present.\"}";
}