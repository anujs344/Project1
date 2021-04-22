<a href="front">Go back to main page</a><br>
<form action="register" method="POST">
    @csrf
    <label>Name:<span style="color: red;">*@error('Name'){{$message}}@enderror</span></label>
    <input type="text" name="Name">
    <br>
    <label>Email:<span style="color: red;">*@error('Email'){{$message}}@enderror</span></label>
    <input type="email" name="Email">
    <br>
    <label>Password:<span style="color: red;">*@error('Password'){{$message}}@enderror</span></label>
    <input type="Password" name="Password">
    <br><br>
    <input type="submit">
</form><br><br>
<p>already have an account <a href="login">click here</a> to login </p>
