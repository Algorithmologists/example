<!doctype html>
<html>
<body>

<?php
echo Form::open(array('url' => 'form/post'));
echo Form::text('username','Username');
echo '<br/>';

echo Form::text('email', 'example@gmail.com');
echo '<br/>';

echo Form::password('password');
echo '<br/>';


echo Form::submit('Click Me!');
echo Form::close();
?>

</body>
</html>