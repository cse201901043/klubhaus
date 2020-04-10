// $("#login-modal").modal();

$(document).on('ready', function() {

    $(".shop-it-link").click(function(){
        $("#shop-modal").modal();
    });
    $('#Authentication').on('click', "#login", function(){
        $("#login-modal").modal();
    });
    // $("#registration").click(function(){
    $('#Authentication').on('click', "#registration", function(){
        $("#registration-modal").modal();
    });
});

$("#reg-submit").on("click", function (e) {
    e.preventDefault();
    var status = "ok";

    if(!$('#name').val()){
        status = "error";
        $("#Invalid-registration-name").html('<b>You need to tell your name.</b>');
    }else{
        status = "ok";
    	$("#Invalid-registration-name").empty();
    }

    if($('#gender').find('option:selected').text() == "Select"){
        status = "error";
        $("#Invalid-registration-gender").html('<b>You need to tell your gender.</b>');
    }else{
    	$("#Invalid-registration-gender").empty();
    }

    if(!$('#email').val()){
        status = "error";
        $("#Invalid-registration-email").html('<b>You need to tell your email.</b>');
    }else{
    	$("#Invalid-registration-email").empty();
    }

    if(!$('#mobile').val()){
        $("#Invalid-registration-mobile").html('<b>You need to tell your mobile.</b>');
    }else{
    	$("#Invalid-registration-mobile").empty();
    }

    if(!$('#user_password').val()){
        status = "error";
        $("#Invalid-registration-password").html('<b>You need to tell your password.</b>');
    }else{
    	$("#Invalid-registration-password").empty();
        if($('#user_password').val() != $('#confirm').val()){
            status = "error";
            $("#Invalid-registration-confirm").html('<b>Retype Password mis-match.</b>');
        }else{
	    	$("#Invalid-registration-confirm").empty();
	    }
    }
    if(!$('#terms').is(':checked')){
        status = "error";
        $("#Invalid-registration-term").html('<b>You need to read the terms and Condition.</b>');
    }else{
        status = "ok";
    	$("#Invalid-registration-term").empty();
    }


    console.log(status);

    if(status == "ok"){
        $.ajax({
            type: "POST",
            data: $("#registration-form").serialize(),
            url: "/klubhaus/users/add",
            success: function (data) {
                console.log(data);
                $("#registration-modal .modal-header").css({"display":"none",});
                $("#registration-modal .modal-body").html('<b>Congratulations! Hey '+ data['name'] +', You have successfully Register. Check your mail and come back to shop from the best in town</b>');
            },
            error: function () {
                $("#Invalid-registration-label").html('<b>Sorry to say you that Registration Failed.</b>');
            },
            dataType: "json"
        });
    }

});

$(".login-submit").on("click", function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        data: $(this).parent().parent().serialize(),
        url: "/klubhaus/login",
        success: function (data) {
            console.log(data);
            $("#login-modal").modal('hide');
            $("#Authentication").html('<a href="javascript:;" id="logout">Logout</a> | <a href="javascript:;" id="">' + data[0].name + '</a>');
            var length = data[1].length;
            var item_total = 0;
            var order_total = 0;
             $('.sidebar-cart-list').empty();
            for (var i = data[1].length - 1; i >= 0; i--) {
                $('.sidebar-cart-list')
                .append('<div class="sidebar-cart-item" id="'+data[1][i]['cart_id']+'">'
                        +'<div class="quantity">'
                        +'<button class="inc-item"><i class="fa fa-angle-up"></i></button>'
                        +'<input type="text" name="" value="'+data[1][i]['cart_product_quantity']+'" readonly="" class="item-quantity">'
                        +'<button class="dec-item"><i class="fa fa-angle-down"></i></button>'
                        +'</div>'
                        +'<img src="/klubhaus/images/'+data[1][i]['cart_product_image']+'" alt="New Project" class="img img-responsive" >'
                        +'<div class="item-details">'
                        +'<h5 class="text-uppercase">'+data[1][i]['shop_product']['product_sub_category']['sub_category_name']+'</h5>'
                        +'<p>'+data[1][i]['cart_product_name']+'</p>'
                        +'<p>৳  <span class="price">'+data[1][i]['cart_product_unit_price']+'</span></p>'
                        +'</div>'
                        +'<button class="cancel-order">X</button>'
                        +'</div>'
                    );
                
                item_total += data[1][i]['cart_product_quantity'];
                order_total += data[1][i]['cart_product_total_price'];
            }
            $('.item_total').html(item_total);
            $('.order_total').html(order_total);
            $('.step.login .content').slideUp( "slow");

        },
        error: function () {
            $("#Invalid-login-label").html('<b>Email or Password Invalid.</b>');
        },
        dataType: "json"
    });

});


