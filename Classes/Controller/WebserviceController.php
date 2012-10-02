<?php

class Tx_ARestWebservice_Controller_WebserviceController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Extbase_Domain_Repository_FrontendUserRepository
	 */
	protected $userRepository;
        protected $newsRepository;
 
	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
		$this->userRepository = t3lib_div::makeInstance('Tx_Extbase_Domain_Repository_FrontendUserRepository');
                $this->newsRepository = t3lib_div::makeInstance('Tx_ARestWebservice_Domain_Model_TTNews');
	}

        public function indexAction() {

        }

	/**
	 * @return void
	 */
	public function restAction() {

           if ($_SERVER['HTTPS'] != "on") { 
               $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
               header("Location: $url"); 
               exit; 
           } 

                $username = '';
                if ($this->request->hasArgument('username')) {
                   $username = $this->request->getArgument('username');
                }
                $password = '';
                if ($this->request->hasArgument('password')) {
                   $password = $this->request->getArgument('password');
                }
                $this->loginUser($username, $password);

		$users = $this->userRepository->findAll();
                $user = $users[0];
                #$feuserName = $user->getUsername();
     
                $news = $this->$newsRepository->findAll();
                $test = $news[0];
                $testOutput = $test->getTitle();


		$json = array('alive' => array(
				array(
						'StartTime' => '12.08.2012 20:00',
						'Titel' => 'title',
						'Desc' => 'desc1',
				),
				array(
						'StartTime' => '19.08.2012 20:00',
						'Titel' => 'title',
						'Desc' => 'des2',
				)
		)
		);
		return json_encode($json);
	}

        /**
	 * @return void
	 */
	public function loginUser($username, $password){

                $check = FALSE;
                $loginData = array(
                   'username' => $username,
                   'uident_text' => $password,
                   'status' => 'login',
                );
 
                $GLOBALS['TSFE']->fe_user->checkPid = ''; //do not use a particular pid
                $info = $GLOBALS['TSFE']->fe_user->getAuthInfoArray();
                $user = $GLOBALS['TSFE']->fe_user->fetchUserRecord($info['db_user'], $loginData['username']);
 
                if (isset($user) && $user != '') {
                   $authBase = new tx_saltedpasswords_sv1();
                   $ok = $authBase->compareUident($user, $loginData);
                   if ($ok) {
                      //login successfull
                      $GLOBALS['TSFE']->fe_user->createUserSession($user);
                      $check = TRUE;
                   } else {
                      //login failed
                      $check = FALSE;
                   }
                } else {
                   $check = FALSE;
                }
               return $check;
        }
}

?>
