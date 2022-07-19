(function ($) {
  $(document).ready(function ($) {
    $('input[data-input-type]').on('input change', function () {
      var val = $(this).val();
      $(this).prev('.cs-range-value').html(`${val}px`);
      $(this).val(val);
    });
  });
})(jQuery);
