<!DOCTYPE html>
<html>
<head>
    <title>User Profile </title>
</head>
<body>
    <h1>Session Data</h1>

    @if(isset($userName) && isset($userEmail))
        <p>Name: {{ $userName }}</p>
        <p>Email: {{ $userEmail }}</p>
    @else
        <p>User not found</p>
    @endif
</body>
</html>
