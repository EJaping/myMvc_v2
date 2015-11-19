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

<h4>Do you want to update this user?</h4>
<form method="get" action="<?php echo $user['id']; ?>/update"><input type="submit" value="Update"></form>

<a href="/myMvc_v2/public/users">Back</a>

<?php
    include('views/footer.php');
?>