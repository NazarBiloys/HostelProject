<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
<p class="lead">Повідомлення від: {{   $name }}</p>
<p class="lead">Почта відправника: {{  $email }}</p>
<p class="lead">Повідомелння відправника: {{   $messages }}</p>
</body>
</html>