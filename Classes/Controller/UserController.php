<?php
class Tx_ARestWebservice_Controller_UserController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Extbase_Domain_Repository_FrontendUserRepository
	 */
	protected $userRepository;
 
	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
		$this->userRepository = t3lib_div::makeInstance('Tx_Extbase_Domain_Repository_FrontendUserRepository');
	}
 
	/**
	 * List action for this controller. Displays a list of users
	 *
	 * @return string The rendered view
	 */
	public function listAction() {
		$this->view->assign('users', $this->userRepository->findAll());
	}
}
?>
