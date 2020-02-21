
var filterCategory = false;
var defaultCategory = false;
var URLparams = false;
var idCategory = $(".headTitle").attr('id'); // category id;
var URL = window.location; // 'http://localhost/Pinta/less5/filterItem.php';

// // Функция загрузки всего товара выбраной категории, по умолчанию
    function showProducrs (data){
        data = JSON.parse(data);
        console.log (data);
        var out = '';
        for (var key in data){
            out += `<div id="${data[key].id}" class="product-list default">`;
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
                out += '</div>';
        }
        $('.product-list').html(out);
    }
// END ------------------------------

// // Загрузка всего товара выбраной категории, по умолчанию
            $(document).ready();
            let categoryUrl = URL;
            defaultCategory = {'category': categoryUrl};
            ajax ('library/main.php', 'POST', showProducrs, defaultCategory);
// END ------------------------------

// Фильтры цена Range Price
        $(function priсe () {
            $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 50000,
            values: [100, 50000],
            slide: function( event, ui ) 
                {
                    $( "#amount" ).val( "₴" + ui.values[ 0 ] + " - ₴" + ui.values[ 1 ] );
                    let price = {'minRange': ui.values[ 0 ],'maxRange':ui.values[ 1 ],'categoryId': idCategory};
                    ajax ('library/main.php', 'POST', showProducrs, price);        //console.log (price);
                }
            });
            $( "#amount" ).val("₴" + $( "#slider-range").slider( "values", 0 ) +
            " - ₴" + $( "#slider-range" ).slider( "values", 1 ) );
} );
// END ------------------------------

// Фильтр поиск по характеристике продукта
var arr = [];
var charact = '';
var URL1 = window.location.href;
$(".form-check-input").click(function(e){
    e.preventDefault();
    
    let firstCheck = $(this).attr('value');
    let character = {'character': firstCheck,'categoryId': idCategory};
        ajax ('library/main.php', 'POST', showProducrs, character);

    if (jQuery.inArray($(this).attr('id'), arr) == -1) {	//проверяем, что бы не было дублирования
        arr.push($(this).attr('id')); //добавляем элемент в url
        //console.log ('такого элемента еще не было, добавляем в строку url');
    }
    else {
        //console.log ('такой элемент уже есть, его индекс: ', jQuery.inArray($(this).attr('href'), arr));
        arr.splice(jQuery.inArray($(this).attr('id'), arr), 1); //если такой элемент уже есть, то удаляем его из url
    }

    charact = URL1 + arr.join('');
    history.pushState(charact, '', charact);
});
// END ------------------------------

// Обработка пагинации
        var numberOfItems = 15;//$("#loop .default").length; КОЛИЧЕСТВО ПРОДУКТОВ НУЖНО ПОДГРУЗИТЬ
        var limitPerPage = 5;
            $("#loop .list-group:gt("+ (limitPerPage -1 ) +")").hide();

        var totalPages = Math.round(numberOfItems / limitPerPage);
            $(".pagination").append("<li class='page-item disabled'><a class='page-link' href='/page="+ 1 +"'>"+ 1 +"</a></li>");
            for (var i = 2; i <= totalPages; i++){
            $(".pagination").append("<li class='page-item'><a class='page-link' href='/page="+ i +"'>"+ i +"</a></li>");
            }

            $(".pagination li.page-item").on("click", function(e){
                    e.preventDefault();
                // Если уже нажимал на активную кнопку верни false
                if($(this).hasClass("disabled")){
                    return false;
                }else{
                    // Создать ссылку с номером Page и отправить AJAX
                    //var currentPage = 2;
                    var currentPage = $(this).index();
                        $(".pagination li").removeClass("disabled");
                        $(this).addClass("disabled");
                        $("#loop .list-group").hide();
                        //console.log(currentPage);
                    var grandTotal = limitPerPage * currentPage;

                    for (var i = grandTotal - limitPerPage; i < grandTotal; i++){
                        $("#loop .list-group:eq("+ i +")").show();
                    }
                }
            });
