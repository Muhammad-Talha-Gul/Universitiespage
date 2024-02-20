<?php
return array(
/** set your paypal credential **/

'client_id' => '',
'secret' => '',
// 'client_id' =>'AW0eNfNB9iQmR5f7SYfm4ZxCZWt2WjblsXDRJzWWpljqd9rbQExI6b9LfHsFYM2ScXI7KnCIDupilTro',
// 'secret' => 'EDfw1KHHkdXRR92DiGaMNqI2IwbWAcYBpz4A1n8v_FK20VgeilbrNcxZD5nVCcKY425LKDs-Mp5wyCQJ',
//EDfw1KHHkdXRR92DiGaMNqI2IwbWAcYBpz4A1n8v_FK20VgeilbrNcxZD5nVCcKY425LKDs-Mp5wyCQJ
/**
* SDK configuration 
*/
'settings' => array(
	/**
	* Available option 'sandbox' or 'live'
	*/
	'mode' => 'sandbox',
	/**
	* Specify the max request time in seconds
	*/
	'http.ConnectionTimeOut' => 1000,
	/**
	* Whether want to log to a file
	*/
	'log.LogEnabled' => true,
	/**
	* Specify the file that want to write on
	*/
	'log.FileName' => storage_path() . '/logs/paypal.log',
	/**
	* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
	*
	* Logging is most verbose in the 'FINE' level and decreases as you
	* proceed towards ERROR
	*/
	'log.LogLevel' => 'FINE'
),
);
?>