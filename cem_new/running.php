<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$playedTime = htmlspecialchars($_GET["playedTime"]);
$videoId = htmlspecialchars($_GET["videoId"]);
fwrite($myfile, $playedTime);
fwrite($myfile, " ");
fwrite($myfile, $videoId);
fclose($myfile);
echo("Success!!");
?>