$("#Authentication").on("click",'#logout', function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/klubhaus/logout",
        dataType: "json"
    });

    $("#Authentication").html(
        '<a href="javascript:;" id="login">Sign in</a> | <a href="javascript:;" id="registration">Register</a>'
    );
});

$("#product-sorting").on("change",'#sorting-size', function (e) {
    console.log($("#product-sorting").serialize());
    ajaxSorting()
});

$("#product-sorting").on("change",'#sorting-price', function (e) {
    console.log($("#product-sorting").serialize());
    ajaxSorting()
});

$("#product-sorting").on("change",'#sorting-color', function (e) {
    console.log($("#product-sorting").serialize());
    ajaxSorting()
});

/* Price Slider */
$(function() { 
    $(".slider").slider({ 
        range: true, 
        min: 0, 
        max: 5000, 
        labels: 7, 
        values: [ 0, 5000 ], 
        slide: function( event, ui ) { 
            $('.ui-slider-handle:first').html('<div class="tooltip top slider-tip current-time"><div class="tooltip-arrow"></div><div class="tooltip-inner actual-time">' + ui.values[0] + '</div></div>'); 
            $('.ui-slider-handle:last').html('<div class="tooltip top slider-tip current-time"><div class="tooltip-arrow"></div><div class="tooltip-inner actual-time">' + ui.values[1] + '</div></div>');
            $('#min-price').val(ui.values[0]);
            $('#max-price').val(ui.values[1]);
            ajaxSorting();
        }, 
        change: function(event, ui) {} 
    }) 
});



function ajaxSorting() {
    console.log($("#product-sorting").serialize());
	$.ajax({
        type: "POST",
        data: $("#product-sorting").serialize(),
        url: "/klubhaus/ajax-sorting",
        success: function (products) {
            console.log(products);
            $(".category-products-div").empty();
            var len = products.length;
            $('#productQuantity').html(len);

            for (var i = 0; i < len; i++) {
	            $(".category-products-div").append(
	                "<div class='col-lg-3 col-md-3 col-sm-3 col-xs-12 category-div'>"
	                +"<a href='/klubhaus/women/kamiz/"+products[i]['product_name_slug']+"'>"
	                    +"<img src='/klubhaus/images/"+products[i]['product_featured_image']+"' alt='"+products[i]['product_name']+"' class='img img-responsive category-image'>"
	                        +"</a>"
	                        +"<img src='/klubhaus/images/fav.png' alt='favourite' class='img img-responsive favourite-image'>"
	                        +"<p class='product-type'>"
	                        	+"<a href='/klubhaus/"+products[i]['category_slug']+"/"+products[i]['sub_category_slug']+"/"+products[i]['product_name_slug']+"'>"+products[i]['product_name']+"</a>"
	                        +"</p>"
	                        +"<p class='price'>"+products[i]['product_unit_sale_price']+"</p>"
	                    +"</div>");
	        }

            
        },
        error: function () {
           console.log("error");
        },
        dataType: "json"
    });
}

$("#user_mobile").intlTelInput({
    geoIpLookup: function(callback) {
        $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
            callback(countryCode);
        });
    },
    // allowDropdown: false,
    initialCountry: "auto",
    preferredCountries: ['bd'],
    separateDialCode: true,
    utilsScript: "build/js/utils.js"
});

(function() {
    $('.cart_button').on('click', function() {
        $('.cart_button').toggleClass('closed');
        $('.relative').toggleClass('opened');
    });
    $('.close-nav').on('click', function() {
        $('.cart_button').toggleClass('closed');
        $('.relative').toggleClass('opened');
    });
})();

$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });    

    $(".center").slick({
        autoplay:true,
        autoplaySpeed:2000,
        dots: false,
        infinite: true,
        centerMode: false,
        slidesToShow: 7,
        slidesToScroll: 1,
        variableWidth: true,
        prevArrow: '<img src="/klubhaus/images/left_arrow.png" class="a-left control-c prev slick-prev" >',
        nextArrow: '<img src="/klubhaus/images/right_arrow.png" class="a-right control-c next slick-next" >'
    });


    $(".related-slider").slick({
        autoplay:true,
        autoplaySpeed:2000,
        dots: false,
        infinite: true,
        centerMode: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        variableWidth: true,
        prevArrow: '<img src="/klubhaus/images/left_arrow.png" class="a-left control-c prev slick-prev" >',
        nextArrow: '<img src="/klubhaus/images/right_arrow.png" class="a-right control-c next slick-next" >'
    });
});