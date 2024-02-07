import { load } from 'google-fonts-loader';

load({ 'Nunito': ['300', '400', '500', '600', '700'] });

jQuery(document).ready(function ($) {
  $("a[href='nolink']").on("click", function (e) {
    e.preventDefault();
  });

  // Update footer copyright year
  if ($('.current-year').length) {
    $('.current-year').text(new Date().getFullYear());
  }

  $('body').removeClass('overflow-hidden');

});
