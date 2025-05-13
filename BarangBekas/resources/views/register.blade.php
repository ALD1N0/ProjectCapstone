<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset("css/styleku.css")}}">
    <title>Modern Login Page | AsmrProg</title>
</head>
<body>

<div class="container" id="container">
    <div class="form-container sign-up">
         <h1>Create Account</h1>
    <form method="POST" action="{{ route('loginstore') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="alamat" placeholder="Alamat" required>
        <input type="text" name="telepon" placeholder="Telepon" required>
        <input type="file" name="foto" accept="image/*">
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">submit</button>
    </form>
</div>
 <a href="{{route("login")}}"> <button class="hidden" id="login" src="{{route("login")}}">Sign In</button></a>
</body>
</html>
