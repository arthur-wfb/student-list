<?php 

require_once('../init.php');


$validator = new Validator;


if (isset($_POST['name'])) {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $groupNum = trim($_POST['groupNum']);
    $points = intval($_POST['points']);
    $userId = $_COOKIE['user'];
    $result = $validator->validate(new Student($name, $surname, $groupNum, $points));
    if ($result == 1) {
        if ($student) {
            $StudentService->editStudentInfo($name, $surname, $groupNum, $points, $userId);
            $message = 'Сhanges saved successfully';
            require_once('../templates/success.php');
        } else {
            $StudentService->addStudent($name, $surname, $groupNum, $points, $userId);
            $message = 'Registration completed successfully';
            require_once('../templates/success.php');
        }
    } else {
        $message = $result;
        require_once('../templates/registration.php');
    }
} else {
    $message = false;
    require_once('../templates/registration.php');
}


