<?php

class Question extends AppModel {
	
    public $hasMany = array(
        'Result' => array(
            'className' => 'Result',
            'order' => 'Result.id DESC'
        )
    );
}
