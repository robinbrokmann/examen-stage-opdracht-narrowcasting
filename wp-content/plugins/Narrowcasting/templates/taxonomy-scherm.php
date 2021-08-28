<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>


    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
<div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-keyboard="true">
    <div class='carousel-inner' style="border-radius: 8px;">
        <?php
        $i = 0;
        //haalt de data uit de post
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
                    <div class="text-box" style=" background: rgba(73,72,72,0.23); width: 700px; z-index:100;  border-radius: 10px; position: fixed;  top: 200px; right: 100px;">
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
</div>


</body>
</html>

