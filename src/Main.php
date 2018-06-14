<?php
/**
 * Created by PhpStorm.
 * User: duleenw
 * Date: 14/6/18
 * Time: 10:08 AM
 */

require "./Utils/Wordwrap.php";

$wordwrap = new Wordwrap();
echo $wordwrap->wrap("Hello New Zealand How Are you",15);
echo "\n";
echo $wordwrap->wrap("ඇමsරිකා එක්සත් ජනපද ජනාධිපති ඩොනල්ඩ් ට්‍රම්ප් සහ උතුරු කොරියානු නායක කිම් ජොන් අන් අතර සිංගප්පූරුවේ දී පැවති ඓතිහාසික සමුළුවට පැමිණි මාධ්‍යවේදීන් වෙත",10);