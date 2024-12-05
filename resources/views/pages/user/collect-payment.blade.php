@extends('layouts.app')

@section('content')
<style>
    .select2-container {
    width: 100% !important; /* Force full-width */
}
</style>
<div class="container-fluid">
    <h1 class="mb-4 text-center">Collect Payment</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form id="paymentForm" method="POST" action="{{ route('user.submit-collect-payment') }}">
        @csrf
        <input type="hidden" name="apartment_ids" id="selectedApartmentIds">
        <input type="hidden" name="amounts" id="selectedAmounts">
        <div class="row">
            <div class="col-md-6 col-sm-12 mb-3">
                <div class="form-group">
                    <label for="month" class="form-label">Select Month</label>
                    <select name="month" id="month" class="form-select shadow-sm" required>
                        <option value="">Select Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
            </div>

            <!-- Select Year -->
            <div class="col-md-6 col-sm-12 mb-3">
                <div class="form-group">
                    <label for="year" class="form-label">Select Year</label>
                    <select name="year" id="year" class="form-select shadow-sm" required>
                        <option value="">Select Year</option>
                        @for ($i = 2020; $i <= date('Y'); $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <!-- Select Road -->
            <div class="col-md-6 col-sm-12 mb-3">
                <div class="form-group">
                    <label for="road_id" class="form-label">Select Road</label>
                    <select name="road_id" id="road_id" class="form-select shadow-sm" required>
                        <option value="">Select Road</option>
                        @foreach ($staffRoads as $road)
                            <option value="{{ $road->id }}">{{ $road->road_no }}/{{ $road->block }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Select Building -->
            <div class="col-md-6 col-sm-12 mb-3">
                <div class="form-group">
                    <label for="building_id" class="form-label">Select Building</label>
                    <select name="building_id" id="building_id" class="form-select shadow-sm" required>
                        <option value="">Select Building</option>
                    </select>
                </div>
            </div>
        </div>
      
        
        <!-- Apartments Cards Container -->
        <div id="apartmentCardsContainer" class="row mt-4"></div>
        
        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" id="submitPaymentButton" class="btn btn-success mt-3" style="display: none;">Collect Payment</button>
        </div>
    </form>
</div>

<div class="modal fade" id="rentStatusModal" tabindex="-1" aria-labelledby="rentStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="rentStatusModalLabel">Confirm Action</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to update the rent status for this apartment?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="confirmRentStatusUpdate">Yes, Update</button>
        </div>
      </div>
    </div>
  </div>
  
@endsection

@section('scripts')
<script>
   
</script>
@endsection