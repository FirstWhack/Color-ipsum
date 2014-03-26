<?php
//This script generates a color palette or gradient based on [hexadecimal, short-hex, rgb, color name] values sent through _GET['color'] or _GET['gradient]
$colors   = $_GET['color']; 
$gradient = $_GET['gradient'];

if (isset($colors)) { //added these to avoid sending a blank page with image headers. 
    header('Content-Type: image/png');
    $type = 'color';
} else if (isset($gradient)) {
    header('Content-Type: image/png');
    $type = 'gradient';
}

$colornames = array(
	"pink" => "FFC0CB",
	"lightpink" => "FFB6C1",
	"hotpink" => "FF69B4",
	"deeppink" => "FF1493",
	"palevioletred" => "DB7093",
	"mediumvioletred" => "C71585",
	"lightsalmon" => "FFA07A",
	"salmon" => "FA8072",
	"darksalmon" => "E9967A",
	"lightcoral" => "F08080",
	"indianred" => "CD5C5C",
	"crimson" => "DC143C",
	"firebrick" => "B22222",
	"darkred" => "8B0000",
	"red" => "FF0000",
	"orangered" => "FF4500",
	"tomato" => "FF6347",
	"coral" => "FF7F50",
	"darkorange" => "FF8C00",
	"orange" => "FFA500",
	"gold" => "FFD700",
	"yellow" => "FFFF00",
	"lightyellow" => "FFFFE0",
	"lemonchiffon" => "FFFACD",
	"lightgoldenrodyellow" => "FAFAD2",
	"papayawhip" => "FFEFD5",
	"moccasin" => "FFE4B5",
	"peachpuff" => "FFDAB9",
	"palegoldenrod" => "EEE8AA",
	"khaki" => "F0E68C",
	"darkkhaki" => "BDB76B",
	"cornsilk" => "FFF8DC",
	"blanchedalmond" => "FFEBCD",
	"bisque" => "FFE4C4",
	"navajowhite" => "FFDEAD",
	"wheat" => "F5DEB3",
	"burlywood" => "DEB887",
	"tan" => "D2B48C",
	"rosybrown" => "BC8F8F",
	"sandybrown" => "F4A460",
	"goldenrod" => "DAA520",
	"darkgoldenrod" => "B8860B",
	"peru" => "CD853F",
	"chocolate" => "D2691E",
	"saddlebrown" => "8B4513",
	"sienna" => "A0522D",
	"brown" => "A52A2A",
	"maroon" => "800000",
	"darkolivegreen" => "556B2F",
	"olive" => "808000",
	"olivedrab" => "6B8E23",
	"yellowgreen" => "9ACD32",
	"limegreen" => "32CD32",
	"lime" => "00FF00",
	"lawngreen" => "7CFC00",
	"chartreuse" => "7FFF00",
	"greenyellow" => "ADFF2F",
	"springgreen" => "00FF7F",
	"mediumspringgreen" => "00FA9A",
	"lightgreen" => "90EE90",
	"palegreen" => "98FB98",
	"darkseagreen" => "8FBC8F",
	"mediumseagreen" => "3CB371",
	"seagreen" => "2E8B57",
	"forestgreen" => "228B22",
	"green" => "008000",
	"darkgreen" => "006400",
	"mediumaquamarine" => "66CDAA",
	"aqua" => "00FFFF",
	"cyan" => "00FFFF",
	"lightcyan" => "E0FFFF",
	"paleturquoise" => "AFEEEE",
	"aquamarine" => "7FFFD4",
	"turquoise" => "40E0D0",
	"mediumturquoise" => "48D1CC",
	"darkturquoise" => "00CED1",
	"lightseagreen" => "20B2AA",
	"cadetblue" => "5F9EA0",
	"darkcyan" => "008B8B",
	"teal" => "008080",
	"lightsteelblue" => "B0C4DE",
	"powderblue" => "B0E0E6",
	"lightblue" => "ADD8E6",
	"skyblue" => "87CEEB",
	"lightskyblue" => "87CEFA",
	"deepskyblue" => "00BFFF",
	"dodgerblue" => "1E90FF",
	"cornflowerblue" => "6495ED",
	"steelblue" => "4682B4",
	"royalblue" => "4169E1",
	"blue" => "0000FF",
	"mediumblue" => "0000CD",
	"darkblue" => "00008B",
	"navy" => "000080",
	"midnightblue" => "191970",
	"lavender" => "E6E6FA",
	"thistle" => "D8BFD8",
	"plum" => "DDA0DD",
	"violet" => "EE82EE",
	"orchid" => "DA70D6",
	"fuchsia" => "FF00FF",
	"magenta" => "FF00FF",
	"mediumorchid" => "BA55D3",
	"mediumpurple" => "9370DB",
	"blueviolet" => "8A2BE2",
	"darkviolet" => "9400D3",
	"darkorchid" => "9932CC",
	"darkmagenta" => "8B008B",
	"purple" => "800080",
	"indigo" => "4B0082",
	"darkslateblue" => "483D8B",
	"slateblue" => "6A5ACD",
	"mediumslateblue" => "7B68EE",
	"white" => "FFFFFF",
	"snow" => "FFFAFA",
	"honeydew" => "F0FFF0",
	"mintcream" => "F5FFFA",
	"azure" => "F0FFFF",
	"aliceblue" => "F0F8FF",
	"ghostwhite" => "F8F8FF",
	"whitesmoke" => "F5F5F5",
	"seashell" => "FFF5EE",
	"beige" => "F5F5DC",
	"oldlace" => "FDF5E6",
	"floralwhite" => "FFFAF0",
	"ivory" => "FFFFF0",
	"antiquewhite" => "FAEBD7",
	"linen" => "FAF0E6",
	"lavenderblush" => "FFF0F5",
	"mistyrose" => "FFE4E1",
	"gainsboro" => "DCDCDC",
	"lightgray" => "D3D3D3",
	"lightgrey" => "D3D3D3",
	"silver" => "C0C0C0",
	"darkgray" => "A9A9A9",
	"darkgrey" => "A9A9A9",
	"gray" => "808080",
	"grey" => "808080",
	"dimgray" => "696969",
	"dimgrey" => "696969",
	"lightslategray" => "778899",
	"lightslategrey" => "778899",
	"slategray" => "708090",
	"slategrey" => "708090",
	"darkslategray" => "2F4F4F",
	"darkslategrey" => "2F4F4F",
	"black" => "000000"
);


