$(document).ready(function () {
    $('#image').change(function (e) {
        e.preventDefault();
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#show_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    })
})

$(document).ready(function () {
    $('#company_image').change(function (e) {
        e.preventDefault();
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#show_company_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    })
})
