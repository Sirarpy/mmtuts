$(document).ready(function () {
    //-----------------------------CHANGE USER INFORMATION---------------

    $('.save').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        // console.log(id);
        var form = document.getElementById('dataForm');
        var formData = new FormData(form);
        formData.append('id', id);
        // console.log(formData);
        $.ajax({
            url: '../controller/save_controller.php',
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,
            complete: function (data) {
                window.location.reload(data);
            },
        });
    });

    //---------------------------ADD ARTICLE---------------------------

    $('.add').on('click', function (e) {
        e.preventDefault();
        // var div = document.getElementById('example');
        var form = document.getElementById('articleForm');
        var formData = new FormData(form);
        // console.log(formData.get('title'));
        $.ajax({
            url: '../controller/add.php',
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,
            complete: function (data) {
                window.location.reload(data);
                // comming information addend to div without reloade
                //  div.push(data);
            },
        });
    });

    //---------------------------------DELETE ARTICLE----------------------

    $('.delete').on('click', function (e) {
        e.preventDefault();
        var x = $(this).parents('div.card');
        var id = $(this).data('id');
        // console.log(id);
        var div = document.getElementById('article_row');
        var formData = new FormData(div);
        formData.append('id', id);
        // console.log(id);
        $.ajax({
            url: '../controller/delete.php',
            type: 'POST',
            // data: {id:id},
            data: formData,
            dataType: 'JSON',
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,
            complete: function (data) {
                if (data) {
                    x.remove();
                } else {
                    alert("article can't be deleted");
                }
            }
        })
    });

    // //    -------------------------------UPDATE-------------------------------

    $('.update').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var div = $(this).parents('form')[0];
        console.log(div)
        var formData = new FormData(div);
        formData.append('id', id);
        // console.log(id);
        // console.log(formData.get('articlePicture'));
        $.ajax({
            url: '../controller/update.php',
            type: 'POST',
            // data: {id:id},
            data: formData,
            dataType: 'JSON',
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,
            complete: function (data) {
                location.reload(data);
            }
        })
    });
});
