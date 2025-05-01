$(document).ready(function() {
    // Buka agreement modal
    $('#openModalBtn').click(function() {
      $('#agreementModal').removeClass('hidden').addClass('flex');
    });

    // Pindah dari agreement ke payment
    $('#open-payment').click(function() {
      $('#agreementModal').removeClass('flex').addClass('hidden'); // hide agreement
      $('#payment-up').removeClass('hidden').addClass('flex');     // show payment
    });

    // Tutup agreement
    $('.closeModalBtn').click(function() {
      $('#agreementModal').removeClass('flex').addClass('hidden');
    });

    // Tutup payment
    $('.closePaymentBtn').click(function() {
      $('#payment-up').removeClass('flex').addClass('hidden');
    });
    // voucher
    $('#view-voucher').on('click', function() {
        alert('Your available vouchers:\n- 10% off\n- Free shipping');
    });
    // address
    $('#add-address-btn').on('click', function() {
        $('#address-modal').fadeIn(200).css('display', 'flex');
    });

    $('#cancel-modal').on('click', function() {
        $('#address-modal').fadeOut(200);
    });

    // no hp number only
    document.getElementById('hp').addEventListener('input', function(event) {
    // Cek jika input mengandung karakter yang bukan angka
    if (/[^0-9]/.test(this.value)) {
        alert('Hanya angka yang diperbolehkan!');
        // Menghapus karakter yang bukan angka
        this.value = this.value.replace(/[^0-9]/g, '');
    }
    });

    // submit
    $('#save-address').on('click', function (e) {
    e.preventDefault();

    let nama = $('input[name="nama"]').val().trim();
    let hp = $('input[name="hp"]').val().trim();
    let alamat = $('textarea[name="alamat"]').val().trim();
    let setuju = $('#setuju').is(':checked');

    // Validasi sederhana
    if (!nama || !hp || !alamat) {
        alert('Nama, Nomor HP, dan Alamat wajib diisi.');
        return;
    }

    if (!setuju) {
        alert('Kamu harus menyetujui Syarat & Ketentuan.');
        return;
    }

    // Simulasi simpan
    $('#address-modal').fadeOut(200);
    $('#address-box').fadeOut(200); // <- tambahin ini buat hilangin box merah
    $('#choose-payment')
        .removeClass('bg-gray-400 cursor-not-allowed')
        .addClass('bg-blue-600 hover:bg-blue-700')
        .text('Proceed to Payment')
        .prop('disabled', false);

});

});
