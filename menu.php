 <ul class="menu">
    <li><a href="index.php">Home</a></li>
    <li><a href="about.php">A propos</a></li>
    <li><a href="events.php">Evenement</a></li>
    <li><a href="blog.php">Blog</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="inscription.php">Inscription</a></li>
    <?php
        if(!isset($_SESSION['pseudo']))
        {
            echo '<li><a  href="/login.php">Login</a></li>';
        }
        if(isset($_SESSION['pseudo']))
        {
            echo '<li><a  href="/logout.php">Sign-out</a></li>';
        }
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
        {
            echo '<li class="name">Hi there ' . $_SESSION['pseudo'].'</li>';
        }
    ?>
</ul>
