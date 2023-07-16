$(document).ready(function() {
    $('table').on('click', '#PEGAWAI', function() {
        var userURL = $(this).data('url');
        $.get(userURL, function(data) {
            $('#data-username').val('');
            $('#user-password').val('');
            $('#id').text('');
            $('#pegawai_id').text('');
            $('#confirm-password').val('');
            $('#PegawaiModal').modal('show');
            $('#nama').text(data.nama);
            $('#id').text(data.user.id);
            $('#pegawai_id').text(data.id);
            $('#data-username').val(data.user.username);
            
        })
    });
    var confirmationInput = document.getElementById("confirm-password");
    var passwordInput = document.getElementById("user-password");
    var submitButton = document.querySelector("#validasi_password");
    var confirmationError = document.getElementById("confirmation-error");

    confirmationInput.addEventListener("input", function() {
        var password = passwordInput.value;
        var password_confirmation = this.value;

        if (password !== password_confirmation) {
            confirmationError.classList.remove("d-none");
            submitButton.disabled = true;
        } else {
            confirmationError.classList.add("d-none");
            submitButton.disabled = false;
        }
    });
});







