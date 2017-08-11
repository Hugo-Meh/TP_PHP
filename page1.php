<?php
$title = "page1";
require_once ('views/page_top.php');
echo "<main>";
echo "<p>le main de la page dans $title</p>";
echo "</main>";
require_once ('views/page_bottom.php');