<?php 
    session_start();
    if ( !isset( $_SESSION['calcHistory'] ) )
    {
        $_SESSION['calcHistory'] = array();
    } 

    $GLOBALS['pageTitle'] = 'PHP Calculator';
    include './templates/header.php';
    echo '<pre>';
    var_dump( $_GET );
    var_dump( $_POST );
    echo '</pre>';

    $result = FALSE;
    if ( !empty( $_GET ) )
    {
        switch ( $_GET['op'] )
        {
            case 'addition':
                $opSymbol = '+';
                $result = $_GET['value1'] + $_GET['value2'];
                break;
            case 'subtraction':
                $opSymbol = '-';
                $result = $_GET['value1'] - $_GET['value2'];
                break;
            case 'multiplication':
                $opSymbol = '&times;';
                $result = $_GET['value1'] * $_GET['value2'];
                break;
            case 'division':
                $opSymbol = '&divide;';
                $result = $_GET['value1'] / $_GET['value2'];
                break;
            default:
                break;
        }
        array_push( 
            $_SESSION['calcHistory'], 
            "{$_GET['value1']} {$opSymbol} {$_GET['value2']} = {$result}" 
        );
    }
    var_dump( $_SESSION );
    var_dump( $result );
?>

<p>
    Welcome to our Calculator page!
</p>

<form method="GET" action="calc.php">
    <label for="num1">
        Enter first operand:
        <input 
            id="num1" 
            name="value1"
            type="number"
            value="">
    </label>
      
    <label for="operator">
        Select an operator:
        <select id="operator" name="op">
            <option value="addition">+</option>
            <option value="subtraction">-</option>
            <option value="multiplication">&times;</option>
            <option value="division">&divide;</option>
        </select>
    </label>
  
    <label for="num2">
        Enter second operand:
        <input 
            id="num2" 
            name="value2"
            type="number"
            value="">
    </label>
    <input type="submit" value="Calculate!">
</form>

<?php if ( $result != FALSE ) : ?> 
    <p>
    Your result for your calculation is:
        <?php echo $result; ?>
    </p>
<?php endif; ?>

<?php 
    include './templates/footer.php';
?>