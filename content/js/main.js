$(document).ready(function(e) {
    $(".search__dropdown").hide();

    $("#search").keyup(function() {
        $(".search__dropdown").show();
        let text = $(this).val();
        $.ajax({
            type: 'GET',
            url: 'content/includes/functions/search.php',
            data: 'txt=' + text,
            success: function (data) {
                console.log(data);
                $(".search__dropdown").html(data);
                $(".search__dropdown").html('ASD');
            }
        });
    });
});

console.log('hej');
