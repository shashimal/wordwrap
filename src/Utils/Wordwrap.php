<?php

class Wordwrap
{

    /*
      Wrap a string into new lines when it reaches a specific length

      params: $string , $length

      return wrapped string;

   */
    public function wrap($string = null, $length = null)
    {

        $this->validateString($string);

        if (empty($length)) {
            return $string;
        }

        $splitWords = $this->splitToWordsArray($string);

        $wrappedString = "";
        $array = null;

        if (!empty($splitWords) && is_array($splitWords)) {
            //Track the length of current line
            $currentLineLength = 0;

            foreach ($splitWords as $key => $word) {

                if ($currentLineLength + mb_strlen($word, 'UTF-8') > $length) {

                    //move to the next line when the current line has reached to the maximum length
                    if ($currentLineLength > 0) {
                        $wrappedString .= "\n";
                        $currentLineLength = 0;
                    }

                    //break a word if it is longer than $length characters
                    while (mb_strlen($word, 'UTF-8') > $length) {
                        $wrappedString .= mb_substr($word, 0, $length, 'UTF-8');
                        $word = mb_substr($word, $length, null, 'UTF-8');
                        $wrappedString .= "\n";
                    }

                    $word = ltrim($word);
                }

                if ($currentLineLength + mb_strlen($word, 'UTF-8') == $length) {
                    $wrappedString .= $word;
                } else {
                    $wrappedString .= $word . " ";
                }

                $currentLineLength += mb_strlen($word, 'UTF-8') + 1;
            }
        } else {
            throw new Exception("Invalid String");
        }

        return trim($wrappedString);
    }

    /*
        Given string is converted into an array

        params: $string

        return array of words;

    */
    private function splitToWordsArray($string)
    {
        $words = null;

        if (!empty($string)) {
            $words = explode(" ", $string);
        }

        return $words;
    }

    /*
       Validate the string

        params: $string

   */
    private function validateString($string)
    {
        if (empty($string)) {
            throw  new Exception("String value can't be empty");
        }
    }

    /*
     Validate the string length

     params: $length

 */
    private function validateStringLength($length)
    {
        if (empty($length)) {
            throw  new Exception("Length should be greater than 0");
        }
    }
}
