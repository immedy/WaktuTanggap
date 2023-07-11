$(document).ready(function() {
    $('table').on('click', '#pegawai_id', function() {
        var userURL = $(this).data('url');
        $.get(userURL, function(data) {
            $('#PegawaiModal').modal('show');
            $('#nama').text(data.nama);
        })
    });

});