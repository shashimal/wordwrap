<?php

class Wordwrap
{

    const ENCODING_FORMAT = "UTF-8";
    const NEW_LINE = "\n";

    /***
     *  Wrap a string into new lines when it reaches a specific length
     * @param null $string
     * @param null $length
     * @return null|string
     * @throws Exception
     */
    public function wrap($string = null, $length = null)
    {

        if (empty($length) || empty($string)) {
            return $string;
        }

        $splitWords = $this->splitToWordsArray($string);
        $outputWords = null;

        if (!empty($splitWords) && is_array($splitWords)) {
            //track the length of current line
            $currentLineLength = 0;

            $index = 0;
            foreach ($splitWords as $key => $word) {

                if ($currentLineLength + mb_strlen($word, self::ENCODING_FORMAT) > $length) {
                    //move to the next line when the current line has reached to the maximum length
                    if ($currentLineLength > 0) {

                        if (count($outputWords) != 0) {
                            $outputWords[$index - 1] .= self::NEW_LINE;
                        }

                        $currentLineLength = 0;
                    }

                    //break a word if it is longer than $length characters
                    while (mb_strlen($word, self::ENCODING_FORMAT) > $length) {
                        if (count($outputWords) != 0) {
                            $outputWords[$index - 1] .= mb_substr($word, 0, $length, self::ENCODING_FORMAT);
                            $outputWords[$index - 1] .= self::NEW_LINE;
                        } else {
                            $outputWords[$index] .= mb_substr($word, 0, $length, self::ENCODING_FORMAT);
                            $outputWords[$index] .= self::NEW_LINE;
                        }

                        $index += 1;

                        $word = mb_substr($word, $length, null, self::ENCODING_FORMAT);
                    }

                    $word = ltrim($word);
                }

                if ($currentLineLength + mb_strlen($word, self::ENCODING_FORMAT) == $length) {
                    $outputWords[$index] .= $word;
                } else {
                    $outputWords[$index] .= $word . " ";
                }
                $index += 1;

                $currentLineLength += mb_strlen($word, self::ENCODING_FORMAT) + 1;
            }
        } else {
            throw new Exception("Invalid String");
        }

        $wrappedString = $this->buildWrappedString($outputWords);

        return $wrappedString;
    }

    /***
     * Given string is converted into an array
     * @param $string
     * @return array|null
     */
    private function splitToWordsArray($string)
    {
        $words = null;

        if (!empty($string)) {
            $words = explode(" ", $string);
            //$words =  preg_split( '/[\t\s]/', $string );
        }

        return $words;
    }

    /***
     * Build the wrapped string using output words
     * @param $outputWords
     * @return string
     */
    private function buildWrappedString($outputWords)
    {
        $str = "";
        $size = count($outputWords);
        $i = 0;
        if ($size > 0) {
            foreach ($outputWords as $value) {
                if ($size - 1 == $i) {
                    $value = trim($value);
                }

                if (strstr($value, self::NEW_LINE)) {
                    $str .= str_replace(" ", "", $value);
                } else {
                    $str .= $value;
                }

                $i++;
            }
        }
        return $str;
    }
}
