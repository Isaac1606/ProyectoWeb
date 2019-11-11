$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
    console.log(fileName);
    let formdata = new FormData();
    $.each($('.custom-file-input')[0].files, function(i, file) {
        formdata.append(fileName, file);
    });
    console.log(formdata);
    $.ajax({
        url: "/my.php", //direccion del archivo php al que se lo mandaras
        data : formdata,
        dataType : "json",
        type : "post",
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){

        },
        failure: function(){
            $(this).addClass("error");
        }
    });
    return false;
});

// $file = $_FILES['image_pe']; codigo php