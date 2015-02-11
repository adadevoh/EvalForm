<?php 
include_once"header.php";
require 'vendor/autoload.php';
?>
<div id="main-content" class="ui raised segment" style="z-index: 1000">
	<?php $object = new Controller;
			$object->displayConfirmation();//empty because I created a new instance of controller, need to use current instance ?>
<?php

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
		$this->confirmation = "confirmation test";
	}

	//validate each item in array making sure none is an empty string
	public function isEmpty($myArray){

		foreach ($myArray as $key => $value) {
			if($myArray[$key] == ""){
				return true;
				//echo"true";
			}				
		}

		return false;
		//echo"false";
	}

	public function validate(){

		//$this->displayConfirmation();

		$Evaluatee = array('Firstname' => $this->app->request->params('PBEfirst-name'),
							'Lastname' => $this->app->request->params('PBElast-name'));

		//$Evaluatee['Firstname'] = $this->app->request->params('PBEfirst-name');
		//$Evaluatee['Lastname'] = $this->app->request->params('PBElast-name');

		$Evaluator['Firstname'] = $this->app->request->params('EvaluatorFirstName');
		$Evaluator['Lastname'] = $this->app->request->params('EvaluatorLastName');

		$Evaluation['topic'] = $this->app->request->params('topic');
		$Evaluation['author'] = $this->app->request->params('author');
		$Evaluation['length'] = $this->app->request->params('length');
		$Evaluation['spelling'] = $this->app->request->params('spelling');
		$Evaluation['rating'] = $this->app->request->params('rating');
		$Evaluation['comments'] = $this->app->request->params('comments');

		/*for($i=0; $i<2; $i++){
			if($Evaluatee[$i] == "")
				return false;
		}*/

		/*foreach ($Evaluatee as $name => $value) {
			if($Evaluatee[$name] == "")
				return false;
			# code...
			echo"true";
		}*/
		if($this->isEmpty($Evaluatee)){
			$this->confirmation ="Sorry you did not complete the survey. Try again.";
			//return false;
		}
		if($this->isEmpty($Evaluator)){
			$this->confirmation ="Sorry you did not complete the survey. Try again.";
			//return false;
		}
		if($this->isEmpty($Evaluation)){
			$this->confirmation ="Sorry you did not complete the survey. Try again.";
			//return false;
		}

		$this->message = "Person Being Evaluated : ".$Evaluatee['Firstname']." ".$Evaluatee['Lastname']."<br>".
					"Evaluator : ".$Evaluator['Firstname']." ".$Evaluator['Lastname']."<br>".
					"Is the topic of this paper closely related to this course? : ".$Evaluation['topic']."<br>".
					"Did the author have adequate references and were they approximately cited in the paper? : ".$Evaluation['author']."<br>".
					"Was the paper an appropriate length to support the points the author intended? : ".$Evaluation['length']."<br>".
					"Was the paper free of spelling and grammatical errors? : ".$Evaluation['spelling']."<br>".
					"Please assign this paper an evaluation rating : ".$Evaluation['rating']."<br>".
					"Comments : ".$Evaluation['comments'];

		echo $this->message;

		//$this->send();
		echo $this->confirmation = "Your survey has been completed and successfully sent. Thank you";

		//return true;

	}

	public function send(){
		$to = "ikoss@fit.edu";
		$to = "tsc.joshua@gmail.com";
		$subject= "Evaluation Form";



		$mail = new \FIT\Mail();
		$mail->subject($subject)->to($to)->from("no-reply-@fit.edu")->body($this->message)->send();

	}

	public function displayForm(){
		?>
		
			<form class="ui form" method="post" action="index.php">
				<h4 class="ui dividing header"> Person Being Evaluated</h4>
				<!--<div class="two fields">-->
					<div class="field">
						<label>First Name</label>
						<input type="text" name="PBEfirst-name" placeholder="First Name" value="" data-validate="empty" data-prompt="Please enter name">
						<label>Last Name</label>
						<input type="text" name="PBElast-name" placeholder="Last Name" value="">
					</div>
				<!--</div>-->

				<h4 class="ui dividing header">Evaluator</h4>
				<div class="field">
					<label>First Name</label>
					<input type="text" name="EvaluatorFirstName" placeholder="First Name" value="">
					<label>Last Name</label>
					<input type="text" name="EvaluatorLastName" placeholder="Last Name" value="">
				</div>

				<h4 class="ui dividing header">Evaluation</h4>
				<div clas="field">
					<ol class="ui list">
						<li>
							<label for="alone">Is the topic of this paper closely related to this course?</label>
							<div class="field">
								<div>
									<input type="radio"   name="topic" value="Yes">
									<label>Yes</label>
								</div>
							</div>

							<div class="field">
								<div>
									<input type="radio"  name="topic" value="No">
									<label>No</label>
								</div>
							</div>

						</li>

						<li>
							<label>Did the author have adequate references and were they approximately cited in the paper?</label>
							<div class="field">
								<div>
									<input type="radio"   name="author" value="Yes">
									<label>Yes</label>
								</div>
							</div>

							<div class="field">
								<div>
									<input type="radio"  name="author" value="No">
									<label>No</label>
								</div>
							</div>
						</li>

						<li>
							<label>Was the paper an appropriate length to support the points the author intended?</label>
							<div class="field">
								<div>
									<input type="radio"   name="length" value="Yes">
									<label>Yes</label>
								</div>
							</div>

							<div class="field">
								<div>
									<input type="radio"  name="length" value="No">
									<label>No</label>
								</div>
							</div>
						</li>

						<li>
							<label>Was the paper free of spelling and grammatical errors?</label>
							<div class="field">
								<div>
									<input type="radio"   name="spelling" value="Yes">
									<label>Yes</label>
								</div>
							</div>

							<div class="field">
								<div>
									<input type="radio"  name="spelling" value="No">
									<label>No</label>
								</div>
							</div>
						</li>

						<li>
							<label>Please assign this paper an evaluation rating</label>
							<div class="field">
								<div>
									<input type="radio"   name="rating" value="Yes""No">
									<label>10 (Perfect in every way)</label>
								</div>
							</div>

							<div class="field">
								<div>
									<input type="radio"  name="rating" value=9.5>
									<label>9.5 Superior</label>
								</div>
							</div>
							<div class="field">
								<div>
									<input type="radio"  name="rating" value=9>
									<label>9."No" Excellent</label>
								</div>
							</div>
							<div class="field">
								<div>
									<input type="radio"  name="rating" value=8.5>
									<label>8.5 Very Good</label>
								</div>
							</div>
							<div class="field">
								<div>
									<input type="radio"  name="rating" value=8>
									<label>8."No" Good</label>
								</div>
							</div>
							<div class="field">
								<div>
									<input type="radio"  name="rating" value=7.5>
									<label>7.5 Average</label>
								</div>
							</div>
							<div class="field">
								<div>
									<input type="radio"  name="rating" value=7>
									<label>7."No" Below Average</label>
								</div>
							</div>
							<div class="field">
								<div>
									<input type="radio"  name="rating" value=6.5>
									<label>6.5 Unsatisfactory</label>
								</div>
							</div>
						</li>

					</ol>
				</div>

				<h4 class="ui dividing header">Comments</h4>
				<div class="field">
					<p>
						Please enter your written comments here. You must include at least a couple of
						sentences describing your impressions of the paper and why you game it the ranking
						you did if it differs from 8.5. Do not include your name in this section.
					</p>
				</div>
				<div class="ui divider"></div>
				<div class="field">
					<textarea name="comments"></textarea>
				</div>

				<div class="ui error message"></div>

				<div class="ui blue submit button">Submit</div>
				<div class="ui reset button">Reset</div>
			</form>				

		<?php
	}

	public function displayConfirmation(){
		?>
			<div class="ui positive message"><p><?php echo $this->confirmation; ?></p></div>
		<?php 
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
</div>
<?php //include_once"footer.php"; ?>
