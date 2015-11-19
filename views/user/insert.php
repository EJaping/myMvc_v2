<?php
    include('views/header.php');
?>
<div class="container">
    
    <form class="form-signin" method="post" id="login">

        <h2 class="form-signin-heading">Insert New User</h2>
        
        <label for="name" class="sr-only">Name</label>
        <input type="text" name="name" id="name" class="form-control" maxlength="25" placeholder="Name" required autofocus/>
        
        <label for="email" class="sr-only">Email</label>
        <input type="email" name="email" id="email" class="form-control" maxlength="25" placeholder="Email" required/>
        
        <label for="username" class="sr-only">Username</label>
        <input type="text" name="username" id="username" class="form-control" maxlength="25" placeholder="Username" required/>
        
        <label for="password" class="sr-only">Password</label>
        <input type="text" name="password" id="password" class="form-control" maxlength="25" placeholder="Password" required/>
        
        <br />
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Insert">Insert</button>

    </form>  

</div>
<?php
    include('views/footer.php');
?>