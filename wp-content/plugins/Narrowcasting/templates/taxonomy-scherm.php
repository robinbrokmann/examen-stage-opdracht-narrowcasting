<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<div id="carousel" class="carousel slide" data-ride="carousel">
    <div class='carousel-inner' style="border-radius: 8px;">
        <?php
        $i = 0;
        //haalt de data uit de post eerst nog afbeeldingen
        while (have_posts()) : the_post();
            $content = get_the_content();
            $text = get_the_content();
            $text = preg_replace("/<img[^>]+\>/i", " ", $text);
            $text = preg_replace("/<iframe[^>]+\>/i", " ", $text);
            $text = apply_filters('the_content', $text);
            $text = str_replace(']]>', ']]>', $text);

            $dom = new DOMDocument;
            if ($dom->loadHTML($content)) {
                $imgs = $dom->getElementsByTagName('img');
            }
            if ($imgs->length > 0) {
                foreach ($imgs as $img) {
                    $img->getAttribute('src');
                }
            }
            ?>

            <!--zet de afbeeldingen en tekst in een slide. -->


            <?php foreach ($imgs as $img):
                if ($i == 0) {
                    $set_ = 'active';
                } else {
                    $set_ = '';
                } ?>
                <div class='carousel-item <?php echo $set_; ?>' style="position: relative;">
                    <img src='<?php echo $img->getAttribute('src'); ?>' class='d-block w-100' style="position: fixed;">
                    <div class="text-box"
                         style=" background: rgba(73,72,72,0.23); width: 700px; z-index:100;  border-radius: 10px; position: fixed;  top: 200px; right: 100px;">
                        <div class="title" style="color: #161616; font-size: 50px; text-align: center; font-family: SansSerif ">
                            <?php echo get_the_title() ?>
                        </div>
                        <div class="text" style="color: #161616; text-align: center; font-family: sans-serif;">
                            <?php echo $text; ?>
                        </div>
                    </div>
                </div>
                <?php $i++; endforeach ?>

        <?php
        endwhile;
        ?>

    </div>
</body>
</html>

