<?php

$com = escapeshellcmd('python data.py');
$out = shell_exec($com);
echo $out;
?>