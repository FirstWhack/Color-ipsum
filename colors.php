<?php






//This script generates a color palette or gradient based on [hexadecimal, short-hex, rgb, color name] values sent through _GET['color'] or _GET['gradient]
$colors   = $_GET['color']; 
$gradient = $_GET['gradient'];
$ipsum = $_GET['ipsum'];

$width  = $_GET['w'];
$height = $_GET['h'];

if (isset($colors)) { //added these to avoid sending a blank page with image headers. 
    header('Content-Type: image/png');
    $type = 'color';
} else if (isset($gradient)) {
    header('Content-Type: image/png');
    $type = 'gradient';
} else if (isset($ipsum)) {
    header('Content-Type: image/png');
    $type = 'ipsum';
}



function logIP() 
{  
     $ipLog="logfile.txt"; // Your logfiles name here (.txt or .html extensions ok) 


     $register_globals = (bool) ini_get('register_gobals'); 
     if ($register_globals) $ip = getenv(REMOTE_ADDR); 
     else $ip = $_SERVER['REMOTE_ADDR']; 

     $date=date ("l dS of F Y h:i:s A"); 
     $log=fopen("$ipLog", "a+"); 

     if (preg_match("/\bhtm\b/i", $ipLog) || preg_match("/\bhtml\b/i", $ipLog))  
     { 
          fputs($log, "{$_REQUEST['name']} - Logged IP address: $ip {$_GET['color']} - Date logged: $date<br>{$_SERVER['HTTP_USER_AGENT']}"); 
     } 
     else {
     	fputs($log, "{$_REQUEST['name']} - Logged IP address: $ip {$_GET['color']} - Date logged: $date\n {$_SERVER['HTTP_USER_AGENT']}");
     }

     fclose($log); 
} 



