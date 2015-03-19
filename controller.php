<?php

namespace Plugin\Notes;

class Controller extends \Controller {

	protected $userId;

	function __construct() {
		$this->_userId = $this->_requireLogin();
	}

	function get($f3) {
		$note = new \Plugin\Notes\Model\Note;
		$note->load(array("user_id = ?", $f3->get("user.id")));
		$f3->set("note", $note);
		$f3->set("UI", $f3->get("UI") . ";./app/plugin/notes/view/");
		$this->_render("note.html");
	}

	function post($f3, $params) {
		header("Content-type: application/json");
		$note = new \Plugin\Notes\Model\Note;
		$note->load(array("user_id = ?", $f3->get("user.id")));
		// TODO: Save new note content
	}

}
