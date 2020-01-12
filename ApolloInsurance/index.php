<!doctype html>
<head>
<link rel="stylesheet" type="text/css" href="css/appolo_munich.css"/>
<title>Apollo Munich Insurance</title>
</head>
<?php
include_once("libraries/ApolloMunich.php");
$insurance=new \FakeInsurance\InsuranceClass\ApolloMunich();
?>
<body>
<!-- Page 1 -->
<?php echo $insurance->getHeader(); ?>
<br>
<div class='body_content'>
<?php echo $insurance->getPageOne(); ?>
</div>
<br>
<?php echo $insurance->getFooter(); ?>

<!-- Page 2 -->
<?php echo $insurance->getHeader(); ?>
<br>
<div class='body_content'>
<?php echo $insurance->getPageTwo(); ?>
</div>
<br>
<?php echo $insurance->getFooter(); ?>

<!-- Page 3 -->
<?php echo $insurance->getHeader(); ?>
<br>
<div class='body_content'>
<?php echo $insurance->getPageThree(); ?>
</div>
<br>
<?php echo $insurance->getFooter(); ?>

<!-- Page 4 -->
<?php echo $insurance->getHeader(); ?>
<br>
<div class='body_content'>
<?php echo $insurance->getPageFour(); ?>
</div>
<br>
<?php echo $insurance->getFooter(); ?>

</body>
</html>