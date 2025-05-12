$(document).ready(function () {
    let savedAddresses = [];

    // -------------------- MODAL HANDLING --------------------
    $('#openModalBtn').click(() => $('#agreementModal').removeClass('hidden').addClass('flex'));

    $('#open-payment').click(() => {
        $('#agreementModal').removeClass('flex').addClass('hidden');
        $('#payment-up').removeClass('hidden').addClass('flex');
    });

    $('.closeModalBtn').click(() => $('#agreementModal').removeClass('flex').addClass('hidden'));
    $('.closePaymentBtn').click(() => $('#payment-up').removeClass('flex').addClass('hidden'));

    $('#cancel-choose').click(() => $('#choose-address-modal').addClass('hidden'));
    $('#cancel-add-address').click(() => $('#address-modal').addClass('hidden'));

    $('#open-add-address').click(() => {
        $('#choose-address-modal').addClass('hidden');
        $('#address-modal').removeClass('hidden');
    });

    // -------------------- PHONE VALIDATION --------------------
    $('#phone').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
        if (/[^0-9]/.test(this.value)) {
            alert('Hanya angka yang diperbolehkan!');
        }
    });

    // -------------------- VOUCHER --------------------
    $('#view-voucher').click(() => {
        alert('Your available vouchers:\n- 10% off\n- Free shipping');
    });

    // -------------------- SAVE ADDRESS --------------------
    $('#save-address').click(function (e) {
        e.preventDefault();

        const name = $('input[name="name"]').val().trim();
        const phone = $('input[name="phone"]').val().trim();
        const label = $('input[name="label"]').val().trim();
        const city = $('input[name="city"]').val().trim();
        const address = $('textarea[name="address"]').val().trim();
        const note = $('textarea[name="note"]').val().trim();
        const main = $('#main').is(':checked');
        const agree = $('#agree').is(':checked');

        if (!name || !phone || !address) {
            alert('Name, phone number and address must be filled in.');
            return;
        }

        if (!agree) {
            alert('You must agree to the Terms & Conditions.');
            return;
        }

        const newAddress = { name, phone, label, city, address, note, main };
        savedAddresses.push(newAddress);

        updateAddressBox(newAddress);
        updateAddressList();
        $('#address-modal').fadeOut(200);

        $('#choose-payment')
            .removeClass('bg-gray-400 cursor-not-allowed')
            .addClass('bg-blue-600 hover:bg-blue-700')
            .text('Proceed to Payment')
            .prop('disabled', false);
    });

    // -------------------- EVENT DELEGATION --------------------
    $('#address-box').on('click', '#add-address-btn', function () {
        $('#choose-address-modal').removeClass('hidden');
        updateAddressList();
    });

    $('#address-box').on('click', '#edit-address-btn', function () {
        const lastAddress = savedAddresses[savedAddresses.length - 1];
        if (!lastAddress) return;

        $('input[name="name"]').val(lastAddress.nama);
        $('input[name="phone"]').val(lastAddress.hp);
        $('input[name="label"]').val(lastAddress.label);
        $('input[name="city"]').val(lastAddress.kota);
        $('textarea[name="address"]').val(lastAddress.alamat);
        $('textarea[name="note"]').val(lastAddress.catatan);
        $('#main').prop('checked', lastAddress.utama);
        $('#agree').prop('checked', true);

        $('#address-modal').removeClass('hidden');
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
        const container = $('#saved-addresses');
        container.empty();

        if (savedAddresses.length === 0) {
            container.append(`<p class="text-gray-400 text-sm">No addresses saved yet.</p>`);
            return;
        }

        savedAddresses.forEach((item, index) => {
            container.append(`
                <label class="block">
                    <input type="radio" name="address" value="${index}" class="mr-2">
                    <span class="font-medium">${item.name}</span> - <span>${item.address}</span>
                </label>
            `);
        });
    }

    // -------------------- RADIO TOGGLE HANDLING --------------------
    let lastRadio = null;

    $('#saved-addresses').on('click', 'input[name="address"]', function () {
        if (lastRadio === this) {
            this.checked = false;
            lastRadio = null;
            $('#open-add-address').text('New Address');
        } else {
            lastRadio = this;
            $('#open-add-address').text('Confirm');
        }
    });
});
