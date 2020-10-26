jQuery(document).ready(function($) {

  // Load more products
  var count = 0;
  $('.load-products').click(function() {
    count += 4;
    var termData = $(this).attr('term-data');

    var formData = new FormData();
    formData.append('action', 'load_more_products');
    formData.append('number', count);
    if (termData){
      formData.append('terID', termData);
    }

    jQuery.ajax({
      url: variables.ajaxUrl,
      type: 'POST',
      processData: false,
      contentType: false,
      data: formData,
      success: function(data) {
        data = JSON.parse(data);

        if (data.length == 0) {
          $('.section-btn__more').fadeOut(300)
        }

        data.forEach(element => {
          var isNew
          if(element.is_new) {
            isNew = `<div class="single-product__new">New</div>`
          }else{
            isNew = ``
          }

          $('.products-page__list').append(

            `<div class="kind_list__item single-product">
              <a href="${element.url}">
                <div class="single-product__row ">
                  ${isNew}
                </div>
                <div class="single-product__row ">
                  <div class="single-product__image">
                    <img src="${element.image}" alt="">
                  </div>
                </div>
                <div class="single-product__row">
                  <div class="single-product__name">
                    <div class="single-product__name___title">
                    ${element.title}
                    </div>
                    <div class="single-product__name___sub-title">
                      ${element.sub_title}
                    </div>
                  </div>
                  <div class="section-btn single-product__btn">
                    <div class="section-btn__circle ">
                      <div class="section-btn__circle___red"></div>
                      <div class="section-btn__circle___arrow"></div>
                    </div>
                  </div>
                </div>
              </a>
              </div>`
          )
        });


      }
    });
  });

});
