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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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

                $('[data-bs-toggle="tooltip"]').tooltip();
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
        success: function (response) {
            const apartmentCardsContainer = $('#apartmentCardsContainer');
            apartmentCardsContainer.empty();

            selectedApartments = [];
            selectedAmounts = [];

            let hasMarkableApartments = false;

            // Render apartment cards
            $.each(response.apartments, function (index, apartment) {
                const monthPayment = apartment.month_payment;
                const isPayable = monthPayment === "0.00";
                const notInRent = apartment.not_in_rent === 1;

                if (isPayable && !notInRent) {
                    hasMarkableApartments = true;
                }

                const card = $('<div class="col-md-3 mb-4">')
                    .append(`
                        <div class="card shadow-sm h-100 position-relative">
                            <div class="card-body">
                                <!-- Toggle Rent Status Button in Top-Right Corner -->
                                <button type="button" class="btn btn-danger toggle-rent-status-btn position-absolute" 
                                    style="top: 10px; right: 10px;" 
                                    data-id="${apartment.id}" 
                                    data-bs-toggle="tooltip" 
                                    data-bs-placement="top" 
                                    title="${notInRent ? 'Not in Rent' : 'Set as Not in Rent'}">
                                     ${notInRent ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>'}
                                </button>

                                <!-- Card Content -->
                                <h5 class="card-title">Apartment ${apartment.apartment_number}</h5>
                                <p class="card-text">Owner: ${apartment.owner_name}</p>
                                <p class="card-text">Mobile: ${apartment.mobile_no}</p>
                                <p class="card-text">Bill: ${apartment.category.bill}</p>
                                <p class="card-text">Month Payment: ${monthPayment}</p>
                                ${
                                    isPayable && !notInRent
                                        ? `<button type="button" class="btn btn-outline-primary mark-payment-btn" 
                                            data-id="${apartment.id}" 
                                            data-amount="${apartment.category.bill}">Mark for Payment</button>`
                                        : `<button type="button" class="btn btn-secondary" disabled>${notInRent ? 'Not in Rent' : 'Payment Collected'}</button>`
                                }
                            </div>
                        </div>


                    `);

                apartmentCardsContainer.append(card);
            });

            // Add "Mark All" button after all cards
            const markAllButton = $(` 
                <div class="text-center">
                    <button type="button" id="markAllButton" class="btn btn-outline-success mt-3" style="display: none;">Mark All</button>
                </div>
            `);
            apartmentCardsContainer.append(markAllButton);

            // Show "Mark All" button only if there are markable apartments
            if (hasMarkableApartments) {
                $('#markAllButton').show();
            }

            // Handle "Mark All" button click
            $('#markAllButton').click(function () {
                const markableApartments = response.apartments.filter(
                    apartment => apartment.month_payment === "0.00" && apartment.not_in_rent !== 1
                );
                const allMarked = selectedApartments.length === markableApartments.length;

                if (allMarked) {
                    // Unmark all
                    selectedApartments = [];
                    selectedAmounts = [];
                    $(this).text('Mark All');
                } else {
                    // Mark all
                    selectedApartments = markableApartments.map(apartment => apartment.id);
                    selectedAmounts = markableApartments.map(apartment => apartment.category.bill);
                    $(this).text('Unmark All');
                }

                // Update card buttons
                apartmentCardsContainer.find('.mark-payment-btn').each(function () {
                    const apartmentId = $(this).data('id');
                    if (selectedApartments.includes(apartmentId)) {
                        $(this).text('Unmark').removeClass('btn-outline-primary').addClass('btn-primary');
                    } else {
                        $(this).text('Mark for Payment').removeClass('btn-primary').addClass('btn-outline-primary');
                    }
                });

                // Update hidden inputs
                $('#selectedApartmentIds').val(JSON.stringify(selectedApartments));
                $('#selectedAmounts').val(JSON.stringify(selectedAmounts));
                $('#submitPaymentButton').toggle(selectedApartments.length > 0);
            });

            let selectedApartmentId = null; // Store the ID of the selected apartment

            // Handle "Toggle Rent Status" button click
            $('.toggle-rent-status-btn').click(function () {
                selectedApartmentId = $(this).data('id'); // Store the ID of the apartment
                $('#rentStatusModal').modal('show'); // Show the confirmation modal
            });

            // Handle "Confirm" button in the modal
            $('#confirmRentStatusUpdate').click(function () {
                if (selectedApartmentId) {
                    // Make an AJAX call to update the "not_in_rent" status
                    $.ajax({
                        url: '{{ route('user.toggleRentStatus') }}',
                        type: 'POST',
                        data: { id: selectedApartmentId, _token: '{{ csrf_token() }}' },
                        success: function(response) {
                            // After successful update, reload the page to reflect the changes
                            //location.reload(); 
                            loadApartments();
                            // Hide the modal
                            $('#rentStatusModal').modal('hide');

                            // Reset the selected apartment ID
                            selectedApartmentId = null;
                        },
                        error: function () {
                            alert('Error updating rent status.');
                        }
                    });
                }
            });

            // Handle individual "Mark for Payment" buttons
            $('.mark-payment-btn').click(function () {
                const apartmentId = $(this).data('id');
                const amount = $(this).data('amount');

                // Toggle selection
                if (selectedApartments.includes(apartmentId)) {
                    selectedApartments = selectedApartments.filter(id => id !== apartmentId);
                    selectedAmounts = selectedAmounts.filter((amt, idx) => selectedApartments[idx] !== apartmentId);
                    $(this).text('Mark for Payment').removeClass('btn-primary').addClass('btn-outline-primary');
                } else {
                    selectedApartments.push(apartmentId);
                    selectedAmounts.push(amount);
                    $(this).text('Unmark').removeClass('btn-outline-primary').addClass('btn-primary');
                }

                // Update hidden inputs
                $('#selectedApartmentIds').val(JSON.stringify(selectedApartments));
                $('#selectedAmounts').val(JSON.stringify(selectedAmounts));
                $('#submitPaymentButton').toggle(selectedApartments.length > 0);

                // Update "Mark All" button text
                const allMarked = selectedApartments.length === response.apartments.filter(
                    apartment => apartment.month_payment === "0.00" && apartment.not_in_rent !== 1
                ).length;
                $('#markAllButton').text(allMarked ? 'Unmark All' : 'Mark All');
            });
        },
        error: function () {
            alert('Error loading apartments');
        }
    });
} else {
    $('#apartmentCardsContainer').empty();
    $('#submitPaymentButton').hide();
}

// Function to refresh apartment list
function refreshApartmentsList(buildingId, month, year) {
    if (buildingId && month && year) {
        // Re-fetch apartments
        $.ajax({
            url: '{{ route('user.getApartmentsByBuilding') }}',
            type: 'GET',
            data: { building_id: buildingId, month: month, year: year },
            success: function (response) {
                // Render updated apartments
                $('#apartmentCardsContainer').empty();
                response.apartments.forEach(apartment => {
                    // Similar logic as above to render each apartment card
                });
            },
            error: function () {
                alert('Error refreshing apartments.');
            }
        });
    }
}

}


// Automatically select current month and year
$(document).ready(function() {
    var now = new Date();
    var currentMonth = ("0" + (now.getMonth() + 1)).slice(-2); // Months are 0-based
    var currentYear = now.getFullYear();

    $('#month').val(currentMonth).trigger('change');
    $('#year').val(currentYear).trigger('change');
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
