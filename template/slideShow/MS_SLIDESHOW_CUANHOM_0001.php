<link rel="stylesheet" href="/plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="/plugin/owl-carouse/owl.theme.default.min.css">
<link rel="stylesheet" href="/plugin/animsition/css/animate.css">
<div class="gb-slideshow_cuanhom">
    <div class="gb-slideshow_cuanhom-slide owl-carousel owl-theme"style="float: left;width: 100%;  margin-top: 111px;">
         <?php
            $array = json_decode($rowConfig['slideshow_home'], true);
            foreach ($array as $key => $val) {
                $img = json_decode($val, true);
                if ($img != '') {
                    ?> 
        <div class="item">
            <img src="/images/<?= $img['image']?>" alt="slideshow" class="img-responsive">
        </div>
        <?php                            
              }
          }
        ?>  
    </div>
</div>

<script src="/plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function (){
        $('.gb-slideshow_cuanhom-slide').owlCarousel({
            loop:true,
            margin:0,
            navSpeed:300,
            paginationSpeed: 500,
            nav:true,
            dots: false,
            autoplay: true,
            autoplaySpeed: 2000, 
            autoplayTimeout: 15000,
            rewind: true,
            navText:[],
            items:1
        });
    });
</script>