// END ------------------------------

// Событие на клик пагинации
let arr1 = [];
let pagination = '';
let URL2 = window.location.href;

$(".page-link").click(function(e){
    e.preventDefault();
        let paginUrl = URL + $(this).attr('href');    
        let pagination = {"pagination": paginUrl};
        ajax ('library/main.php', 'POST', showProducrs, pagination);

        if (jQuery.inArray($(this).attr('href'), arr1) == -1) {	//проверяем, что бы не было дублирования
            arr1.push($(this).attr('href')); //добавляем элемент в url
            //console.log ('такого элемента еще не было, добавляем в строку url');
        }
        else {
            //console.log ('такой элемент уже есть, его индекс: ', jQuery.inArray($(this).attr('href'), arr));
            arr1.splice(jQuery.inArray($(this).attr('href'), arr1), 1); //если такой элемент уже есть, то удаляем его из url
        }
    
        charact = URL2 + arr1.join('');
        history.pushState(charact, '', charact); 

});
// END ------------------------------ ОН не связаны между собой



//------------------------------------------//
//                  TRASH                   //
//------------------------------------------//

// Фильтр поиск по характеристике продукта
// var arr = [];
// var charact = '';
// var URL1 = window.location.href;
// $(".dropdown-item").click(function(e){
//     e.preventDefault();
	
//         var character = {'character': $(this).attr('id'),'categoryId': idCategory};
//             ajax ('library/main.php', 'POST', showProducrs, character);

// 		if (jQuery.inArray($(this).attr('href'), arr) == -1) {	//проверяем, что бы не было дублирования	
// 			arr.push($(this).attr('href'));
// 			console.log ('такого элемента еще не было, добавляем в строку url');
// 		}
		
// 		charact = URL1 + arr.join('');
//         history.pushState(charact, '', charact); 
// });
// END ------------------------------


// Фильтр поиск по характеристике продукта *** НА ЧЕКБОКСАХ ***
        // $(".form-check-input").click(function(e){
        //     e.preventDefault();
        //     let firstCheck = $(this).attr('value');
        //     let character = {'character': firstCheck,'categoryId': idCategory};
        //         ajax ('library/main.php', 'POST', showProducrs, character);
        //         // console.log (character);
        //         var charact = URL + $(this).attr('id');
        //         let locat = window.location.search;
        //         history.pushState(charact, '', charact); 
        //         console.log (locat);
        // });
// END ------------------------------

// Фильтр поиск по характеристике продукта
        // $(".dropdown-item").click(function(e){
        //     e.preventDefault();
        //         var character = {'character': $(this).attr('id'),'categoryId': idCategory};
        //             ajax ('library/main.php', 'POST', showProducrs, character);

        //         var charact = URL + $(this).attr('href'); 
        //         history.pushState(charact, '', charact); 
        //             //console.log (character);
        // });
// END ------------------------------

// $(".page-link").click(function(e){
//     e.preventDefault();
//         var pagin = URL + $(this).attr('href');         
//         // history.pushState(pagination, '', pagination);
//            console.log(pagin);      
// });
//console.log(window.location.pathname);

// Click on Category in left Dropdown
// $("a.dropdown-item").click(function(e){
//     e.preventDefault();
//     var filterCategory = {'category': $(this).attr('id')};  
      
    // var URLparams = false;
    // var URL = window.location;
    // var URLparams =  URL+`/category=`+$(this).attr('id')+'/';       
    // history.pushState({}, '', URLparams);

//     ajax ('library/main.php', 'POST', showProduct, filterCategory);
// });

    //  Событие выборки кол-ва (paginat) / продуктоа мин. и макс. цена (price_range)
// if (idCategory){
//     $("#slider-range" ).ready();
//         var totalPagination = {'totalPagin': idCategory};
//         ajax ('library/main.php', 'POST', function(){}, totalPagination);
// }

// function init (){
//     $.get(
//         "library/main.php",
//         {
//             "action": 1
//         },
//         showProducrs
//     );
// }

