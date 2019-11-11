<?php

class Pager
{   
    const STUDENTS_BY_PAGE = 5;
    
    public function getTotalPages($studentsAmount){
        return ceil($studentsAmount / self::STUDENTS_BY_PAGE);
    }
}