function rgbFromHex($hexValue)
{
    if (strlen($hexValue) == 3) { //shorthand check
        $r = hexdec(str_repeat($hexValue[0], 2));
        $g = hexdec(str_repeat($hexValue[1], 2));
        $b = hexdec(str_repeat($hexValue[2], 2));
    } else if (strlen($hexValue) == 6) { //standard hex color
        $r = hexdec(substr($hexValue, 0, 2));
        $g = hexdec(substr($hexValue, 2, 2));
        $b = hexdec(substr($hexValue, 4, 2));
    } else {
        $r = 0;
        $g = 0;
        $b = 0;
    }
    
    $rgb = array(
        $r,
        $g,
        $b
    );
    return $rgb;
}

function getHexByName($name)
{
    global $colornames;
    if (isset($colornames[$name])) {
        return $colornames[$name];
    } else {
        return null;
    }
}

/*
 * $input - a string, possibly comma-separated list of HexValues and/or color names
 *
 * returns an array of [r, g, b] arrays
 */
function parseColors($input)
{
    $colorArray = array();
    $parts      = explode(",", $input);
    
    foreach ($parts as $color) {
        $byName = getHexByName($color);
        if (!isset($byName)) {
            array_push($colorArray, rgbFromHex($color));
        } else {
            if (strpos($byName, ",") !== FALSE) {
                // we're dealing with a multi-part name, eg: roygbiv
                foreach (parseColors($byName) as $col) {
                    array_push($colorArray, $col);
                }
            } else {
                array_push($colorArray, rgbFromHex($byName));
            }
        }
    }
    
    return $colorArray;
}

/* 
 * $colorArray - an array of [r, g, b] arrays. 
 *
 * returns an array of [r, g, b] arrays. 
 */
function interpolateGradient($colorArray)
{
    $steps        = 200;
    $arrLen       = count($colorArray) - 1;
    $stepsPerGrad = $steps / $arrLen;
    $output       = array();
    
    for ($step = 0; $step < $steps; $step++) {
        $index   = floor($step / $stepsPerGrad);
        $percent = $step / $stepsPerGrad - $index;
        $curr    = $colorArray[$index];
        $next    = $colorArray[$index + 1];
        
        array_push($output, array(
            $curr[0] + $percent * ($next[0] - $curr[0]),
            $curr[1] + $percent * ($next[1] - $curr[1]),
            $curr[2] + $percent * ($next[2] - $curr[2])
        ));
    }
    
    return $output;
}

/* 
 * $colorArray - an array of [r, g, b] arrays. 
 *
 * returns an image. 
 */
function createSwatch($colorArray)
{
    $img      = imagecreate(1200, 240);
    $colWidth = 1200 / count($colorArray);
    $x        = 0;
    foreach ($colorArray as $rgb) {
        $color = imagecolorallocate($img, $rgb[0], $rgb[1], $rgb[2]);
        imagefilledrectangle($img, $x, 0, $x + $colWidth, 240, $color);
        $x += $colWidth;
    }
    return imagepng($img);
}




if ($type == 'color') {
    $colorArray = parseColors(strtolower($colors));
} else if ($type == 'gradient') {
    $colorArray = interpolateGradient(parseColors(strtolower($gradient)));
} else {
    echo 'GO AWAY';
}

if (isset($colorArray)) {
    createSwatch($colorArray);
}

?>