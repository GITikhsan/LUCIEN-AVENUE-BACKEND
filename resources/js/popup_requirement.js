$(document).ready(function () {

    let selectedIndex = -1;

    // ===== Inisialisasi & Load dari localStorage =====
    let savedAddresses = JSON.parse(localStorage.getItem('addresses') || '[]');
    let editIndex = -1; // -1 = add, >=0 = edit

    // Set initial state of choose-payment button
    $('#choose-payment')
        .removeClass('bg-blue-600 hover:bg-blue-700 cursor-not-allowed')
        .addClass('bg-gray-400 cursor-not-allowed')
        .prop('disabled', true);

    // Render awal jika ada data tersimpan
        if (savedAddresses.length > 0) {
            updateAddressList(); // cuma isi radio list di modal
        }

        // Set address-box ke kondisi awal (belum ada alamat dipilih)
        $('#address-box')
            .removeClass('bg-green-50 border-green-200')
            .addClass('bg-red-50 border-red-200')
            .html(`
                <div class="flex items-start gap-3">
                    <div class="text-red-500 text-xl mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24">
                            <path fill="red" d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">You haven't add any address yet.</p>
                        <p class="text-sm text-gray-500">Add your shipping address to continue.</p>
                    </div>
                </div>
                <button id="add-address-btn" class="mt-4 bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 transition">Add Address</button>
            `);


    // Helper: simpan ke localStorage
    function persistAddresses() {
        localStorage.setItem('addresses', JSON.stringify(savedAddresses));
    }

    // Helper: enable choose-payment
    function enableChoosePayment() {
        $('#choose-payment')
            .removeClass('bg-gray-400 cursor-not-allowed')
            .addClass('bg-blue-600 hover:bg-blue-700')
            .prop('disabled', false);
    }

    // -------------------- MODAL HANDLING --------------------
    $('#openModalBtn').click(() => $('#agreementModal').removeClass('hidden').addClass('flex'));
    $('#open-payment').click(() => {
        $('#agreementModal').removeClass('flex').addClass('hidden');
        $('#payment-up').removeClass('hidden').addClass('flex');
    });
    $('.closeModalBtn').click(() => $('#agreementModal').removeClass('flex').addClass('hidden'));
    $('.closePaymentBtn').click(() => $('#payment-up').removeClass('flex').addClass('hidden'));
    $('#cancel-choose').click(() => $('#choose-address-modal').addClass('hidden'));
    $('#cancel-add-address').click(() => {
        $('#address-modal').removeClass('flex').addClass('hidden');
        $('body').removeClass('overflow-hidden');
    });
    $('#open-add-address').click(() => {
    const selected = $('input[name="address"]:checked').val();

        if (selected === undefined) {
            // Tidak pilih apa-apa → buka form add address
            editIndex = -1;
            $('#choose-address-modal').addClass('hidden');
            $('#address-modal').removeClass('hidden').addClass('flex');
        } else {
            // Ada address yang dipilih → pakai itu
            const chosen = savedAddresses[selected];
            updateAddressBox(chosen);
            enableChoosePayment();
            $('#choose-address-modal').addClass('hidden');
        }
    });


    // -------------------- PHONE VALIDATION --------------------
    $('#phone').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // -------------------- VOUCHER --------------------
    $('#view-voucher').click(() => {
        alert('Your available vouchers:\n- 10% off\n- Free shipping');
    });

    // -------------------- SAVE ADDRESS (Add & Edit) --------------------
    $('#save-address').click(function (e) {
        e.preventDefault();
        const addr = {
            name: $('input[name="name"]').val().trim(),
            phone: $('input[name="phone"]').val().trim(),
            label: $('input[name="label"]').val().trim(),
            city: $('input[name="city"]').val().trim(),
            address: $('textarea[name="address"]').val().trim(),
            note: $('textarea[name="note"]').val().trim(),
            main: $('#main').is(':checked')
        };
        if (!addr.name || !addr.phone || !addr.address) {
            return alert('Name, phone number and address must be filled in.');
        }
        if (!$('#agree').is(':checked')) {
            return alert('You must agree to the Terms & Conditions.');
        }
        if (editIndex >= 0) {
            // Edit existing
            savedAddresses[editIndex] = addr;
        } else {
            // Add new
            savedAddresses.push(addr);
        }
        persistAddresses();
        const last = savedAddresses[savedAddresses.length - 1];
        updateAddressBox(last);
        updateAddressList();
        enableChoosePayment();
        $('#address-modal').fadeOut(200, function() {
            $(this).removeClass('flex').addClass('hidden');
            $('body').removeClass('overflow-hidden');
        });
    });

    // -------------------- EVENT DELEGATION --------------------
    $('#address-box').on('click', '#add-address-btn', function () {
        editIndex = -1;
        $('#choose-address-modal').removeClass('hidden');
        updateAddressList();
    });
    $(document).on('click', '#edit-address-btn', function (e) {
        e.preventDefault();

        // Gunakan selectedIndex kalau ada, fallback ke default (alamat terakhir)
        const indexToEdit = selectedIndex >= 0 ? selectedIndex : savedAddresses.length - 1;
        const a = savedAddresses[indexToEdit];
        if (!a) return;

        editIndex = indexToEdit;

        $('input[name="name"]').val(a.name);
        $('input[name="phone"]').val(a.phone);
        $('input[name="label"]').val(a.label);
        $('input[name="city"]').val(a.city);
        $('textarea[name="address"]').val(a.address);
        $('textarea[name="note"]').val(a.note);
        $('#main').prop('checked', a.main);
        $('#agree').prop('checked', true);

        $('#choose-address-modal').addClass('hidden');
        $('#address-modal').removeClass('hidden').addClass('flex');
        $('body').addClass('overflow-hidden');
    });


    // -------------------- FUNCTIONS --------------------
    function updateAddressBox(data) {
        $('#address-box')
            .removeClass('bg-red-50 border-red-200')
            .addClass('bg-green-50 border-green-200')
            .html(`
                <div class="flex items-start gap-3">
                    <div class="text-green-500 text-xl mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24">
                            <path fill="green" d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">${data.name}</p>
                        <p class="text-sm text-gray-500">${data.address}</p>
                    </div>
                </div>
                <button id="edit-address-btn" class="mt-4 bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600 transition">Edit Address</button>
                <button id="add-address-btn" class="mt-4 bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 transition">Add Address</button>
            `);
    }
    function updateAddressList() {
        const c = $('#saved-addresses').empty();
        if (savedAddresses.length === 0) {
            c.append('<p class="text-gray-400 text-sm">No addresses saved yet.</p>');
            return;
        }
        savedAddresses.forEach((it, i) => {
            c.append(`
                <div class="flex justify-between items-center my-1">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="address" value="${i}" class="mr-2">
                        <span class="font-medium">${it.name}</span> - <span>${it.address}</span>
                    </label>
                    <button data-index="${i}" class="delete-address text-red-500 hover:text-red-700 text-sm ml-2">Delete</button>
                </div>
            `);
        });

    }

    // -------------------- RADIO TOGGLE HANDLING --------------------
    let lastRadio = null;
    $('#saved-addresses').on('click', 'input[name="address"]', function () {
        if (lastRadio === this) {
            this.checked = false;
            lastRadio = null;
            selectedIndex = -1;
            $('#open-add-address').text('New Address');
        } else {
            lastRadio = this;
            selectedIndex = parseInt($(this).val());
            $('#open-add-address').text('Confirm');
        }
    });

    // -------------------- DELETE ADDRESS --------------------
$(document).on('click', '.delete-address', function () {
    const index = $(this).data('index');

    if (!confirm('Are you sure you want to delete this address?')) return;

    savedAddresses.splice(index, 1);
    persistAddresses();

    lastRadio = null;
    selectedIndex = -1;
    updateAddressList();

    if (savedAddresses.length === 0) {
            $('#address-box')
                .removeClass('bg-green-50 border-green-200')
                .addClass('bg-red-50 border-red-200')
                .html(`
                    <div class="flex items-start gap-3">
                        <div class="text-red-500 text-xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24">
                                <path fill="red" d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">You haven't add any address yet.</p>
                            <p class="text-sm text-gray-500">Add your shipping address to continue.</p>
                        </div>
                    </div>
                    <button id="add-address-btn" class="mt-4 bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 transition">Add Address</button>
                `);

            $('#choose-payment')
                .removeClass('bg-blue-600 hover:bg-blue-700')
                .addClass('bg-gray-400 cursor-not-allowed')
                .prop('disabled', true);
        }
    });


});
