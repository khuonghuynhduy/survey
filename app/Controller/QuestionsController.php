<?php
App::uses('AppController', 'Controller');

class QuestionsController extends AppController {
    
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');   
    
    public function index() {
        $questions = $this->Question->find('all');
    	$this->set('data', $questions);        
    }
    
    public function send() {
    	$this->autoLayout = false;
    	$result = array();
    	try {
                
    		$post = $this->request->data;
                $this->loadModel('Result');
    		$this->Result->updateAll(
                    array('Result.total_vote' => 'Result.total_vote + 1'),
                    array('Result.id' => $post['answer_id'])
    		);
                
                $this->loadModel('Question');
                $this->Question->updateAll(
                    array('Question.total_vote' => 'Question.total_vote + 1'),
                    array('Question.id' => $post['question_id'])    
                );
                
    		$result = array(
    			'success' => true,
    			'message'   => 'OK'
    		);
    		
    	} catch (Exception $e) {
    		$result = array(
                    'success' => false,
                    'message'   => $e->getMessage()
    		);
    	}
    	echo json_encode($result);
    }
    
    public function view() {
    	$id = $this->request->query['question_id'];
    	if ($id) {
            $data = $this->Question->find('all', array(
                'conditions' => array('Question.id' => $id)
            ));
            if (empty($data)) {
                return $this->redirect(array('action' => 'index'));
            }			
            $this->set('survey', $data);
    	} 
        else {
            return $this->redirect(array('action' => 'index'));
        }
    }
    
}
?>
