<?php
    include('views/header.php');
?>

<h2>Users</h2>

<div>
    <form method="get" action='users/insert'>
        Insert new user: 
        <input type="submit" value="Go">
    </form>
</div>

<br/>

<table border="1" style="width:90%">
    <tr>
        <th>Username</th>
        <th>Name</th> 
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php
        foreach ($users as $user) {
            
            //$string = 'Name : ' . $user['name'] . ', Username: ' . $user['username'] . ', Email: ' . $user['email'];
            printf('<tr><td>%s</td><td>%s</td><td>%s</td><td>', $user['name'], $user['username'], $user['email']);
            echo '<form method="get" action="users/' . $user['id'] . '"><input type="submit" value="Show"></form>';
            echo '<form method="get" action="users/' . $user['id'] . '/delete"><input type="submit" value="Delete"></form></td></tr>';
        }
    ?>
</table>

<?php
    include('views/footer.php');
?>