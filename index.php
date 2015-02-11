<?php 
require 'vendor/autoload.php';


class BaseController{
	protected $app;
	public function __construct(){
		$this->app = \Slim\Slim::getInstance();
	}

}

class Controller extends BaseController{
	protected $message;
	protected $confirmation;
	public function __construct(){
		parent::__construct();
		$this->message = "";
		$this->confirmation = "Please complete the form below.";
	}

	//validate each item in array making sure none is an empty string
	public function isEmpty($myArray){

		foreach ($myArray as $key => $value) {
			if($myArray[$key] == ""){
				return true;
			}				
		}
		return false;
	}

	public function validate(){
		$confMsg="info";//confirmation message for user: either info, success, or error

		$Evaluatee = array('Firstname' => $this->app->request->params('PBEfirst-name'),
							'Lastname' => $this->app->request->params('PBElast-name'));


		//$Evaluatee['Firstname'] = ""; //for testing empty form values


		$Evaluator['Firstname'] = $this->app->request->params('EvaluatorFirstName');
		$Evaluator['Lastname'] = $this->app->request->params('EvaluatorLastName');

		$Evaluation['topic'] = $this->app->request->params('topic');
		$Evaluation['author'] = $this->app->request->params('author');
		$Evaluation['length'] = $this->app->request->params('length');
		$Evaluation['spelling'] = $this->app->request->params('spelling');
		$Evaluation['rating'] = $this->app->request->params('rating');
		$Evaluation['comments'] = $this->app->request->params('comments');

		if($this->isEmpty($Evaluatee)){
			$this->confirmation ="Sorry you did not complete the survey. Try again.";
			$confMsg = "error";
			//return false;
		}
		elseif($this->isEmpty($Evaluator)){
			$this->confirmation ="Sorry you did not complete the survey. Try again.";
			$confMsg = "error";
			//return false;
		}
		elseif($this->isEmpty($Evaluation)){
			$this->confirmation ="Sorry you did not complete the survey. Try again.";
			$confMsg = "error";
			//return false;
		}
		else
		{
			$this->confirmation = "Your survey has been completed and successfully sent. Thank you";
			$confMsg = "success";
		

			$this->message = "Person Being Evaluated : ".$Evaluatee['Firstname']." ".$Evaluatee['Lastname']."<br>".
						"Evaluator : ".$Evaluator['Firstname']." ".$Evaluator['Lastname']."<br>".
						"Is the topic of this paper closely related to this course? : ".$Evaluation['topic']."<br>".
						"Did the author have adequate references and were they approximately cited in the paper? : ".$Evaluation['author']."<br>".
						"Was the paper an appropriate length to support the points the author intended? : ".$Evaluation['length']."<br>".
						"Was the paper free of spelling and grammatical errors? : ".$Evaluation['spelling']."<br>".
						"Please assign this paper an evaluation rating : ".$Evaluation['rating']."<br>".
						"Comments : ".$Evaluation['comments'];

			//$this->send();
		}
		$this->app->flashNow($confMsg, $this->confirmation);
		$this->app->render('EvalForm.html');

		//$this->app->redirect('someURL.html'); redirect to url, slim creates new instance of app, so
		//$this->app->flash($confMsg, $this->confirmation); will display 'info' and 'Please complete the form below'

	}

	public function send(){
		$to = "ikoss@fit.edu";
		$to = "tsc.joshua@gmail.com";
		$subject= "Evaluation Form";


		$mail = new \FIT\Mail();
		$mail->subject($subject)->to($to)->from("no-reply-@fit.edu")->body($this->message)->send();

	}

	public function displayForm(){
		// Flash status can be: info, success, error or warning
		// flashNow([status], [message]) -  http://docs.slimframework.com/#Flash-Now
		// or 
		// flash([status], [message]) - http://docs.slimframework.com/#Flash-Next
		$this->app->flashNow('info', $this->confirmation);
		$this->app->render('EvalForm.html');		
	}

	public function test(){
		echo "test called<br>";
	}
}

$app = new \Slim\Slim(array('mode' => 'development',
							'debug' => true,
							'view'=> new \Slim\Views\Twig(),
							'templates.path'=> 'views'
							));

$app->post('/', '\Controller:validate');
$app->get('/', '\Controller:displayForm');
$app->run();

?>
