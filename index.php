<?php
require("./common.php");

$latest_dps = $sql->getAll("SELECT file,used_by FROM Latest ORDER BY added_on DESC LIMIT 0,10");

render();