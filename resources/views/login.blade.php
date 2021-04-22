<a href="front">Go back to home page</a><br>
<form action="login" method="POST">
    @csrf
    <label>Email<span style="color: red;">*@error('Email'){{$message}}@enderror</span></label>
    <input type="email" name="Email"><br>

    <label>Password<span style="color: red;">*@error('Password'){{$message}}@enderror</span></label>
    <input type="Password" name="Password"><br>

    <input type="submit"  value="Log-in">
</form><br>
<p>Dont have a account <a href="register">click here</a> to make one</p>
