$(document).ready(function () {
    $('.mdb-select').materialSelect();
    $('.select-wrapper.md-form.md-outline input.select-dropdown').bind('focus blur', function () {
      $(this).closest('.select-outline').find('label').toggleClass('active');
      $(this).closest('.select-outline').find('.caret').toggleClass('active');
    });
  });