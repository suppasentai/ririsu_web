<html>
<head>
    <title>Activation Email - RIRISU</title>
</head>
<body>
    <p>
        Welcome {{$user->name}} has registered as a member at Ririsu.com. Please click on the following link to complete the registration.
        <br>
        <a href="{{ $user->activation_link }}">Activate my account</a>
    </p>
</body>
</html>