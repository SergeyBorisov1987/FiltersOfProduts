
var filterCategory = false;
var defaultCategory = false;
var URLparams = false;
var idCategory = $(".headTitle").attr('id'); // category id;

// Загрузка всего товара выбраной категории, по умолчанию
if (filterCategory === false){
    $(document).ready();
    defaultCategory = {'category': idCategory};
    //  console.log (defaultCategory);
    ajax ('library/main.php', 'POST', showDefaultCategory, defaultCategory);
}

// Функция загрузки всего товара выбраной категории, по умолчанию
function showDefaultCategory (defaultCategory){
    data = JSON.parse(defaultCategory);
    //console.log (data);
    var out = '';
    for (var key in data){
        out += '<div class="product-list">';
            out += '<div class="product-up">';
                out += '<div class="product-photo">';
                    out += `<img src="img/${data[key].img_name}" alt="Card image cap">`;
                out += '</div>';
                out += '<div class="product-elements">';
                    out += '<div class="alert alert-primary" role="alert">';
                        out += `<h4 class="prod-name">${data[key].prod_name}</h4>`;
                    out += '</div>';
                        out += `<span class="badge badge-warning"><h4 class="prod-price">${data[key].prod_price} грн.</h4></span>`;
                out += '</div>';
            out += '</div>';

            out += '<div class="product-description">';
                out += `<p>${data[key].prod_description}</p>`;
            out += '</div>';
            out += '</div><hr>';
    }
    $('.product-list').html(out);
}
// END ------------------------------
// Фильтры цена Range Price
$( function priсe () {
    $( "#slider-range" ).slider({
    range: true,
    min: 0,
    max: 50000,
    values: [100, 50000],
    slide: function( event, ui ) {
        $( "#amount" ).val( "₴" + ui.values[ 0 ] + " - ₴" + ui.values[ 1 ] );
        let price = {'minRange': ui.values[ 0 ],'maxRange':ui.values[ 1 ],'categoryId': idCategory};
        ajax ('library/main.php', 'POST', priceRange, price);
        //console.log (price);

// Функция фильтры цена Range Price
        function priceRange (price){
            data = JSON.parse(price);
            //console.log (data);
            var i = 1;
            var out = '';
            for (var key in data){
                out += '<div class="product-list">';
                    out += '<div class="product-up">';
                        out += '<div class="product-photo">';
                            out += `<img src="img/${data[key].img_name}" alt="Card image cap">`;
                        out += '</div>';
                        out += '<div class="product-elements">';
                            out += '<div class="alert alert-primary" role="alert">';
                                out += `<h4 class="prod-name">${data[key].prod_name}</h4>`;
                            out += '</div>';
                                out += `<span class="badge badge-warning"><h4 class="prod-price">${data[key].prod_price} грн.</h4></span>`;
                        out += '</div>';
                    out += '</div>';
        
                    out += '<div class="product-description">';
                        out += `<p>${data[key].prod_description} <b>${i++}</b></p>`;
                    out += '</div>';
                    out += '</div><hr>';
            }
            $('.product-list').html(out);
         }       
    }
    });
    $( "#amount" ).val("₴" + $( "#slider-range").slider( "values", 0 ) +
    " - ₴" + $( "#slider-range" ).slider( "values", 1 ) );
} );
// END ------------------------------
// Фильтр поиск по характеристике продукта
$(".dropdown-item").click(function(e){
    e.preventDefault();
        var character = {'character': $(this).attr('id'),'categoryId': idCategory};
            ajax ('library/main.php', 'POST', showTypeFilter, character);
            //console.log (character);
});
// Функция фильтра поиск по характеристике продукта
function showTypeFilter (character){
    data = JSON.parse(character);
    console.log (data);
    var out = '';
    for (var key in data){
        out += '<div class="product-list">';
            out += '<div class="product-up">';
                out += '<div class="product-photo">';
                    out += `<img src="img/${data[key].img_name}" alt="Card image cap">`;
                out += '</div>';
                out += '<div class="product-elements">';
                    out += '<div class="alert alert-primary" role="alert">';
                        out += `<h4 class="prod-name">${data[key].prod_name}</h4>`;
                    out += '</div>';
                        out += `<span class="badge badge-warning"><h4 class="prod-price">${data[key].prod_price} грн.</h4></span>`;
                out += '</div>';
            out += '</div>';

            out += '<div class="product-description">';
                out += `<p>${data[key].prod_description}</p>`;
            out += '</div>';
            out += '</div><hr>';
    }
    $('.product-list').html(out);
}
// END ------------------------------






// // Обработка пагинации
// $(".page-item").click(function(e){
//     e.preventDefault();
//         var pagination = {'pagination': $(this).text()};
//             ajax ('library/main.php', 'POST', productOut, pagination);
// });

// function productOut(pagination){
//     data = JSON.parse(pagination);
//     console.log (data);
//     var out = '';
//     for (var key in data){
//         out += '<div class="product-list">';
//             out += '<div class="product-up">';
//                 out += '<div class="product-photo">';
//                     out += `<img src="img/${data[key].img_name}" alt="Card image cap">`;
//                 out += '</div>';
//                 out += '<div class="product-elements">';
//                     out += '<div class="alert alert-primary" role="alert">';
//                         out += `<h4 class="prod-name">${data[key].prod_name}</h4>`;
//                     out += '</div>';
//                         out += `<span class="badge badge-warning"><h4 class="prod-price">${data[key].prod_price} грн.</h4></span>`;
//                 out += '</div>';
//             out += '</div>';

//             out += '<div class="product-description">';
//                 out += `<p>${data[key].prod_description}</p>`;
//             out += '</div>';
//             out += '</div><hr>';
//     }
//     $('.product-list').html(out);
// }



// Click on Category in left Dropdown
// $("a.dropdown-item").click(function(e){
//     e.preventDefault();
//     var filterCategory = {'category': $(this).attr('id')};  
      
//     // var URLparams = false;
//     // var URL = window.location;
//     // var URLparams =  URL+`/category=`+$(this).attr('id')+'/';       
//     // history.pushState({}, '', URLparams);

//     ajax ('library/main.php', 'POST', showProduct, filterCategory);
// });