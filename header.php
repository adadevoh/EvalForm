<!doctype html>
<html>
	<head>
		<title>Eval Form</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="vendor/semantic/ui/dist/semantic.css" />
		<link rel="stylesheet" type="text/css" href="CSS/custom.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="vendor/semantic/ui/dist/semantic.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {

			/*$('.ui.form').each(function(){
				var validations = {};
				var form = $(this);
				form.find(':input[data-validate]').each(function() {
					var input = $(this);
					validations[input.prop('name')] = {
						identifier: input.prop('name'),
						rules: [{
							type: input.data('validate'),
							prompt: input.data('prompt')
						}]
					};
				});
				form.form(validations, { inline: false });
			});*/

		$('.ui.form')
  .form({
    name: {
      identifier  : 'EvaluatorFirstName',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter your name'
        }
      ]
    },
    gender: {
      identifier  : 'gender',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please select a gender'
        }
      ]
    },
    username: {
      identifier : 'username',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a username'
        }
      ]
    },
    password: {
      identifier : 'password',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a password'
        },
        {
          type   : 'length[6]',
          prompt : 'Your password must be at least 6 characters'
        }
      ]
    },
    terms: {
      identifier : 'terms',
      rules: [
        {
          type   : 'checked',
          prompt : 'You must agree to the terms and conditions'
        }
      ]
    }
  })
;

		});
		</script>
	</head>
	<body>
		<header>
		</header>

