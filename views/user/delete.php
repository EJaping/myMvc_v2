<?php
    include('views/header.php');
?>

<h3><?php echo $user['username']; ?></h3>
<ul>
    <?php
        echo '<li>' . $user['name'] . '</li>';
        echo '<li>' . $user['email'] . '</li>';
    ?>
</ul>

<h4>Do you want to delete this user?</h4>
<form method="post"><input type="submit" value="Delete"></form>

<a href="/myMvc_v2/public/users">Back</a>

<?php
    include('views/footer.php');
?>