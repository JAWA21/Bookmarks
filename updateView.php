<?php
$title = $_SESSION['titles'];
$curId = $_SESSION['curId'];

?>


<!DOCTYPE html>
<html>
<head>
	 <link href="http://cdn.jsdelivr.net/foundation/5.0.2/css/foundation.css" rel="stylesheet" media="screen">
	 <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="main.css">

	<title>Edit Post</title>
</head>
<body>
	<p class="back"><a href="index.php?action=read">Back</a></p>
	<form method="POST" action="index.php?action=saveUpdate">
	    <div class="row">
	        <div class="small-4">
	            <div class="row">

				    <div class="large-12 columns">
				      	<label for="update"><h1>Update Title</h1></label>
				      	<textarea id="update" name="update"><? echo $title[0];?></textarea>
				      	<input type="hidden" name="hidId" id="hidId" value="<? echo $curId;?>"></input>
				    </div>

				    <div class="small-3 columns">
	       				<input type="submit" class="button postfix" value="Update">
       				</div>

	            </div> <!--close row -->
	      </div>
	    </div>
	</form>

<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/foundation/5.0.2/js/foundation.min.js"></script>
</body>
</html>