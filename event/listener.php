<?php
/**
*
* @package Log Connections
* @copyright (c) 2017 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\logconnections\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use david63\logconnections\controller\main_controller;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \david63\logconnections\controller\main_controller */
	protected $indexoutput;

	/**
	* Constructor for listener
	*
	* @param \david63\logconnections\controller\main_controller	$main_controller	Main controller
	*
	* @access public
	*/
	public function __construct(main_controller $main_controller)
	{
		 $this->main_controller = $main_controller;
	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_add_after' 		=> 'log_new_user',
			'core.session_kill_after'	=> 'log_logout',
			'core.login_box_failed' 	=> 'failed_login',
			'core.login_box_redirect'	=> array(
				'login_connect',
				90, // Need to allow this extension to run before any others.
			),
		);
	}

	/**
	* Log the new user
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function log_new_user($event)
	{
		 $this->main_controller->log_new_user($event);
	}

	/**
	* Log the successful connection
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function login_connect($event)
	{
		$this->main_controller->login_connect($event);
	}

	/**
	* Log failed login attempts
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function failed_login($event)
	{
		$this->main_controller->failed_login($event);
	}

	/**
	* Log the user logging out
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function log_logout($event)
	{
		$this->main_controller->log_logout($event);
	}
}
