<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!--begin::Head-->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dreamers Association">
    <meta name="author" content="Dreamers Association">

    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/img/icons/icon-48x48.png')}}" />

    @include('include.css')
    
    @stack('css')

</head>
<!--end::Head-->

<div class="wrapper">

    <!--begin::Aside menu-->
    @include('include.sidebar')
    <!--end::Aside menu-->

    <div class="main">

        <!--begin::Aside menu-->
        @include('include.header')
        <!--end::Aside menu-->

        <!--begin::Content-->
        <main class="content">
            <div class="container-fluid p-0">
                @yield('content')
            </div>
        </main>
        <!--end::Content-->

        <!--begin::Footer-->
        @include('include.footer')
        <!-- Add this before closing </body> tag -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

        <!--end::Footer-->
    </div>

    
    @include('include.js')
    @stack('scripts')
    <!-- Add this in the <head> section -->

        <script>
            $(document).ready(function() {
                // Initialize Select2 on all select elements
                $('select').select2({
                    placeholder: "Select an option",
                    allowClear: true
                });
            });
            $('#road_id').on('change', function() {
                var roadId = $(this).val();

                if (roadId) {
                    // Send an AJAX request to fetch buildings for the selected road
                    $.ajax({
                        url: '{{ route('user.buildingsByRoad') }}',
                        method: 'GET',
                        data: { road_id: roadId },
                        success: function(data) {
                            // Populate the buildings dropdown with the fetched buildings
                            var options = '<option value="">Select Building</option>';
                            data.forEach(function(building) {
                                options += `<option value="${building.id}">${building.name}</option>`;
                            });
                            $('#building_id').html(options);
                        }
                    });
                } else {
                    // Clear the buildings dropdown if no road is selected
                    $('#building_id').html('<option value="">Select Building</option>');
                }
            });
        // Function to load apartments by building, month, and year
        var selectedApartments = []; // Array to store selected apartment IDs
var selectedAmounts = []; // Array to store selected amounts

function loadApartments() {
    var buildingId = $('#building_id').val();
    var month = $('#month').val();
    var year = $('#year').val();

    if (buildingId && month && year) {
        $.ajax({
            url: '{{ route('user.getApartmentsByBuilding') }}',
            type: 'GET',
            data: { building_id: buildingId, month: month, year: year },
            success: function(response) {
                var apartmentCardsContainer = $('#apartmentCardsContainer');
                apartmentCardsContainer.empty();

                $.each(response.apartments, function(index, apartment) {
                    var monthPayment = apartment.month_payment;

                    var card = $('<div class="col mb-4">')
                        .append('<div class="card shadow-sm h-100">' +
                            '<div class="card-body">' +
                            '<h5 class="card-title">Apartment ' + apartment.apartment_number + '</h5>' +
                            '<p class="card-text">Bill: ' + apartment.category.bill + '</p>' +
                            '<p class="card-text">Month Payment: ' + monthPayment + '</p>' +
                            (monthPayment === "0.00" 
                                ? '<button type="button" class="btn btn-outline-success mark-payment-btn" data-id="' + apartment.id + '" data-amount="' + apartment.category.bill + '">Mark for Payment</button>'
                                : '<button type="button" class="btn btn-secondary" disabled>Payment Collected</button>') +
                            '</div>' +
                            '</div>');

                    apartmentCardsContainer.append(card);
                });

                $('.mark-payment-btn').click(function() {
                    var apartmentId = $(this).data('id');
                    var amount = $(this).data('amount');
                    
                    // Toggle selection
                    if (selectedApartments.includes(apartmentId)) {
                        // Remove if already selected
                        selectedApartments = selectedApartments.filter(id => id !== apartmentId);
                        selectedAmounts = selectedAmounts.filter((amt, idx) => selectedApartments[idx] !== apartmentId);
                        $(this).text('Mark for Payment').removeClass('btn-success').addClass('btn-outline-success');
                    } else {
                        // Add to selection
                        selectedApartments.push(apartmentId);
                        selectedAmounts.push(amount);
                        $(this).text('Unmark').removeClass('btn-outline-success').addClass('btn-success');
                    }

                    // Update hidden input values and toggle submit button visibility
                    $('#selectedApartmentIds').val(JSON.stringify(selectedApartments));
                    $('#selectedAmounts').val(JSON.stringify(selectedAmounts));
                    $('#submitPaymentButton').toggle(selectedApartments.length > 0);
                });
            },
            error: function() {
                alert('Error loading apartments');
            }
        });
    } else {
        $('#apartmentCardsContainer').empty();
        $('#submitPaymentButton').hide();
    }
}

// Automatically select current month and year
$(document).ready(function() {
    var now = new Date();
    var currentMonth = ("0" + (now.getMonth() + 1)).slice(-2); // Months are 0-based
    var currentYear = now.getFullYear();

    $('#month').val(currentMonth);
    $('#year').val(currentYear);

    loadApartments();

    // Trigger loading when building, month, or year changes
    $('#building_id, #month, #year').change(loadApartments); 
});



            $('#apartment_id').on('change', function() {
                var selectedOption = $(this).find('option:selected').text();
                var bill = selectedOption.split('Bill: ')[1]; // Extract the bill value from the text
                $('#amount').val(bill ? bill.trim() : ''); // Set amount if available
            });
        </script>
   
    <script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});
		});
	</script>
</div>

</html>
