<?php 
include 'header.php';
require 'bdd.php';

$sqlQuery = "SELECT * FROM `oeuvres` WHERE  `id` = ?";

$oeuvresStatement = connexion()->prepare($sqlQuery);
$oeuvresStatement->execute([$_GET["id"]]);

$oeuvres = $oeuvresStatement->fetchAll();
?>

<main>
    <?php foreach ($oeuvres as $oeuvre) {
        if ($oeuvre['id'] == $_GET["id"]) { 
    ?>    
            <article id="detail-oeuvre">
            <div id="img-oeuvre">
                <img src="<?php echo $oeuvre['image']?>" alt="<?php echo $oeuvre['title']?>">
            </div>
            <div id="contenu-oeuvre">
                <h1><?php echo $oeuvre['title']?></h1>
                <p class="description"><?php echo $oeuvre['artist']?></p>
                <p class="description-complete">
                <?php echo $oeuvre['description']?>
                </p>
            </div>
        </article>
        <?php }} ?>

</main>
<?php include 'footer.php'; ?>

