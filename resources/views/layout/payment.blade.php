<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-6 space-y-6">

        <!-- Address Box -->
        <div class="border border-red-200 rounded-xl p-4 bg-red-50" id="address-box">
            <div class="flex items-start gap-3">
                <div class="text-red-500 text-xl">📍</div>
                <div>
                    <p class="font-semibold text-gray-800">You haven't add any address yet.</p>
                    <p class="text-sm text-gray-500">Add your shipping address to continue.</p>
                </div>
            </div>
            <button id="add-address-btn" class="mt-4 bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 transition">Add Address</button>
        </div>

        <!-- Voucher Section -->
        <div class="border border-green-200 rounded-xl p-4 bg-green-50">
            <div class="flex items-center justify-between">
                <div class="text-sm text-green-800 font-medium">You have vouchers available</div>
                <button id="view-voucher" class="bg-green-600 text-white px-4 py-1.5 rounded-lg hover:bg-green-700 transition">View</button>
            </div>
        </div>

        <!-- Payment Summary -->
        <div class="rounded-xl p-4 bg-gray-100">
            <p class="font-semibold text-gray-700 mb-3">Payment Summary</p>
            <div class="flex justify-between text-sm text-gray-600 mb-1">
                <span>Product Price</span>
                <span>IDR 1,800,000</span>
            </div>
            <div class="flex justify-between text-sm text-gray-600 mb-1">
                <span>Authentication Fee</span>
                <span class="text-green-600 font-medium">FREE</span>
            </div>
            <div class="flex justify-between text-sm text-gray-600 mb-3">
                <span>Processing Fee <span class="text-xs text-green-500 ml-1">🛈</span></span>
                <span>IDR 36,000</span>
            </div>
            <div class="flex justify-between font-semibold text-gray-800 border-t pt-2">
                <span>Total</span>
                <span>IDR 1,836,000</span>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex gap-3">
            <button class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition">Back</button>
            <button id="choose-payment" class="flex-1 bg-gray-400 text-white py-2 rounded-lg cursor-not-allowed" disabled>Choose Payment</button>
        </div>

    </div>

    <!-- Modal -->
    <div id="address-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded-xl shadow-lg w-96">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Add Shipping Address</h2>
            <input id="input-address" type="text" placeholder="Enter your address" class="w-full border px-3 py-2 rounded mb-4">
            <div class="flex justify-end gap-3">
                <button id="cancel-modal" class="bg-gray-300 text-gray-700 px-4 py-1.5 rounded hover:bg-gray-400 transition">Cancel</button>
                <button id="save-address" class="bg-blue-600 text-white px-4 py-1.5 rounded hover:bg-blue-700 transition">Save</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#view-voucher').on('click', function() {
                alert('Your available vouchers:\n- 10% off\n- Free shipping');
            });

            $('#add-address-btn').on('click', function() {
                $('#address-modal').fadeIn(200).css('display', 'flex');
            });

            $('#cancel-modal').on('click', function() {
                $('#address-modal').fadeOut(200);
            });

            $('#save-address').on('click', function() {
                let address = $('#input-address').val();
                if (address.trim() !== '') {
                    $('#address-box').hide();
                    $('#address-modal').fadeOut(200);
                    $('#choose-payment')
                        .removeClass('bg-gray-400 cursor-not-allowed')
                        .addClass('bg-blue-600 hover:bg-blue-700')
                        .text('Proceed to Payment')
                        .prop('disabled', false);
                } else {
                    alert('Please enter an address.');
                }
            });
        });
    </script>
</body>
</html>
