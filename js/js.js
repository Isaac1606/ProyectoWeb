$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
    console.log(fileName);
    let formdata = new FormData();
    $.each($('.custom-file-input')[0].files, function(i, file) {
        formdata.append(fileName, file);
    });
    console.log(formdata);
    let preview = document.querySelector('#imagen1');
    let file    = document.querySelector('input[type=file]').files[0];
    let reader = new FileReader();
    reader.addEventListener("load", function () {
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
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
function previewFile() {
    var preview = document.querySelector('img');
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();

    reader.addEventListener("load", function () {
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}
// $file = $_FILES['image_pe']; codigo php