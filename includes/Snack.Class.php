<?php
class Snack
{
    // Properties
    public $name ='';
    public $type ='';
    public $price = 0.00;
    public $calories = 0;

    // Constructor method (runs every time we make a new instance)
    function __construct ( $name = '', $type = '', $price = 0.00, $calories = 0 )
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = number_format( $price, 2, '.', ',' ); // '.' for decimals, ',' for thousands
        $this->calories = intval( $calories ); // Converts to integer
    }

    public function caramelize()
    {
        $this->calories *= 2;
    }
}

$mySnack = new Snack ( 'Oh Henry', 'chocolate', 1.89, 200 );
var_dump ( $mySnack );

$mySnack->caramelize();
var_dump( $mySnack );
?>