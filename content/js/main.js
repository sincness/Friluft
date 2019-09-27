$(document).ready(function(e) {
    $(".burger").click(function(){
        $('.nav').toggleClass( "open");

    });
    $(".search__dropdown").hide();
    $("#search").keyup(function() {
        $("#search").focus($(".search__dropdown").show());
        let text = $(this).val();
        $.ajax({
            type: 'GET',
            url: 'content/includes/functions/search.php',
            data: {'val': text},
            success: function (data) {
                for (let i = 0; i < data.length; i++) {
                    $(".search__dropdown").html(data);
                }
            }
        });
    });
    $(document).click(function() {
        $(".search__dropdown").hide();
    });
});