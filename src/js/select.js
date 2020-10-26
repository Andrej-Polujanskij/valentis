import Choices from 'choices.js'
import 'choices.js/public/assets/styles/choices.min.css'

$(document).ready(function($) {

  var multipleCancelButton = new Choices('#country', {
    searchEnabled: false,
    placeholder: true,
    placeholderValue: null,
  });

  var productSelecy = new Choices('#products', {
    searchEnabled: false,
    placeholder: true,
    placeholderValue: null,
  });

  $('#products').on('change', function(){
    $('#filter-form').submit();
  });

});