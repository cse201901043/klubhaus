//Product searching via ajax

function ajaxSorting() {

    $.ajax({

        type: "POST",

        data: $("#product-sorting").serialize(),

        url: url+"ajax-sorting",

        success: function(products) {
            console.log(products);

            $(".Pagination").empty();

            $(".category-products-div").empty();

            var len = products.length;

            $('#productQuantity').html(len);



            for (var i = 0; i < len; i++) {

                if(products[i]['product_name'].length > 26)

                {

                    var product_name = products[i]['product_name'].substring(0,26)+'...';

                }else{

                    var product_name = products[i]['product_name'];

                }

                $(".category-products-div").append("<div class='col-lg-3 col-md-3 col-sm-3 col-xs-12 category-div'>" + "<a href='" + url + products[i]['category_slug'] + "/" + products[i]['sub_category_slug'] + "/" + products[i]['product_name_slug'] + "'>" + "</a>" + "<p class='product-type'>" + "<a href='" + url + products[i]['category_slug'] + "/" + products[i]['sub_category_slug'] + "/" + products[i]['product_name_slug'] + "'>" + product_name + "</a>" + "</p>" + "<p class='price'>" + products[i]['product_unit_sale_price'] + "</p>" + "</div>").fadeIn(5000);

            }



        },

        error: function() {

            console.log("error");

        },

        dataType: "json"

    });

}



//Authentication via ajax

function ajaxAuth(data) {

    $.ajax({

            type: "POST",

            data: data,

            url: url+"/login",

            success: function(data) {

                console.log(data);
                
                if(data[2]==1){

                    $("#login-modal").modal('hide');
    
                    $("#Authentication").html('<a href="javascript:;" id="logout">Logout</a> | <a href="'+url+'/my-account" id="">My Account</a> | <a href="'+url+'/find-store" id="registration">Find a Store</a>');
    
                    var length = data[1].length;
    
                    var item_total = 0;
    
                    var order_total = 0;
    
                    $('.sidebar-cart-list').empty();
    
                    for (var i = data[1].length - 1; i >= 0; i--) {
    
                        $('.sidebar-cart-list')
    
                            .append('<div class="sidebar-cart-item" id="' + data[1][i]['cart_id'] + '">' + '<div class="quantity">' + '<button class="inc-item"><i class="fa fa-angle-up"></i></button>' + '<input type="text" name="" value="' + data[1][i]['cart_product_quantity'] + '" readonly="" class="item-quantity">' + '<button class="dec-item"><i class="fa fa-angle-down"></i></button>' + '</div>' + '<img src="'+url+'/productImage/productImage/' + data[1][i]['cart_product_image'] + '" alt="New Project" class="img img-responsive" >' + '<div class="item-details">' + '<h5 class="text-uppercase">' + data[1][i]['shop_product']['product_sub_category']['sub_category_name'] + '</h5>' + '<p>' + data[1][i]['cart_product_name'] + '</p>' + '<p>৳  <span class="price">' + data[1][i]['cart_product_unit_price'] + '</span></p>' + '</div>' + '<button class="cancel-order">X</button>' + '</div>');
    
    
    
                        item_total += data[1][i]['cart_product_quantity'];
    
                        order_total += data[1][i]['cart_product_total_price'];
    
                    }
    
                    $('.item_total').html(item_total);
    
                    $('.order_total').html(order_total);
    
                    $('.step.login .content').slideUp("slow");
                    step = 1;
    
                    $('.step.address .content').slideDown("slow");
    
                    swal({
    
                        title: "Welcome!",
    
                        text: "Happy to have you here!",
    
                        type: "success",
    
                        showConfirmButton: false,
    
                        timer: 3000
    
                    });
                    
                    // location.reload();
                }else{
                    $(".Invalid-login-label").html('<b>Email or Password Invalid.</b>');
                }

            },

            error: function() {

                $(".Invalid-login-label").html('<b>Email or Password Invalid.</b>');

            },

            dataType: "json"

        });

}



