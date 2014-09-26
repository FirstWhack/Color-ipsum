Color-ipsum
======

##General usage
This script outputs a random color pallette or gradient (that decision is also *seemingly* random) containing random set of colors with a maximum value enforced. You have no choice on these colors this way (see below for manual generation techniques).

Example: http://jhawins.tk/colors.php?ipsum
######Note: optionally set the width and height of the generated image using `w` and `h` (GET).
i.e. http://jhawins.tk/colors.php?ipsum&w=400&h=100


##Other usage
This script generates a [color swatch][1]|[gradient swatch][2] in `gif` format.

A variety of inputs types are supported including  
RGB,
[Hexadecimal][3],
[Shorthand hexadecimal][4],
[many color names][5],
[multi-color names (i.e. "rgb" is the same as input "red,blue,green")][6] 

Due to the way multi-part arrays are parsed (explained on [colors.php line 162-166](https://github.com/Jhawins/Colors/blob/master/colors.php#L162-L166) ) it's possible to chain multi-part colors together as well. So try [colors.php?gradient=incept](http://jhawins.loomhost.com/colors.php?gradient=incept) which returns the 3 existing multi-part arrays. 

##Usage Examples
http://jhawins.tk/colors.php?ipsum&w=400&h=100

http://jhawins.tk/colors.php?gradient=roygbiv,purple

http://jhawins.tk/colors.php?color=red,ffe680,fff,rgb,canada


    






[1]: colors.php#L270-L281
[2]: colors.php#L242-L262
[3]: colors.php#L180-L183
[4]: colors.php#L176-L179
[5]: colors.php#L14-L171
[6]: colors.php#L162-L166
