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
	public function validate(){
		//$app = static::$slim;
		//$app = \Slim\Slim::getInstance();
		echo "send() called";
		//echo $this->app->request->params('topic')."<br>";
		//echo $this->app->request->params('test')."<br>";

		echo $Evaluatee['Firstname'] = $this->app->request->params('PBEfirst-name')."<br>";
		echo $Evaluatee['Lastname'] = $this->app->request->params('PBElast-name')."<br>";

		echo $Evaluator['Firstname'] = $this->app->request->params('EvaluatorFirstName')."<br>";
		echo $Evaluator['Lastname'] = $this->app->request->params('EvaluatorLastName')."<br>";

		echo $Evaluation['topic'] = $this->app->request->params('topic')."<br>";
		echo $Evaluation['author'] = $this->app->request->params('author')."<br>";
		echo $Evaluation['length'] = $this->app->request->params('length')."<br>";
		echo $Evaluation['spelling'] = $this->app->request->params('spelling')."<br>";
		echo $Evaluation['rating'] = $this->app->request->params('rating')."<br>";
		echo $Evaluation['comments'] = $this->app->request->params('comments')."<br>";

	}

	public function send(){


	}

	public function displayForm(){
		?>
		<div class="main-content" style="padding-left: 5em; padding-top:0; width:40%;">
			<form class="ui form" method="post" action="index.php">
				<h4 class="ui dividing header"> Person Being Evaluated</h4>
				<!--<div class="two fields">-->
					<div class="field">
						<label>First Name</label>
						<input type="text" name="PBEfirst-name" placeholder="First Name" value="" data-validate="empty" data-prompt="Please enter name">
						<label>Last Name</label>
						<input type="text" name="PBElast-name" placeholder="Last Name">
					</div>
				<!--</div>-->

				<h4 class="ui dividing header">Evaluator</h4>
				<div class="field">
					<label>First Name</label>
					<input type="text" name="EvaluatorFirstName" placeholder="First Name">
					<label>Last Name</label>
					<input type="text" name="EvaluatorLastName" placeholder="Last Name">
				</div>

				<h4 class="ui dividing header">Evaluation</h4>
				<div clas="field">
					<ol class="ui list">
						<li>
							<label for="alone">Is the topic of thisn paper closely related to this course</label>
							<div class="field">
								<div>
									<input type="radio"   name="topic" value=1>
									<label>Yes</label>
								</div>
							</div>

							<div class="field">
								<div>
									<input type="radio"  name="topic" value=0>
									<label>No</label>
								</div>
							</div>

						</li>

						<li>
							<label>Did the author have adequate references and were they approximately cited in the paper?</label>
							<div class="field">
								<div>
									<input type="radio"   name="author" value=1>
									<label>Yes</label>
								</div>
							</div>

							<div class="field">
								<div>
									<input type="radio"  name="author" value=0>
									<label>No</label>
								</div>
							</div>
						</li>

						<li>
							<label>Was the paper an appropriate length to support the points the author intended?</label>
							<div class="field">
								<div>
									<input type="radio"   name="length" value=1>
									<label>Yes</label>
								</div>
							</div>

							<div class="field">
								<div>
									<input type="radio"  name="length" value=0>
									<label>No</label>
								</div>
							</div>
						</li>

						<li>
							<label>Was the paper free of spelling and grammatical errors?</label>
							<div class="field">
								<div>
									<input type="radio"   name="spelling" value=1>
									<label>Yes</label>
								</div>
							</div>

							<div class="field">
								<div>
									<input type="radio"  name="spelling" value=0>
									<label>No</label>
								</div>
							</div>
						</li>

						<li>
							<label>Please assign this paper an evaluation rating</label>
							<div class="field">
								<div>
									<input type="radio"   name="rating" value=10>
									<label>10(Perfect in every way)</label>
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
									<label>9.0 Excellent</label>
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
									<label>8.0 Good</label>
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
									<label>7.0 Below Average</label>
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
				<!--<input type="text" class="ui reply form">-->
				<div class="field">
					<p>
						Please enter your written comments here. You must include at least a couple of
						sentences describing your impressions of the paper and why you game it the ranking
						you did if it differs from 8.5. Do not include your name in this section.
					</p>
				</div>
				<div class="ui divider"></div>
				<div class="field">
					<textarea name="comments" data-validate="" data-prompt=""></textarea><!-----------ATTENTION -->
				</div>

				<div class="field">
					<input type="submit" class= "ui submit button" value="send">
					
				</div><button type="reset" class="ui submit button" value="reset"></button>
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

