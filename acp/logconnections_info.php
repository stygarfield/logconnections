<?php
/**
*
* @package Log Connections
* @copyright (c) 2017 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\logconnections\acp;

class logconnections_info
{
	function module()
	{
		return array(
			'filename'	=> '\david63\logconnections\acp\logconnections_module',
			'title'		=> 'LOG_CONNECTIONS',
			'modes'		=> array(
				'manage'	=> array('title' => 'MANAGE_DEFAULTS', 'auth' => 'ext_david63/logconnections && acl_a_user', 'cat' => array('LOG_CONNECTIONS')),
			),
		);
	}
}
