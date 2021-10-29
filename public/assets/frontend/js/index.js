$(function () {
    "use strict";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })


    $(document).on('click', '.add-cart-btn', function () {
        event.preventDefault()

        $.ajax({
            url: $(this).attr('href'),
            method: 'post',
            data: {slug: $(this).data('slug')},
            success: function (response) {
                if (response.status) {
                    toastr.success(response.message)
                    $('.cart-count').html(response.cart_count)
                }
            },
            error: function (error) {
                toastr.error(error.error)
            }
        });
    });


    $(document).on('click', '.dropdown-cart-products', function () {
        event.preventDefault()

        $.ajax({
            url: $(this).attr('href'),
            success: function (response) {
                $('.dropdown-cart-products').html(response)
            }
        });
    });


    $(document).on('click', '.btn-remove', function () {
        event.preventDefault()

        $.ajax({
            url: $(this).attr('href'),
            success: function (response) {
                $('').html(response.cart_count)
            }
        });
    });


    $(document).on('change', '.product-limit', function () {
        fetch_data();
    });

    $(document).on('change', '.sortby', function () {
        fetch_data();
    });

    $(document).on('click', '.filter-categorywise input', function () {
        fetch_data()
    });

    $(document).on('click', '#filter-brandwise .filter-item input[type="checkbox"]', function () {
        fetch_data()
    });

    $(document).on('change','.noUi-handle-upper', function (){
        console.log($(this).attr('aria-valuenow'))
    });

    /*$(document).on('change', '#price-slider', function () {
        fetch_data()
    });*/


    function fetch_data(){
        let sortby = $('.sortby').val()
        let limit = $('.product-limit').val()
        let min_price = $('.min_price').val()
        let max_price = $('.max_price').val()
        let url = $('.frontend-products').data('url')

        let filterCategorywise = []
        $('.category-single-item').each(function (){
            if(this.checked){
                filterCategorywise.push($(this).val())
            }
        })

        let filterBrandwise = []
        $('.brand-single-item').each(function (){
            if(this.checked){
                filterBrandwise.push($(this).val())
            }
        })

        $.ajax({
            url: url,
            data: 'limit=' + limit + '&sortby=' + sortby + '&filterCategorywise=' + filterCategorywise + '&filterBrandwise=' + filterBrandwise + '&min=' + min_price + '&max=' + max_price,
            success: function (response) {
                $('.frontend-products').html(response)
            }
        });
    }

});
