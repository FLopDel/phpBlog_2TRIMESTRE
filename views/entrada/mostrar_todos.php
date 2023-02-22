<h2>ULTIMAS ENTRADAS</h2>
<?php
// foreach ($entradaConTitulo as $fila) {
//     foreach($fila as $campo => $valor){
//         if (!is_numeric($campo)) {
//             echo "$campo : $valor <br><br>";
//         } 
//     }
    
// }
?>

<!doctype html>
<html>
<head>
    <title>Zebra Pagination</title>
    <link rel="stylesheet" href="../src/css/zebra_pagination.css" type="text/css">
    <link rel="stylesheet" href="../src/css/style.css" type="text/css">
</head>
<body>

    <?php

    // database connection details
    $MySQL_host     = 'localhost';
    $MySQL_username = 'root';
    $MySQL_password = '';
    $MySQL_database = 'blog';

    // if could not connect to database
    if (!($connection = @mysqli_connect($MySQL_host, $MySQL_username, $MySQL_password, $MySQL_database)))

        // stop execution and display error message
        die('Error connecting to the database!<br>Make sure you have specified correct values for host, username, password and database.');

    // how many records should be displayed on a page?
    $records_per_page = 10;

    // include the pagination class
    require_once '../vendor/stefangabos/zebra_pagination/Zebra_Pagination.php';

    // instantiate the pagination object
    $pagination = new Zebra_Pagination();

    // if we want to show records in reversed order
    if (isset($_GET['reversed'])) {

        // show records in reversed order
        $pagination->reverse(true);

        // when showing records in reversed order, we need to call the "records" and "records_per_page" method
        // before calling the "get_page" method

        $result = mysqli_query($connection, 'SELECT COUNT(id) AS records FROM entradas') or die (mysqli_error($connection));
        $total = mysqli_fetch_assoc($result);

        // pass the total number of records to the pagination class
        $pagination->records($total['records']);

        // records per page
        $pagination->records_per_page($records_per_page);

    }

    // set position of the next/previous page links
    $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');

    // if we have to show condensed links
    if (isset($_GET['condensed']) && ($_GET['condensed'] == 1 || $_GET['condensed'] == 2)) $pagination->condensed($_GET['condensed'] == 2 ? true : '');

    // the MySQL statement to fetch the rows
    $MySQL = '
        SELECT
            titulo,
            descripcion,
            fecha
        FROM
            entradas
        LIMIT
            ' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '
    ';

    // if query could not be executed
    if (!($result = @mysqli_query($connection, $MySQL)))

        // stop execution and display error message
        die(mysqli_error($connection));

    // // fetch the total number of records in the table
    $rows = mysqli_query($connection, 'SELECT COUNT(*) AS `rows` FROM entradas') or die(mysqli_error($connection));
    $rows = mysqli_fetch_assoc($rows);

    // if we are not showing records in reversed order
    // (if we are, we already set these)
    if (!isset($_GET['reversed'])) {

        // pass the total number of records to the pagination class
        $pagination->records($rows['rows']);

        // records per page
        $pagination->records_per_page($records_per_page);

    }

    ?>

    <table class="productos" border="1">
        <thead>
            <tr>
                <th>titulo</th>
                <th>descripcion</th>
                <th>fecha</th>
            </tr>
            
        </thead>
        <tbody>

        <?php $index = 0; while ($row = mysqli_fetch_assoc($result)): ?>
        <tr<?php echo $index++ % 2 ? ' class="even"' : ''; ?>>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['descripcion'];?></td>
            <td><?php echo $row['fecha'];?></td>
        </tr>
        <?php endwhile; ?>

        </tbody>
    </table>

    <div class="text-center">

    <?php

    // render the pagination links
    $pagination->render();

    ?>

    </div>

</body>
</html>