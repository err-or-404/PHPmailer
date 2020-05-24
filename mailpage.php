<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Send Email!</title>
    <style>
    	form {
    		min-height: 500px;
    	}
    </style>
  </head>
  <body>
  	<div class="wrapper flex-column justify-content-between ">	
	    <h1 class="text-center">Sent Email!</h1>
		<form>
		  <div class="form-row align-items-center flex-column col-md-6 m-auto">
		      <label class="sr-only" for="name">Name:</label>
		      <input type="text" class="form-control mb-2" id="name" placeholder="name">
		    
		      <label class="sr-only" for="email">Email:</label>
		      <input type="text" class="form-control mb-2" id="email" placeholder="email">	    
		    
		      <label class="sr-only" for="subject">Subject:</label>
		        <input type="text" class="form-control" id="subject" placeholder="Subject">
		    
		    	<label class="sr-only" for="body">Body:</label>
		        <textarea type="text" class="form-control" id="body" placeholder="body"></textarea>
		    
		      <input type="button" onclick="sendEmail()" class="btn btn-primary mb-2" id="send" value="Submit">
		    </div>
		  </div>
		</form>
	</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>

    		function sendEmail () {
    			let email = $('#email');
    			let name = $('#name');
    			let subject = $('#subject');
    			let body = $('#body');

    			if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(body) && isNotEmpty(subject)){
    				$.ajax({
    					url: 'send.php',
    					type: 'POST',
    					dataType: 'json',
    					data: {
    						'email': email.val(),
    						'name': name.val(),
    						'subject': subject.val(),
    						'body': body.val(),
    				},
    				})
    				.done(function(data) {
    					console.log("success");
    					console.log(data);
    				})
    				.fail(function() {
    					console.log("error");
    				})
    				.always(function() {
    					console.log("complete");
    				});
    				
    			}
    		}


    		function isNotEmpty (caller) {
    			if (caller.val() == '') {
    				caller.css('border', '1px solid red');
    				return false;
    			}else {
    				caller.css('border', '');
    				return true;
    			}
    		}

    </script>
  </body>
</html>