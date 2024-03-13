<?php 
include 'header.php'; 
require 'bdd.php';
$db = connexion();
$oeuvres = $db->query('SELECT * FROM oeuvres ORDER BY id ASC')
?>
    <div id="liste-oeuvres">
        <?php foreach ($oeuvres as $oeuvre): ?>
                 
            <article class="oeuvre">
                <a href="oeuvre.php?id=<?php echo $oeuvre['id']?>">
                    <img src="<?php echo $oeuvre['image']?>" alt="<?php echo $oeuvre['title']?>">
                    <h2><?php echo $oeuvre['title']?></h2>
                    <p class="description"><?php echo $oeuvre['artist']?></p>
                </a>
            </article>
        <?php endforeach ?>
    </div>
<?php include 'footer.php';?>