function logoutSubmit() {
    let form = document.getElementById("logoutSubmit");
    form.submit();
}
function companyLogout() {
    let form = document.getElementById("companyLogout");
    form.submit();
}
function submitForm() {
    let form = document.getElementById("form__submit");
    form.submit();
}

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
    $('#background').change(function (e) {
        e.preventDefault();
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#show_background').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    })
})
