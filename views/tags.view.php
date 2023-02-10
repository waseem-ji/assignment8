<?php $base= $_SERVER["REQUEST_URI"];
    $base = explode('?', $base);
    $base = $base[0];
?>
<form action="" method="post">
    <?php foreach ($tags as $tag) : ?>
        
        <input type="submit" name="tag" value = <?= $tag['tag'] ?> >
    <?php endforeach ?>

</form>


<?php 

if($_SERVER['REQUEST_METHOD'] == "POST" )
    
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['tag']))
    {
        // dd($_SERVER["REQUEST_URI"]);
        header("Location: ".$base."?tag=".$_POST['tag']);
        
    }
?>