$(document).on('ready', function() {



    $('[data-toggle="tooltip"]').tooltip();



    //Modal Action

    $(".shop-it-link").click(function() {

        var sub_cat_id = $(this).data('subcat-id');

        var product_id = $(this).data('product-id');



        $.ajax({

            type: "POST",

            data: {sub_cat_id:sub_cat_id, product_id:product_id},

            url: url+"/ajax-instagram",

            success: function(products) {

                console.log(products);

                $("#shop-modal").modal();

                $('#shop-modal .modal-body > .row > .category-div > img.modal-category-image').remove();

                $('#shop-modal .modal-body > .row > .category-div').prepend('<img src="'+url+'/productImage/InstaGram/'+products[0]['product_featured_image']+'" alt="'+products[0]['product_name']+'" class="img img-responsive modal-category-image" >');



                $('#shop-modal .modal-body > .row > .products-div > .row').empty();

                var counter = 0;

                for (var i = products[1].length - 1; i >= 0; i--) {

                    $('#shop-modal .modal-body > .row > .products-div > .row').append('<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 category-div">'

                        +'<a href="'+url+'/'+products[1][i]['product_category']['category_slug']+'/'+products[1][i]['product_sub_category']['sub_category_slug']+'/'+products[1][i]['product_name_slug']+'"> <img src="'+url+'/productImage/productImage/'+products[1][i]['product_featured_image']+'" alt="New Project" class="img img-responsive modal-category-images" ></a>'

                        +'<p class="product-type">'

                            +'<a href="'+url+'/'+products[1][i]['product_category']['category_slug']+'/'+products[1][i]['product_sub_category']['sub_category_slug']+'/'+products[1][i]['product_name_slug']+'">'+products[1][i]['product_name']+'</a>'

                        +'</p>'

                        +'<p class="price text-center">৳ '+products[1][i]['product_unit_sale_price']+'</p>'

                    +'</div>');

                    counter++;

                }

                $('#instaModalImage').html(counter);

            },

            error: function() {

                console.log("error");

            },

            dataType: "json"

        });



    });

    $('#Authentication').on('click', "#login", function() {

        $("#login-modal").modal();

    });

    $('#Authentication').on('click', "#registration", function() {

        $("#registration-modal").modal();

    });

    $('.reg-modal').on('click', function(e) {

        e.preventDefault();

        $("#login-modal").modal('hide');

        // Set a timeout to hide the element again

        setTimeout(function(){

            $("#registration-modal").modal('show');

        }, 500);

    });



    //Ajax Registration

    $("#registration-form").on("submit", function(e) {

        e.preventDefault();

        var status = "ok";

        if (!$('#name').val()) {
            status = "error";
            $("#Invalid-registration-name").html('<b>You need to tell your name.</b>');
        }else{
            $("#Invalid-registration-name").empty();
        }
        
        if ($('#gender').find('option:selected').text() == "Select") {
            status = "error";
            $("#Invalid-registration-gender").html('<b>You need to tell your gender.</b>');
        }else{
            $("#Invalid-registration-gender").empty();
        }

        if (!$('#email').val()) {
            status = "error";
            $("#Invalid-registration-email").html('<b>You need to tell your email.</b>');
        }else{
            $("#Invalid-registration-email").empty();
        }

        if (!$('#mobile').val()) {
            $("#Invalid-registration-mobile").html('<b>You need to tell your mobile.</b>');
        }else{
            $("#Invalid-registration-mobile").empty();
        }

        if (!$('#user_password').val()) {
            status = "error";
            $("#Invalid-registration-password").html('<b>You need to tell your password.</b>');
        } else {
            $("#Invalid-registration-password").empty();
            if ($('#user_password').val() != $('#confirm').val()) {
                status = "error";
                $("#Invalid-registration-confirm").html('<b>Retype Password mis-match.</b>');
            }else{
                $("#Invalid-registration-confirm").empty();
            }
        }

        if (!$('#terms').is(':checked')) {
            status = "error";
            $("#Invalid-registration-term").html('<b>You need to read the terms and Condition.</b>');
        }else{
            $("#Invalid-registration-term").empty();
        }


        if (status == "ok") {

            $.ajax({
                type: "POST",
                data: $("#registration-form").serialize(),
                url: url+"/users/add",
                success: function(data) {
                    if(data[1] == 1){
                        $("#Invalid-registration-label").html('<b>Email Already Exist.</b>');
                    }
                    else if(data[1] == 2){
                        $("#Invalid-registration-label").html('<b>Mobile Number Already Exist.</b>');
                    }
                    else{
                        $("#registration-modal .modal-header").css({
                            "display": "none",
                        });

                        $("#registration-modal").modal('hide');

                        swal({

                            title: "Congratulations!",

                            text: "You have successfully Register. Check your mail and come back to shop.",

                            type: "success",

                            showConfirmButton: true,

                            button: "Close",

                        });

                        $('#registration-form').trigger("reset");
                    }

                },

                error: function() {

                    $("#Invalid-registration-label").html('<b>Registration Failed.</b>');

                },

                dataType: "json"

            });

        }



    });



    //Ajax Login

    $(".login-form").on("submit", function(e) {

        e.preventDefault();

        ajaxAuth($('.login-form').serialize());

    });

    $(".login-submit").on("click", function(e) {

        e.preventDefault();

        ajaxAuth($('.login-form').serialize());

    });

    $(".login-form-checkout").on("submit", function(e) {

        e.preventDefault();

        ajaxAuth($('.login-form-checkout').serialize());

    });

    $(".login-submit-checkout").on("click", function(e) {

        e.preventDefault();

        ajaxAuth($('.login-form-checkout').serialize());

    });





    //Ajax Logout

    $("#Authentication").on("click", '#logout', function(e) {

        e.preventDefault();

        $.ajax({

            type: "POST",

            url: url+"logout",

            dataType: "json",

            success: function(products) {

                $("#Authentication").html(
        
                    '<a href="javascript:;" id="login">Sign in</a> | <a href="javascript:;" id="registration">Register</a> | <a href="'+url+'/find-store" id="registration">Find a Store</a>'
        
                );
        
        
        
                swal({
        
                    title: "Logged out!",
        
                    text: "Come back soon we are waiting fo you.",
        
                    type: "success",
        
                    showConfirmButton: false,
        
                    timer: 5000
        
                });
        
                location.reload();

            },

            error: function() {

                console.log('error');

            },

        });


    });



    //Product Filtering by Size Color Price

    $("#product-sorting").on("change", '#sorting-size', function(e) {

        ajaxSorting()

    });

    $("#product-sorting").on("change", '#sorting-price', function(e) {

        ajaxSorting()

    });

    $("#product-sorting").on("change", '#sorting-color', function(e) {

        ajaxSorting()

    });



    /* Price Slider */

    $(".price-slider").slider({

        range: true,

        min: 0,

        max: 5000,

        step: 50,

        labels: 7,

        values: [0, 5000],

        slide: function(event, ui) {

            $('.ui-slider-handle:first').html('<div class="tooltip top slider-tip current-time"><div class="tooltip-arrow"></div><div class="tooltip-inner actual-time">' + ui.values[0] + '</div></div>');

            $('.ui-slider-handle:last').html('<div class="tooltip top slider-tip current-time"><div class="tooltip-arrow"></div><div class="tooltip-inner actual-time">' + ui.values[1] + '</div></div>');

            $('#min-price').val(ui.values[0]);

            $('#max-price').val(ui.values[1]);

        },

        stop: function(event, ui) {

            ajaxSorting();

        }

    });



    //Mobile Number initials by Country

    // $("#user_mobile").intlTelInput({

    //     geoIpLookup: function(callback) {

    //         $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {

    //             var countryCode = (resp && resp.country) ? resp.country : "";

    //             callback(countryCode);

    //         });

    //     },

    //     // allowDropdown: false,

    //     initialCountry: "auto",

    //     preferredCountries: ['bd'],

    //     separateDialCode: true,

    //     utilsScript: "build/js/utils.js"

    // });



    //Cart Button Action

    $('.cart_button').on('click', function() {

        $('.cart_button').toggleClass('closed');

        $('.relative').toggleClass('opened');

    });

    $('.close-nav').on('click', function() {

        $('.cart_button').toggleClass('closed');

        $('.relative').toggleClass('opened');

    });



    //Confirm order Payment information

    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {

        e.preventDefault();

        $(this).siblings('a.active').removeClass("active");

        $(this).addClass("active");

        var index = $(this).index();

        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");

        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");

    });



    //Home Page Product Slider

    $(".center").slick({

        autoplay: true,

        autoplaySpeed: 3500,

        dots: false,

        infinite: true,

        centerMode: false,

        slidesToShow: 4,

        slidesToScroll: 1,

        variableWidth: true,

        prevArrow: '<img src="'+url+'/productImage/left_arrow.png" class="a-left control-c prev slick-prev" >',

        nextArrow: '<img src="'+url+'/productImage/right_arrow.png" class="a-right control-c next slick-next" >'
    });



    //Product Details page Related Product Slider

    $(".related-slider").slick({

        autoplay: true,

        autoplaySpeed: 2000,

        dots: false,

        infinite: true,

        centerMode: false,

        slidesToShow: 4,

        slidesToScroll: 1,

        variableWidth: true,

        prevArrow: '<img src="'+url+'/productImage/left_arrow.png" class="a-left control-c prev slick-prev" >',

        nextArrow: '<img src="'+url+'/productImage/right_arrow.png" class="a-right control-c next slick-next" >'

    });



    //Home Slider

    $(".home-slider").slick({

        autoplay: true,

        autoplaySpeed: 3500,

        dots: false,

        infinite: true,

        centerMode: false,

        slidesToShow: 1,

        slidesToScroll: 1,

        variableWidth: true,

        arrows: false,

    });



    // FAQ and Returns & Exchange page Accordion 

    $(".box").click(function() {

        $(this).next().slideToggle("fast");

        $(this).find('i').toggle();

    });

    $('body').on('click', ".checkout", function(e) {

        var order_total = parseInt($('.order_total').html());
        if(order_total == 0){
             swal({
                title: "Opps sorry!",
                text: "You need to add some items in bag to visit checkout",
                type: "info",
                showConfirmButton: true,
                button : "Close",
            });
        }else{
            window.location = url+"checkout"; 
        }
    });

    

});