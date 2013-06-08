<html>
<head>

</head>
<body>
Please click on the link to comfirm
<a href="<?php echo $this->createAbsoluteUrl('/site/confirm?token=' . $user->token); ?>">Click me!</a>
</body>
</html>