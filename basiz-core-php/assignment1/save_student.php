<?php
include "../db/database.php";

$mobile = $_POST['father_mobile'];
if (!preg_match('/^[0-9]{10}$/', $mobile)) {
    exit("Invalid mobile number");
}

$stmt = $conn->prepare(
"INSERT INTO students(name,gender,standard,dob,age,father_name,father_mobile,email)
 VALUES (?,?,?,?,?,?,?,?)"
);

$stmt->bind_param("ssssisss",
$_POST['name'], $_POST['gender'], $_POST['standard'],
$_POST['dob'], $_POST['age'],
$_POST['father_name'], $mobile, $_POST['email']);

$stmt->execute();
