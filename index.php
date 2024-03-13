<?php

require_once "autoloader.php";

$connection = new Connection;
$conn = $connection->getConn();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>

<body>
    <table class="redTable">
        <thead>
            <tr>
                <td>
                    <div> <a href="add.php">New Client</a> </div>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = 'SELECT * From investment';
        $result = mysqli_query($conn, $query);

        $numRows = $result->num_rows;
        $rowsPag = 5;
        $numPag = ceil ($numRows / $rowsPag);

        $pagActive = (isset($_GET["page"])) ? $_GET["page"] : 1;
        $firstRow = ($pagActive -1) * $rowsPag;

        $lastRow = $firstRow + $rowsPag -1 ;
        $lastRow = ($lastRow > $numRows) ? $numRows-1 : $lastRow;



        echo '<table class="table table-striped">';
        echo '<tr>
                <th>Id</th>
                <th>Company</th>
                <th>Investment</th>
                <th>Date</th>
                <th>Active</th>
                <th colspan="2">Actions</th>
            </tr>';

            // Iterar sobre los registros de la página actual
            for ($i = $firstRow; $i <= $lastRow; $i++){
                $result->data_seek($i);
                $value = $result->fetch_array(MYSQLI_ASSOC);
                echo '<tr>';
                foreach ($value as $data){
                    echo '<td>' . $data . '</td>';
                }
                echo '<td><a href="edit.php?id=' . $value['id'] . '"><img src="img/edit_icon.png" width="25" height="25"></a></td>';
                echo '<td><a href="delete.php?id=' . $value['id'] . '"><img src="img/del_icon.png" width="25" height="25"></a></td>';
                echo '</tr>';
}

            /*while($value = $result->fetch_array(MYSQLI_ASSOC)){
                echo '<tr>';
                foreach($value as $element){
                    echo '<td>' . $element . '</td>';
                }
                echo '<td><a href="edit.php?id=' . $value['id'] . '"><img src="img/edit_icon.png" width="25" height="25"></a></td>';
                echo '<td><a href="delete.php?id=' . $value['id'] . '"><img src="img/del_icon.png" width="25" height="25"></a></td>';
                echo '</tr>';
            }*/
            echo '</table>';  
             
        $pagBefore = ($pagActive==1) ? 1 : $pagActive-1;
        echo " <a href='index.php?page=$pagBefore'><</a> ";

        for ($i=1; $i <= $numPag; $i++){
            if($i==$pagActive){
                echo " <strong>$i</strong> ";
            }else{
                echo " <a href='index.php?page=$i'>$i</a> ";
            }
        }
        $pagAfter = ($pagActive==$numPag) ?  $numPag : $pagActive+1;
        echo " <a href='index.php?page=$pagAfter'>></a> ";

        $result->close();
  

        ?>
        </tbody>
    </table>
</body>

</html>