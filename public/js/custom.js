$('.categorie').on('checkbox', function (e) {
    e.preventDefault();


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: 'categorie/ajax',
        type: 'POST',
        data: {
            categorie:categorie

        }
    });
});