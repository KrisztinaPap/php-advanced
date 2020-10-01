<?php 
    $GLOBALS['pageTitle'] = 'Home';
    include './templates/header.php';
    echo '<pre>';
    var_dump( $_GET );
    var_dump( $_POST );
    echo '</pre>';
?>

<p>
    Welcome to our <?php echo $GLOBALS['pageTitle'] ?> page!
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

<?php 
    include './templates/footer.php';
?>