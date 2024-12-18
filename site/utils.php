<?php
	function Wiki_getType($inputString) {
		$pattern = '/type="([^"]+)"/';

		if (preg_match($pattern, $inputString, $matches)) {
			return $matches[1];
		} else {
			return "";
		}
	}
?>