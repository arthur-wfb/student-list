<?php

require_once('../init.php');

spl_autoload_register(function ($class) {
    $path = dirname(__DIR__, 1) . "\\app\\" . $class . '.php';
    
    if (file_exists($path)) {
        require_once $path;
    }
});

$pager = new Pager;

if (!isset($_COOKIE['user'])){
    setcookie("user", md5(rand()), time()+3600*24*365);
}


$totalPagesAmount = $pager->getTotalPages(intval($StudentService->getStudentsAmount(0, 0)["COUNT(*)"]));
$page = ( isset($_GET['page']) && intval($_GET['page']) <= $totalPagesAmount ) ? intval($_GET['page']) : 1;

if (isset($_GET['search']) || isset($_GET['sort'])){
    $searchValue = isset($_GET['search']) ? $_GET['search'] : '';
    $sortValue = isset($_GET['sort']) ? $_GET['sort'] : '';
    $studentsAmount = intval($StudentService->getStudentsAmount($searchValue, $sortValue)["COUNT(*)"]);
    $pagesAmount = $pager->getTotalPages($studentsAmount);
    $students = $StudentService->getStudentsBySearch($searchValue, $sortValue, 
                                                     $page * Pager::STUDENTS_BY_PAGE - Pager::STUDENTS_BY_PAGE, Pager::STUDENTS_BY_PAGE);
    require_once('../templates/studentList.php');
} else {
    $studentsAmount = intval($StudentService->getStudentsAmount(0, 0)["COUNT(*)"]);
    $pagesAmount = $pager->getTotalPages($studentsAmount);
    $students = $StudentService->getStudents($page * Pager::STUDENTS_BY_PAGE - Pager::STUDENTS_BY_PAGE, Pager::STUDENTS_BY_PAGE);
    require_once('../templates/studentList.php');
}

