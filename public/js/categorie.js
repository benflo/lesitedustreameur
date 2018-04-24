$(document).ready(function () {

    var category = []

    $('.filter input').on('click', function () {
        if ($(this).is(':checked')) {
            var text = $.trim($(this).closest('li').text())
            category.push(text);
            afficheCategorie()
        } else {
            var text = $.trim($(this).closest('li').text())
            var index = category.indexOf(text);
            if (index !== -1) category.splice(index, 1);

            if (category === undefined || category.length == 0) {
                $('.col-md-10 .col-md-4').show()

                return;
            }


            afficheCategorie()

        }


    })

    function afficheCategorie() {
        $('.col-md-10 .col-md-4').hide()
        category.forEach(function (text) {
            $('.' + text).show()
        })
    }
})
