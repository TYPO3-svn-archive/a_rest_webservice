<?php
class Tx_ARestWebservice_Domain_Model_TTNews extends Tx_Extbase_DomainObject_AbstractEntity {

                /**
                * @var string
                */
                protected $title;

                /**
                * __construct
                *
                * @return void
                */
                public function __construct() {
                               //Do not remove the next line: It would break the functionality
                               $this->initStorageObjects();
                }

                /**
                * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
                *
                * @return void
                */
                protected function initStorageObjects() {

                }

                /**
                * Sets the title
                *
                * @param string $title
                * @return void
                * @api
                */
                public function setTitle($title) {
                               $this->title = $title;
                }

                /**
                * Returns the title value
                *
                * @return string
                * @api
                */
                public function getTitle() {
                               return $this->title;
                } 
}
?>
