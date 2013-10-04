<?

function objectToArray($d) {
	if (is_object($d)) {
		$d = get_object_vars($d);
	}
	if (is_array($d)) {
		return array_map(__FUNCTION__, $d);
	} else {
		return $d;
	}
}

function echo_a($arr, $strLabel = false) {
    if ($strLabel) {
        echo "<h2>$strLabel</h2>";
    }
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}


function limitString($string, $limit, $dotdotdot = false) {
    if (strlen($string) > $limit) {
        $string = substr($string, 0, strrpos(substr($string, 0, $limit), ' '));
        $string = strip_tags($string);
        if ($dotdotdot == true) {
            $string = $string . "...";
        }
    }
    return $string;
}

?>