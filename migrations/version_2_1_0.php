<?php
/**
*
* @package Log Connections
* @copyright (c) 2017 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\logconnections\migrations;
use phpbb\db\migration\migration;

class version_2_1_0 extends migration
{
	public function update_data()
	{
		return array(
			array('config.add', array('log_browser', false)),
			array('config.add', array('log_connect_failed', true)),
			array('config.add', array('log_connect_logout', false)),
			array('config.add', array('log_connect_new_user', true)),
			array('config.add', array('log_connect_user', true)),

			// Add the ACP module
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'LOG_CONNECTIONS')),

			array('module.add', array(
				'acp', 'LOG_CONNECTIONS', array(
					'module_basename'	=> '\david63\logconnections\acp\logconnections_module',
					'modes'				=> array('manage'),
				),
			)),
		);
	}
}
