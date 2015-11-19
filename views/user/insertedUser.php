<?php
    include('views/header.php');
?>

<h3>New user inserted</h3>
<ul>
    <?php
        echo '<li>' . $user['name'] . '</li>';
        echo '<li>' . $user['email'] . '</li>';
        echo '<li>' . $user['username'] . '</li>';
        echo '<li>' . $user['password'] . '</li>';
    ?>
</ul>

<h4>Back to userlist</h4>
<form method="get" action="/myMvc_v2/public/users"><input type="submit" value="Go"></form>

<?php
    include('views/footer.php');
?>