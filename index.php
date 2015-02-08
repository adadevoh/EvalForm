<?php 
include_once"header.php";
require 'vendor/autoload.php';

class BaseController{
	protected $app;
	public function __construct(){
		$this->app = \Slim\Slim::getInstance();
	}

}

class Controller extends BaseController{
	protected $message;
	public function __construct(){
		parent::__construct();
		$this->message="";
	}

	public function validate(){
		echo "send() called";

		$Evaluatee['Firstname'] = $this->app->request->params('PBEfirst-name');
		$Evaluatee['Lastname'] = $this->app->request->params('PBElast-name')."<br>";

		$Evaluator['Firstname'] = $this->app->request->params('EvaluatorFirstName');
		$Evaluator['Lastname'] = $this->app->request->params('EvaluatorLastName')."<br>";

		$Evaluation['topic'] = $this->app->request->params('topic')."<br>";
		$Evaluation['author'] = $this->app->request->params('author')."<br>";
		$Evaluation['length'] = $this->app->request->params('length')."<br>";
		$Evaluation['spelling'] = $this->app->request->params('spelling')."<br>";
		$Evaluation['rating'] = $this->app->request->params('rating')."<br>";
		$Evaluation['comments'] = $this->app->request->params('comments')."<br>";

		$this->message = "Person Being Evaluated : ".$Evaluatee['Firstname']." ".$Evaluatee['Lastname'].
					"Evaluator : ".$Evaluator['Firstname']." ".$Evaluator['Lastname'].
					"Is the topic of this paper closely related to this course? : ".$Evaluation['topic'].
					"Did the author have adequate references and were they approximately cited in the paper? : ".$Evaluation['author'].
					"Was the paper an appropriate length to support the points the author intended? : ".$Evaluation['length'].
					"Was the paper free of spelling and grammatical errors? : ".$Evaluation['spelling'].
					"Please assign this paper an evaluation rating : ".$Evaluation['rating'].
					"Comments : ".$Evaluation['comments'];

					echo $this->message;

					//$this->send();

	}

	public function send(){
		$to = "ikoss@fit.edu";
		$to = "tsc.joshua@gmail.com";
		$sublject= "Evaluation Form";
		
		mail($to, $sublject, $this->message);

	}

	public function displayForm(){
		?>
		<div id="main-content" class="ui raised segment">
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

		</div>


		<?php //include_once"footer.php"; ?>

		<?php
	}
}


$app = new \Slim\Slim(array('mode' => 'development',
							'debug' => true
							));

$app->post('/', '\Controller:validate');
$app->get('/', '\Controller:displayForm');
$app->run();

?>

