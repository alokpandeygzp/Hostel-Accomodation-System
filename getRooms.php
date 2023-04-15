<?php
include('includes/config.php');

if (!empty($_POST["hostelName"])) {
    $id = $_POST["hostelName"];
    $query = "SELECT * FROM rooms WHERE hostelName = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $res = $stmt->get_result();

    echo "<option\r";
    echo "value=\"";
    echo "\">";
    echo "Select&nbsp;Room";
    echo "</option>";
    while ($row = $res->fetch_object()) {
        echo "<option\r";
        echo "value=\"";
        echo $row->room_no;
        echo "\">";
        echo $row->room_no;
        echo "</option> ";
    }
}
