$(document).ready(function() {
    $('table').on('click', '#user', function() {
        var userURL = $(this).data('url');
        $.get(userURL, function(data) {
            $('#userShowModal').modal('show');
            $('#user-pegawai').val(data.pegawai_id);
            $('#user-id').val(data.id);
            $('#user-username').val(data.username);
            $('#user-password').val(data.password);
            
        })
    });

});