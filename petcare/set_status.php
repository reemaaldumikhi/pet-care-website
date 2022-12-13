<?php

require_once 'db.php';


}

$post = file_get_contents("php://input");
$data = json_decode($post, true);

$pEmail = $data['pEmail'];
$new_status = $data['status'];

if ($new_status == 'rejected') {
    $sql = "DELETE FROM petappointment WHERE pEmail='$pEmail'";

} else {
    $sql = "UPDATE petappointment SET status='$new_status' WHERE pEmail='$pEmail'";

}

$result = $Connect->query($sql);

$return_array = array();

if ($result) {
    $return_array = array([
        "status" => "OK",
        "message" => "Appointment $new_status."
    ]);
} else {
    $return_array = array([
        "status" => "BAD",
        "message" => "Failed to set appointment status."
    ]);
}


echo json_encode($return_array, JSON_PRETTY_PRINT);



?>
