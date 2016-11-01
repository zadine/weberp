<?php
/**
 * Created by PhpStorm.
 * User: YuinoiJomzone
 * Date: 10/7/2016 AD
 * Time: 11:53 AM
 */
Class test
{
    function royalKanil($a)
    {

        $ascii = ord(iconv("UTF-8", "TIS-620", $a));

        if ($ascii == 209 || ($ascii >= 212 && $ascii <= 218) || ($ascii >= 231 && $ascii <= 238)) {

//                print "yes";
            return true;

        } else {
//                print "no";
            return false;
        }


    }

    function utf8_strlen($s)
    {

        $c = strlen($s);
        $l = 0;
        for ($i = 0; $i < $c; ++$i) if ((ord($s[$i]) & 0xC0) != 0x80) ++$l;
        return $l;
    }

    function getSubStrBaseTH($string, $start, $length)
    {

        $array = $this->getMBStrSplit($string);

        foreach ($array as $value) {
            $ascii = ord(iconv("UTF-8", "TIS-620", $value));

            if (!($ascii == 209 || ($ascii >= 212 && $ascii <= 218) || ($ascii >= 231 && $ascii <= 238))) {
                $count += 1;

                $countstart++;
            }
        }

        $start = $countstart;

        if ($length == null) {

            $length = count($array);

        } else {
            $length = ($length + $start) - 1;
        }

        $length = ($length + $start) - 1;
//            $array = $this->getMBStrSplit($string);
        $count = 0;
        $return = "";

        for ($i = $start; $i < count($array); $i++) {
            $ascii = ord(iconv("UTF-8", "TIS-620", $array[$i]));

            if ($ascii == 209 || ($ascii >= 212 && $ascii <= 218) || ($ascii >= 231 && $ascii <= 238)) {
                //$start++;
                $length++;
            }


            if ($i <= $length) {

                if ($i >= $start) {
                    $return .= $array[$i];
                }

            } else {


                $j = $i + 1;
//                    print $length;

                while ($this->royalKanil($array[$j])) {

                    $length++;
                    $j++;

                }

                //$return .= $array[$j];

//                    print $length;

                break;

            }

        }

        return $return;
    }

    function getSubStrTH($string, $start, $length)
    {

        $array = $this->getMBStrSplit($string);

        foreach ($array as $value)


            if ($length == null) {

                $length = count($array);

            } else {
                $length = ($length + $start) - 1;
            }

        $length = ($length + $start) - 1;
//            $array = $this->getMBStrSplit($string);
        $count = 0;
        $return = "";

        for ($i = $start; $i < count($array); $i++) {
            $ascii = ord(iconv("UTF-8", "TIS-620", $array[$i]));

            if ($ascii == 209 || ($ascii >= 212 && $ascii <= 218) || ($ascii >= 231 && $ascii <= 238)) {
                //$start++;
                $length++;
            }


            if ($i <= $length) {

                if ($i >= $start) {
                    $return .= $array[$i];
                }

            } else {


                $j = $i + 1;
//                    print $length;

                while ($this->royalKanil($array[$j])) {

                    $length++;
                    $j++;

                }

                //$return .= $array[$j];

//                    print $length;

                break;

            }

        }

        return $return;
    }

    function getMBStrSplit($string, $split_length = 1)
    {
        mb_internal_encoding('UTF-8');
        mb_regex_encoding('UTF-8');

        $split_length = ($split_length <= 0) ? 1 : $split_length;
        $mb_strlen = mb_strlen($string, 'utf-8');
        $array = array();
        $i = 0;

        while ($i < $mb_strlen) {
            $array[] = mb_substr($string, $i, $split_length);
            $i = $i + $split_length;
        }

        return $array;
    }

    function getStrLenTH($string)
    {
        $array = $this->getMBStrSplit($string);
        $count = 0;

        foreach ($array as $value) {
            $ascii = ord(iconv("UTF-8", "TIS-620", $value));

            if (!($ascii == 209 || ($ascii >= 212 && $ascii <= 218) || ($ascii >= 231 && $ascii <= 238))) {
                $count += 1;
            }
        }
        return $count;
    }
}

$test = new Test();

$a = "บุญอนันต์ สุวรณจักร์";
$b = "สิทธิ์ุ";
$lora = "เฟอร์รี่คัตเอาต์น็อคซินโดรมโมเดล คันธาระ พล็อต ซูชิไอติมสตาร์มหภาค ละอ่อนอันตรกิริยา เซอร์สะกอมมอบตัวเช็งเม้งทรู ฮ่องเต้ซูมคลับสแล็ก";

print getSubStrTH($lora,0) . "<br>";
//print mb_substr($a,4);



