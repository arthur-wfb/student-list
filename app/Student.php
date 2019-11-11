<?php

class Student
{
    function __construct($firstName, $surName, $groupNum, $examPoints){
        $this->firstName = $firstName;
        $this->surName = $surName;
        $this->groupNum = $groupNum;
        $this->examPoints = $examPoints;
    }
}
