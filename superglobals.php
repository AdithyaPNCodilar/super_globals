<?php
    // $name = $_POST['name'];
    // $address = $_POST['email'];
    // $phone = $_POST['phone'];
    // $image = $_FILES['image']['name'];
    // $tmp_image = $_FILES['image']['tmp_name'];
    // $filledData = file_get_contents('data.json');

    // $filled_array = json_decode($filledData, true);

    // $data = array(
    //     "name"=>$name,
    //     "email"=>$address,
    //     "phone"=>$phone,
    //     "image"=>$image
    // );
    // $filled_array[] =$data;
    // $json_data = json_encode($filled_array);
    // move_uploaded_file($tmp_image, 'uploads/'.$image);
    // file_put_contents("data.json",$json_data,FILE_APPEND);
    // echo $json_data;

   


function appendData(){

    $data = file_get_contents('data.json');
    $registrations = json_decode($data, true);
    $image = $_FILES['image']['name'];
    $temp_file = $_FILES['image']['tmp_name'];

    if ($_POST != null) {

        $registration = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'image' => $_FILES['image']['name']
        );
        array_push($registrations, $registration);


        $data = json_encode($registrations, JSON_PRETTY_PRINT);
        move_uploaded_file($temp_file, "uploads/" . $image);

        file_put_contents('data.json', $data);

        echo 'Registration successful';
    } else {
        echo 'Registration Unsuccessful';
    }

}

if(file_get_contents('data.json') == null) {
    file_put_contents('data.json', '[]');
}
appendData();
?>