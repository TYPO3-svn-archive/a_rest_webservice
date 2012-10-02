<?php
class Tx_ARestWebservice_Domain_Model_TTNews extends Tx_Extbase_DomainObject_AbstractEntity {

                /**
                * @var string
                */
                protected $title;

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
