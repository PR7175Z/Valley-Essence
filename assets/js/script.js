jQuery(function ($) {
    if ($('.blog-slider').length > 0) {
        $(document).ready(function () {

            var blogSplide = new Splide('.blog-slider .splide', {
                perPage: 3,
                perMove: 1,
                arrows: true,
                pagination: false,
                gap: '20px',
            });
            blogSplide.mount();
        });
    }

    
    var $grid = $('.isotope-item-wrapper').isotope({
        itemSelector: '.isotope-item',
        layoutMode: 'fitRows'
    });
    $('.isotope-tabs').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        // use filterFn if matches value
        $grid.isotope({ filter: filterValue });
    });
});