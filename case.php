<!DOCTYPE html>
<head>
	<meta charset=utf-8 />
	<title>骏马留学</title>
	<link href="css/common.css" rel="stylesheet">
	<link href="css/case.css" rel="stylesheet">
	<script src="scripts/jquery.min.js"></script>
	<script src="scripts/handlebars.js"></script>
</head>

<body>

<?php 
	include_once 'partials/header.php';
?>

<script id="cases-template" type="text/x-handlebars-template">
{{#each this}}
<li class="case_li">
	<div class="case_div">
		<span class="name_span">{{name}}</span> <span class="school_span">{{school}}</span> <span class="major_span">{{major}}</span><br/>
		<span class="country_span">留学{{country}}</span><br/>
		<div class="case_school_div">
		<ul>
			{{#each content}}
				<li>{{this}}</li>
			{{/each}}
		</ul>
		</div>
	</div>
</li>
{{/each}}
</script>

<div class="main_content_div">
	<div class="arrows_div">
		<div class="content_wrap">
			<div class="ul_wrap">
				<ul id="case_ul">
				</ul>
			</div>
		</div>
		<a class="left_button" id="left"></a>
		<a class="right_button" id="right"></a>
	</div>
</div>

<?php 
	include_once 'partials/footer.php';
?>

<script src="scripts/case.js"></script>

</body>
