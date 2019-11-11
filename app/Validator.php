<?php

class Validator
{
        
    public function validate($student){
        $namePattern = "/^([а-я]+)$/ui";
        $surnamePattern = "/^(([а-я]+(\\s|'|-)?){1,3})$/ui";
        $groupNumPattern = "/^([0-9]{4,6})$/u";

        if (!preg_match($namePattern, $student->firstName)){
            return 'Введите корректное имя. Имя должно быть написано на кириллице.';
        }

        if (!preg_match($surnamePattern, $student->surName)) {
            return "Введите корректную фамилию. Фамилия должна быть написана на кириллице. Допустимые символы:', - ";
        }

        if (!preg_match($groupNumPattern, $student->groupNum)) {
            return 'Введите корректный номер группы. Номер группы состоит из 4-6 цифр.';
        }

        if (!(($student->examPoints > 0) && ($student->examPoints <= 300))) {
            return 'Введите корректные баллы ЕГЭ.';
        }
        return 1;
    }
}