$colornames = array( // These are handled by `getHexByName()`
	"aliceblue" => "F0F8FF",
	"antiquewhite" => "FAEBD7",
	"aqua" => "00FFFF",
	"aquamarine" => "7FFFD4",
	"azure" => "F0FFFF",
	"beige" => "F5F5DC",
	"bisque" => "FFE4C4",
	"black" => "000000",
	"blanchedalmond" => "FFEBCD",
	"blue" => "0000FF",
	"blueviolet" => "8A2BE2",
	"brown" => "A52A2A",
	"burlywood" => "DEB887",
	"cadetblue" => "5F9EA0",
	"chartreuse" => "7FFF00",
	"chocolate" => "D2691E",
	"coral" => "FF7F50",
	"cornflowerblue" => "6495ED",
	"cornsilk" => "FFF8DC",
	"crimson" => "DC143C",
	"cyan" => "00FFFF",
	"darkblue" => "00008B",
	"darkcyan" => "008B8B",
	"darkgoldenrod" => "B8860B",
	"darkgray" => "A9A9A9",
	"darkgreen" => "006400",
	"darkgrey" => "A9A9A9",
	"darkkhaki" => "BDB76B",
	"darkmagenta" => "8B008B",
	"darkolivegreen" => "556B2F",
	"darkorange" => "FF8C00",
	"darkorchid" => "9932CC",
	"darkred" => "8B0000",
	"darksalmon" => "E9967A",
	"darkseagreen" => "8FBC8F",
	"darkslateblue" => "483D8B",
	"darkslategray" => "2F4F4F",
	"darkslategrey" => "2F4F4F",
	"darkturquoise" => "00CED1",
	"darkviolet" => "9400D3",
	"deeppink" => "FF1493",
	"deepskyblue" => "00BFFF",
	"dimgray" => "696969",
	"dimgrey" => "696969",
	"dodgerblue" => "1E90FF",
	"firebrick" => "B22222",
	"floralwhite" => "FFFAF0",
	"forestgreen" => "228B22",
	"fuchsia" => "FF00FF",
	"gainsboro" => "DCDCDC",
	"ghostwhite" => "F8F8FF",
	"gold" => "FFD700",
	"goldenrod" => "DAA520",
	"gray" => "808080",
	"green" => "008000",
	"greenyellow" => "ADFF2F",
	"grey" => "808080",
	"honeydew" => "F0FFF0",
	"hotpink" => "FF69B4",
	"indianred" => "CD5C5C",
	"indigo" => "4B0082",
	"ivory" => "FFFFF0",
	"khaki" => "F0E68C",
	"lavender" => "E6E6FA",
	"lavenderblush" => "FFF0F5",
	"lawngreen" => "7CFC00",
	"lemonchiffon" => "FFFACD",
	"lightblue" => "ADD8E6",
	"lightcoral" => "F08080",
	"lightcyan" => "E0FFFF",
	"lightgoldenrodyellow" => "FAFAD2",
	"lightgray" => "D3D3D3",
	"lightgreen" => "90EE90",
	"lightgrey" => "D3D3D3",
	"lightpink" => "FFB6C1",
	"lightsalmon" => "FFA07A",
	"lightseagreen" => "20B2AA",
	"lightskyblue" => "87CEFA",
	"lightslategray" => "778899",
	"lightslategrey" => "778899",
	"lightsteelblue" => "B0C4DE",
	"lightyellow" => "FFFFE0",
	"lime" => "00FF00",
	"limegreen" => "32CD32",
	"linen" => "FAF0E6",
	"magenta" => "FF00FF",
	"maroon" => "800000",
	"mediumaquamarine" => "66CDAA",
	"mediumblue" => "0000CD",
	"mediumorchid" => "BA55D3",
	"mediumpurple" => "9370DB",
	"mediumseagreen" => "3CB371",
	"mediumslateblue" => "7B68EE",
	"mediumspringgreen" => "00FA9A",
	"mediumturquoise" => "48D1CC",
	"mediumvioletred" => "C71585",
	"midnightblue" => "191970",
	"mintcream" => "F5FFFA",
	"mistyrose" => "FFE4E1",
	"moccasin" => "FFE4B5",
	"navajowhite" => "FFDEAD",
	"navy" => "000080",
	"oldlace" => "FDF5E6",
	"olive" => "808000",
	"olivedrab" => "6B8E23",
	"orange" => "FFA500",
	"orangered" => "FF4500",
	"orchid" => "DA70D6",
	"palegoldenrod" => "EEE8AA",
	"palegreen" => "98FB98",
	"paleturquoise" => "AFEEEE",
	"palevioletred" => "DB7093",
	"papayawhip" => "FFEFD5",
	"peachpuff" => "FFDAB9",
	"peru" => "CD853F",
	"pink" => "FFC0CB",
	"plum" => "DDA0DD",
	"powderblue" => "B0E0E6",
	"purple" => "800080",
	"red" => "FF0000",
	"rosybrown" => "BC8F8F",
	"royalblue" => "4169E1",
	"saddlebrown" => "8B4513",
	"salmon" => "FA8072",
	"sandybrown" => "F4A460",
	"seagreen" => "2E8B57",
	"seashell" => "FFF5EE",
	"sienna" => "A0522D",
	"silver" => "C0C0C0",
	"skyblue" => "87CEEB",
	"slateblue" => "6A5ACD",
	"slategray" => "708090",
	"slategrey" => "708090",
	"snow" => "FFFAFA",
	"springgreen" => "00FF7F",
	"steelblue" => "4682B4",
	"tan" => "D2B48C",
	"teal" => "008080",
	"thistle" => "D8BFD8",
	"tomato" => "FF6347",
	"turquoise" => "40E0D0",
	"violet" => "EE82EE",
	"wheat" => "F5DEB3",
	"white" => "FFFFFF",
	"whitesmoke" => "F5F5F5",
	"yellow" => "FFFF00",
	"yellowgreen" => "9ACD32",
	// multi-colors below here
	// If one of these is selected this will return an array
	// That will be parsed one piece at a time *again* by parseColors
	// For this reason these arrays can be fairly complex
	// Multiple multi-part arrays can be chained into one
	"incept" => "rgb,roygbiv,canada", // This is our inception array containing 3 multi-part colors 
	"roygbiv" => "red,orange,yellow,green,blue,indigo,violet",
	"rgb"	=> "red,green,blue",
	"canada" => "red,white,red"
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
function createSwatch($colorArray, $width, $height)
{

	$w = ( isset( $width ) ? $width : 600 );
	$h = ( isset( $height ) ? $height : 120 );
    $img      = imagecreate($w, $h);
    $colWidth = $w / count($colorArray);
    $x        = 0;
    foreach ($colorArray as $rgb) {
        $color = imagecolorallocate($img, $rgb[0], $rgb[1], $rgb[2]);
        imagefilledrectangle($img, $x, 0, $x + $colWidth, $h, $color);
        $x += $colWidth;
    }
    return imagepng($img);
}



if ($type === 'color') {
    $colorArray = parseColors(strtolower($colors));
} else if ($type === 'gradient') {
    $colorArray = interpolateGradient(parseColors(strtolower($gradient)));
} else if ($type === 'ipsum') {
	$ipsumArr = strtolower(implode(',', array_rand($colornames, rand(2, 25)))); 
	// 1-25 random things returned as a an array of keys to $colornames... imploded
	header("which: " . $ipsumArr);
	$ms = microtime(true); // time with milliseconds
	if ($ms % 2 === 0) { // if the time is even we show a pallete
		$colorArray = parseColors($ipsumArr);
	} else { // otherwise its a gradient
		// yes I know this is cheating but it's fast enough this way that individual requests would differ
		$colorArray = interpolateGradient(parseColors($ipsumArr));
	}
} else { // just give them the instructions
	header("Content-Type: text/plain");
    echo file_get_contents('README.md');
}

if (isset($colorArray)) {
    createSwatch($colorArray, $width, $height);
}



?>