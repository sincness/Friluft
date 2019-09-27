$(document).ready(function(e) {
    $(".search__dropdown").hide();
    $("#search").keyup(function() {
        $(".search__dropdown").show();
        let text = $(this).val();
        $.ajax({
            type: 'GET',
            url: 'content/includes/functions/search.php',
            data: {'val': text},
            success: function (data) {
                for (let i = 0; i < data.length; i++) {
                    console.log(data);
                    $(".search__dropdown").html(data);
                }
            }
        });
    });
});