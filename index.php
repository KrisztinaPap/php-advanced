<?php 
    session_start();
    $GLOBALS['pageTitle'] = 'Home';
    include './templates/header.php';
?>

<p>
    Welcome to our <?php echo $GLOBALS['pageTitle'] ?> page!
</p>

<?php if( isset( $_SESSION['calcHistory'] ) ) : ?>
    <h2>Calculator History (from current session only)</h2>
    <ul>
        <?php foreach ( $_SESSION['calcHistory'] as $calculation ) : ?>
            <li>
                <?php echo $calculation; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php 
    include './templates/footer.php';
?>