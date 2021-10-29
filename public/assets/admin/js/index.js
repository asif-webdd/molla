$(function () {
    "use strict";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })


    /*********** Quantity Show ***********/
    $(document).on('change', '#limit', function () {
        fatchData()
    })

    /*********** Search Content ***********/
    $(document).on('keyup', '#search-content', function () {
        fatchData()
    })
    $(document).on('keyup', '#price-search-content', function () {
        fatchData()
    })
    $(document).on('keyup', '#quantity-search-content', function () {
        fatchData()
    })
    $(document).on('keyup', '#customer-name-search-content', function () {
        fatchData()
    })
    $(document).on('keyup', '#customer-mobile-search-content', function () {
        fatchData()
    })
    $(document).on('keyup', '#customer-email-search-content', function () {
        fatchData()
    })
    $(document).on('keyup', '#customer-address-search-content', function () {
        fatchData()
    })

    function fatchData(page = 1) {
        let limit = $("#limit").val()
        let search_content = $("#search-content").val()
        let price_search_content = $("#price-search-content").val()
        let quantity_search_content = $("#quantity-search-content").val()
        let customer_name_search_content = $("#customer-name-search-content").val()
        let customer_mobile_search_content = $("#customer-mobile-search-content").val()
        let customer_email_search_content = $("#customer-email-search-content").val()
        let customer_address_search_content = $("#customer-address-search-content").val()

        $.ajax({
            url: $('.table-responsive').data('url'),
            data: 'page=' + page +
                '&limit=' + limit +
                '&search_content=' + search_content +
                '&price_search_content=' + price_search_content +
                '&quantity_search_content=' + quantity_search_content +
                '&customer_name_search_content=' + customer_name_search_content +
                '&customer_mobile_search_content=' + customer_mobile_search_content +
                '&customer_email_search_content=' + customer_email_search_content +
                '&customer_address_search_content=' + customer_address_search_content,
            success: function (response) {
                $('.table-responsive').html(response)
            }
        });
    }


    /*********** Select Field ***********/
    $(".select2_demo_1").select2();


    /*********** Radio & Check Box ***********/
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });


    /*********** Date Picker ***********/
    $('#data_1 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });



    /*********** User Create ***********/
    $(document).on('submit', '.create-form', function () {
        event.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            method: 'POST',
            success: function (result) {
                if (result.status) {
                    success_noti(result.message)
                    $('.user-create-form')[0].reset()
                } else {
                    warning_noti(result.message)
                }
            }

        })
    });



    /*********** Category Create ***********/
    $(document).on('submit', '.category-create-form', function () {
        event.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            method: 'POST',
            success: function (result) {
                if (result.status) {
                    success_noti(result.message)
                    $('.category-create-form')[0].reset()

                    $('#root').html(result.data)
                    $('.icon-banner-box').slideDown()

                }
            }
        })
    });


    /*********** Brand Create ***********/
    $(document).on('submit', '.brand-create-form', function () {
        event.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            method: 'POST',
            success: function (result) {
                if (result.status) {
                    success_noti(result.message)
                    $('.category-create-form')[0].reset()

                    $('#root').html(result.data)
                    $('.icon-banner-box').slideDown()

                }
            }
        })
    });


    /*********** Product Create ***********/
    $(document).on('submit', '.product-create-form', function () {
        event.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            method: 'POST',
            success: function (result) {
                if (result.status) {
                    success_noti(result.message)
                    $('.category-create-form')[0].reset()

                    $('#root').html(result.data)
                    $('.icon-banner-box').slideDown()

                }
            }
        })
    });


});
