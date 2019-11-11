<?php 

class StudentService
{
    function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function getStudentsAmount($searchValue, $sortValue){
        if ($searchValue && !$sortValue) {
            $sql = "SELECT COUNT(*) FROM students WHERE CONCAT(name, ' ', surname) LIKE '%$searchValue%'";
        } elseif ($searchValue && $sortValue) {
            $sql = "SELECT COUNT(*) FROM students WHERE CONCAT(name, ' ', surname) LIKE '%$searchValue%' ORDER BY $sortValue";
        } elseif ($sortValue && !$searchValue) {
            $sql = "SELECT COUNT(*) FROM students ORDER BY $sortValue";
        } else {
            $sql = "SELECT COUNT(*) FROM students";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function getStudents($from, $studentsByPage)
    {   
        $students = array();
        $sql = "SELECT * FROM students LIMIT $from, $studentsByPage";
        foreach ($this->pdo->query($sql) as $row) {
            $students[] = new Student($row['name'], $row['surname'], $row['groupNum'], $row['points']);
        }
        return $students = $students;
    }

    public function getStudentsBySearch($searchValue, $sortValue, $from, $studentsByPage)
    {   
        $students = array();
        if ($searchValue && !$sortValue) {
            $sql = "SELECT * FROM students WHERE CONCAT(name, ' ', surname) LIKE '%$searchValue%' LIMIT $from, $studentsByPage";
        } else {
            $sql = "SELECT * FROM students WHERE CONCAT(name, ' ', surname) LIKE '%$searchValue%' ORDER BY $sortValue LIMIT $from, $studentsByPage";
        }
        if ($this->pdo->query($sql)) {
            foreach ($this->pdo->query($sql) as $row) {
                $students[] = new Student($row['name'], $row['surname'], $row['groupNum'], $row['points']);
            }
        }
        
        return $students;
    }

    public function addStudent($name, $surname, $groupNum, $points, $userId){
        $sql = "INSERT INTO students (name, surname, groupNum, points, userId) VALUES ('$name', '$surname', '$groupNum', '$points', '$userId')";
        $this->pdo->query($sql);   
        return;
    }

    public function getStudentById($userId){
        $sql = "SELECT * FROM students WHERE userID = '$userId'";
        $student = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $student = $student ? $student : false;
    }

    public function editStudentInfo($name, $surname, $groupNum, $points, $userId) {
        $sql = "UPDATE students SET name = '$name', surname = '$surname', groupNum = '$groupNum', points = '$points' WHERE userId = '$userId'";
        $this->pdo->query($sql);    
        return;
    }
}
