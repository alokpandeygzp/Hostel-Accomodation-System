<?php
include('includes/config.php');



if (!empty($_POST["messName"])) {
    $id = $_POST["messName"];
    $query = "SELECT * FROM mess WHERE messName = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($row = $res->fetch_object()) {
        echo htmlentities($row->price);
    }
}
