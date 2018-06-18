p\'i86b n<?php
/**
 * Created by PhpStorm.
 * User: duleendra
 * Date: 6/13/18
 * Time: 9:56 PM
 */

use PHPUnit\Framework\TestCase;

require "../Utils/Wordwrap.php";

class WordwrapTest extends TestCase{

    private $wordwrap;

    protected function setUp(){
        $this->wordwrap = new Wordwrap();
    }

    protected function tearDown(){
        $this->wordwrap = null;
    }

    public function test_single_string_with_length_5(){
        $result = $this->wordwrap->wrap("Hello", 5);
        $this->assertEquals("Hello", $result);
    }

    public function  test_sentence_with_length_10(){
        $result = $this->wordwrap->wrap("Good part of Javascript", 10);
        $this->assertEquals("Good part \nof \nJavascript", $result);
    }

    public function test_string_with_same_length_of_words(){
        $result = $this->wordwrap->wrap("Hello World", 5);
        $this->assertEquals("Hello\nWorld", $result);
    }

    public function test_string_mix_words(){
        $result = $this->wordwrap->wrap("Hello WorldHello World", 5);
        $this->assertEquals("Hello\nWorld\nHello\nWorld", $result);
    }

    public function test_string_greater_than_length(){
        $result = $this->wordwrap->wrap("J2EE and SpringFramework", 5);
        $this->assertEquals("J2EE \nand \nSprin\ngFram\nework", $result);
    }

    public function test_single_string_greater_than_length(){
        $result = $this->wordwrap->wrap("NewZealand", 9);
        $this->assertEquals("NewZealan\nd", $result);
    }

    public function test_non_english_string() {
        $result = $this->wordwrap->wrap("නායකයා", 3);
        $this->assertEquals("නාය\nකයා", $result);
    }

    public function test_string_with_empty_length() {
        $result = $this->wordwrap->wrap("Hello World");
        $this->assertEquals("Hello World", $result);
    }

    public function test_string_with_empty_string() {
        $result = $this->wordwrap->wrap("0");
        $this->assertEquals("0", $result);
    }

}