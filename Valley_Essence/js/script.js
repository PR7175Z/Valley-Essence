jQuery(function($){
    $(document).ready(function(){

        var blogSplide = new Splide('.blog-slider .splide',{
            perPage: 3,
            perMove: 1,
            arrows: true,
            pagination: false,
            gap: '20px',
        });
        blogSplide.mount();
    });

});