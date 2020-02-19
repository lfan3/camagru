<?php
$a = 1; /* portée globale */

function test()
{ 
    global $a;
    echo $a; /* portée locale */
}

test();