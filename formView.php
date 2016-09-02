<?php
$stmt = $_SESSION['urls'];
$title = $_SESSION['titles'];
$ids = $_SESSION['ids'];

//var_dump($stmt);

$count=sizeof($stmt);

?>

<!DOCTYPE html>
<html>
<head>
	 <link href="http://cdn.jsdelivr.net/foundation/5.0.2/css/foundation.css" rel="stylesheet" media="screen">
	 <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="main.css">
	<title>Practical Links</title>
</head>
<body>
<header>
	<div class="large-12 columns">
		<h1>Practical Links</h1>
	</div>
</header>

<div class="large-10 columns posts">
	<ul class="entries">
	<?php
		for($i=0; $i<$count;$i++){
			?> <h3> <? echo $title[$i]; ?></h3><?
			echo $stmt[$i];?>
			<span><a href="?action=update&id=<?echo $ids[$i];?>">Update</a></span>

			<span><a href="?action=delete&id=<?echo $ids[$i];?>">Delete</a></span>
			<div class="last"><hr /></div>
		<?}?>
	</ul>
</div>

	<div class="large-12 columns posts">
		<form method="POST" action="index.php?action=create" class="posts">
		    <div class="small-5">
		        <div class="row">
				    <div class="large-12 columns">
				      	<label for="url"><h3>Add URL</h3></label>
				      	<input id="url" name="url" placeholder="Entry text here..."></input>
				    </div>
				     <div class="large-12 columns">
				      	<label for="urlTitle"><h3>Add URL Title</h3></label>
				      	<input id="urlTitle" name="urlTitle" placeholder="Entry text here..."></input>
				    </div>

				    <div class="small-3 columns">
		   				<input type="submit" class="button postfix" value="Submit">
					</div>
		       
		  		</div>
			</div>
		</form>
	</div>
</body>
</html>