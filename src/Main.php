<?php

require "./Utils/Wordwrap.php";

$wordwrap = new Wordwrap();

printResult("String: Hello, Length: 5",$wordwrap->wrap("Hello", 5));
printResult("Good part of Javascript, Length: 10",$wordwrap->wrap("Good part of Javascript", 10));
printResult("Hello World, Length: 5",$wordwrap->wrap("Hello World", 5));
printResult("Hello WorldHello World, Length: 5",$wordwrap->wrap("Hello WorldHello World", 5));
printResult("J2EE and SpringFramework, Length: 6", $wordwrap->wrap("J2EE and SpringFramework",6));
printResult("NewZealand, Length: 9", $wordwrap->wrap("NewZealand",9));
printResult("නායකයා, Length:3",$wordwrap->wrap("නායකයා", 3));
printResult("කානතා සම අයතන, Length:3",$wordwrap->wrap("කානතා සම අයතන", 3));
printResult("Privileged to hear in person from the legendary journo, Bob Woodward, Length:10",$wordwrap->wrap("Privileged to hear in person from the legendary journo, Bob Woodward", 10));
printResult("Word Word , Length: 6",$wordwrap->wrap("Word Word", 6));
printResult("Word Word ,Length 16",$wordwrap->wrap("Word Word ", 16));




function printResult($inputStr, $results) {
    echo "Input: ".$inputStr."\n";
    echo $results."\n";
    echo "---------------------------------------------------------\n";

}