$(document).ready(function() {
    // Handle form submission with AJAX
    $('#addDataForm').submit(function(e) {
        e.preventDefault();

        // Mengambil data dari formulir
        var formData = $(this).serialize();

        // Melakukan permintaan AJAX
        $.ajax({
            url: '../php/servernya/upload_produk-sapi.php',
            type: 'POST',
            data: dataTable,
            dataType: 'json',
            success: function(response) {
                // Data berhasil ditambahkan, lakukan sesuatu
                console.log(response);

                // Misalnya, tampilkan pesan sukses
                $('#result').html('<div class="alert alert-success">' + response.message + '</div>');
            },
            error: function(error) {
                // Ada kesalahan dalam permintaan AJAX
                console.log('Error:', error);

                // Misalnya, tampilkan pesan error
                $('#result').html('<div class="alert alert-danger">Failed to add data</div>');
            }
        });
    });
});