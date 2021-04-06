// alert('script');

$(document).ready(function () {
    $('#country').on('change', function(e) {
        e.preventDefault();
        let country = $(this).val();
        // alert(country);

        $("#state").empty();
        
        // $('#state').append(`<option value="0" disabled selected>Processing...</option>`);
        $.ajax({
            type: "GET",
            url: '/getState/' + country,
            success: function (response) {
                console.log(response);
                $.each(response,function(key, value)
                {
                    // console.log(key);
                    
                    $("#state").append('<option value=' + value.id + '>' + value.name + '</option>');
                });    
            }
        });
    });

    $('#state').on('change', function(e) {
        // e.preventDefault();
        var state = $('#state').val();
        // alert(state);

        $("#city").empty();

        $.ajax({
            type: "GET",
            url: '/getcity/' + state,
            success: function (response) {
                console.log(response);
                $.each(response,function(key, value)
                {
                    $("#city").append('<option value=' + value.id + '>' + value.name + '</option>');
                });    
            }
        });
    });

});