<?php

class Cartera
{
    /*private $clients = [];*/


    /* function getClient($id)
    {
        foreach ($this->clients as $client) {
            if ($client->getId() == $id)
                return $client;
        }
        return new Empresa(null, null, null, null, null);
    }*/

   

    /*public function delete($id)
    {
        $connection = new Connection;
        $conn = $connection->getConn();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
                
        $query = "DELETE FROM investment WHERE id = '$id'";

        if (mysqli_query($conn, $query)) {
            header("location: index.php");
        }
        mysqli_close($conn);
    }*/

    /*public function update($datos)
    {
        $connection = new Connection;
        $conn = $connection->getConn();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $id=$_POST["id"];
		$company=$_POST["company"];
		$investment=$_POST["investment"];
		$date=$_POST["date"];
		$active=$_POST["active"];
        
        $query = "UPDATE investment SET company=?, investment=?, date=?, active=? WHERE id=?";

    }*/

    /*public function insert($datos)
    {
        $connection = new Connection;
        $conn = $connection->getConn();
                
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$id=$datos["id"];
		$company=$datos["company"];
		$investment=$datos["investment"];
		$date=$datos["date"];
		$active=$datos["active"];

		$query = "INSERT INTO `investment`(id, company, investment, date, active)
		VALUES ('$id','$company','$investment','$date','$active')";  

    }*/

    /*public function drawList()
    {
        $conn = mysqli_connect('db', 'root', 'test', "ap21");
                
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = 'SELECT * From investment';
        $result = mysqli_query($conn, $query);

        echo '<table class="table table-striped">';
        echo '<tr>
                <th>Id</th>
                <th>Company</th>
                <th>Investment</th>
                <th>Date</th>
                <th>Active</th>
                <th colspan="2">Actions</th>
            </tr>';

            while($value = $result->fetch_array(MYSQLI_ASSOC)){
                echo '<tr>';
                foreach($value as $element){
                    echo '<td>' . $element . '</td>';
                }
                echo '<td><a href="edit.php?id=' . $value['id'] . '"><img src="img/edit_icon.png" width="25" height="25"></a></td>';
                echo '<td><a href="delete.php?id=' . $value['id'] . '"><img src="img/del_icon.png" width="25" height="25"></a></td>';
                echo '</tr>';
            }
            echo '</table>';    

        $result->close();
        mysqli_close($conn);
    }*/
}
?>