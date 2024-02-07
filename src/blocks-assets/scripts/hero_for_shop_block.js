import '../sass/hero_for_shop_block.scss'
import Swiper from 'swiper';
import { Pagination, Autoplay } from 'swiper/modules';
jQuery(document).ready(function ($) {
    if ($(".tamtam-slider").length) {
        let swiperAutoplayProgress = $('.tamtam-hero-for-shop-block .swiper-autoplay-progress .swiper-autoplay-progress__bar');

        const swiper = new Swiper('.tamtam-hero-for-shop-block .tamtam-slider', {
            // Optional parameters
            modules: [Autoplay, Pagination],
            pagination: {
                el: ".tamtam-hero-for-shop-block .swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 6000,
            },
            loop: true,

            // Swiper events
            on: {
                init: function () {
                    updateProgressBar(this);
                },
                slideChangeTransitionStart: function () {
                    resetProgressBar();
                },
                autoplay: function () {
                    updateProgressBar(this);
                }
            }
        });

        // Function to update the progress bar
        function updateProgressBar(swiper) {
            let interval = swiper.params.autoplay.delay;
            swiperAutoplayProgress.animate({ width: '100%' }, interval, 'linear');
        }

        // Function to reset the progress bar
        function resetProgressBar() {
            swiperAutoplayProgress.stop(true, true).width(0);
        }
    }
});
