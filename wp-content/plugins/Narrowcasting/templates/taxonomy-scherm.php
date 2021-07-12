<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>
<body>
<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="10000" data-transitionduration="500">
    <div class='carousel-inner' style="border-radius: 8px;">
<?php
$i=0;
//haalt de data uit de post eerst nog afbeeldingen
while ( have_posts() ) : the_post();
    $content = get_the_content();
    $dom = new DOMDocument;
    if ($dom->loadHTML($content)) {
        $imgs = $dom->getElementsByTagName('img');
        if ($imgs->length > 0) {
            foreach ($imgs as $img) {
                $img->getAttribute('src');
            }
        }
    }
    ?>

    <!--zet de afbeeldingen in een slide. -->


            <?php  foreach ( $imgs as $img): ?>
                <?php if ($i==0) {$set_ = 'active'; } else {$set_ = ''; } ?>
                <div class='carousel-item <?php echo $set_; ?>'>
                    <img src='<?php echo $img->getAttribute('src'); ?>' class='d-block h-100 w-100'>
                </div>
                <?php $i++; endforeach ?>

<?php
endwhile;
?>

    </div>
</div>
</body>
</html>

