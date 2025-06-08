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
    <div class="form-container sign-in">
    <form method="POST" action="{{ route('masuk') }}">
        @csrf
        <h1>Sign In Barang Second</h1>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        
        <button type="submit">Sign In</button>
    </form>
</div>
            <div class="toggle-panel toggle-right">
               <a href="{{route("register")}}"> <button class="hidden" id="register" src="{{route("register")}}">Sign Up</button></a>
            </div>
       <a href="#">Forget Your Password?</a>
</div>
</body>
</html>
