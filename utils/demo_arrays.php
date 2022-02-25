<?php

$data = [1, 2, 3, 44, 55, 66];
echo($data[1]."<br />");
$data[] = 77;
echo($data[6]."<br />");

for($i=0; $i < 7; $i++) {
    echo($data[$i]."<br />");
}

/* $people = [
    ["Yuri", "Andrienko", 123456],
    ["Vasya", "Pupkin", 500000],
    ["Masha", "Mashkina", 320000],
];
echo(count($people)."<br />");
for($i = 0; $i < count($people); $i++) {
    echo($people[$i][0]." - ".$people[$i][2]."<br /");
} */

$people = [
    array("FirstName"=>"Yuri", "LastName"=>"Andrienko", "Salary"=>123456),
    array("FirstName"=>"Vasya", "LastName"=>"Pupkin", "Salary"=>500000),
    array("FirstName"=>"Masha", "LastName"=>"Mashkina", "Salary"=>320000),
];
echo(count($people)."<br />");

for($s = 0; $s < count($people); $s++) {
    echo($people[$s]["FirstName"]." - ".$people[$s]["Salary"]."<br /");
}