/**
	 * Try to convert to plaintext
	 *
	 * @access	protected
	 * @param	string	$source
	 * @return	string	Plaintext string
	 * @since	1.5
	 */
	function _decode($source)
	{
		// entity decode
		$trans_tbl = get_html_translation_table(HTML_ENTITIES);
		foreach($trans_tbl as $k => $v) {
			$ttr[$v] = utf8_encode($k);
		}
		$source = strtr($source, $ttr);
		// convert decimal
		$source = preg_replace('/&#(\d+);/m', "utf8_encode(chr(\\1))", $source); // decimal notation
		// convert hex
		$source = preg_replace('/&#x([a-f0-9]+);/mi', "utf8_encode(chr(0x\\1))", $source); // hex notation
		return $source;
	}
