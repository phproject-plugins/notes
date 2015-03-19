<?php
/**
 * A simple private user notes feature
 *
 * @package  Notes
 * @author   Alan Hardman <alan@phpizza.com>
 * @version  0.0.1
 */

namespace Plugin\Notes;

class Base extends \Plugin {

	/**
	 * Initialize the plugin
	 */
	public function _load() {
		$f3 = \Base::instance();

		// Add menu item
		$this->_addNav("", "Notes", null, "user");

		// Add routes
		$f3->route("GET /notes", "Plugin\Notes\Controller->get");
		$f3->route("POST /notes/@action", "Plugin\Notes\Controller->post");
	}

	/**
	 * Install plugin (add database table)
	 */
	public function _install() {
		$f3 = \Base::instance();
		$db = $f3->get("db.instance");
		$install_db = file_get_contents(__DIR__ . "/db/database.sql");
		$db->exec(explode(";", $install_db));
	}

	/**
	 * Check if plugin is installed
	 * @return bool
	 */
	public function _installed() {
		$f3 = \Base::instance();
		$db = $f3->get("db.instance");
		$q = $db->exec("SHOW TABLES LIKE 'user_note'");
		return !!$db->count();
	}

}
