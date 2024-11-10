$(document).ready(function() {
    $('.basic-single').select2({
        placeholder: "Select One",
        allowClear: true
    });
});

("use strict");
$(document).on("click", ".delete-confirm", function () {
    let url = $(this).data("route");
    let csrf = $(this).data("csrf");

    Swal.fire({
        title: "Are you sure?",
        text: "You want to Delete Data",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: url,
                data: {
                    _token: csrf,
                    _method: "DELETE",
                },
                success: function (data) {
                    location.reload();
                },
            });
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
    });
});

("use strict");
$(document).on("click", ".approve-confirm", function () {
    let url = $(this).data("route");
    let csrf = $(this).data("csrf");

    Swal.fire({
        title: "Are you sure?",
        text: "You want to Approve this",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Approve it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: url,
                data: {
                    _token: csrf,
                    _method: "POST",
                },
                success: function (data) {
                    location.reload();
                },
            });
            Swal.fire("Changed!", "Your data has been Approved.", "success");
        }
    });
});

("use strict");
$(document).on("click", ".cancel-confirm", function () {
    let url = $(this).data("route");
    let csrf = $(this).data("csrf");

    Swal.fire({
        title: "Are you sure?",
        text: "You want to Cancel this",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Cancel it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: url,
                data: {
                    _token: csrf,
                    _method: "POST",
                },
                success: function (data) {
                    location.reload();
                },
            });
            Swal.fire("Changed!", "Your data has been Canceled.", "success");
        }
    });
});

("use strict");
$(document).on("click", ".leave-request-approve-confirm", function () {
    let url = $(this).data("route");
    let csrf = $(this).data("csrf");

    // Create a SweetAlert2 modal with an input field for comments
    Swal.fire({
        title: "Approve Leave Request",
        input: "textarea",
        inputLabel: "Comment",
        inputPlaceholder: "Enter your comment here...",
        showCancelButton: true,
        confirmButtonText: "Approve",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true,
        preConfirm: (comment) => {
            // Perform the AJAX request with comment data
            return $.ajax({
                type: "POST",
                dataType: "json",
                url: url,
                data: {
                    _token: csrf,
                    _method: "POST",
                    comment: comment
                }
            }).catch(error => {
                console.error('Error:', error);
                Swal.showValidationMessage('Request failed: ' + error);
            });
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            // If the request is successful, reload the page or perform additional actions
            location.reload();
            Swal.fire("Changed!", "Your data has been Approved.", "success");
        }
    });
});

("use strict");
$(document).on("click", ".leave-request-cancel-confirm", function () {
    let url = $(this).data("route");
    let csrf = $(this).data("csrf");

    // Create a SweetAlert2 modal with an input field for comments
    Swal.fire({
        title: "Cancel Leave Request",
        input: "textarea",
        inputLabel: "Comment",
        inputPlaceholder: "Enter your comment here...",
        showCancelButton: true,
        confirmButtonText: "Cancel",
        cancelButtonText: "Close",
        showLoaderOnConfirm: true,
        preConfirm: (comment) => {
            // Perform the AJAX request with comment data
            return $.ajax({
                type: "POST",
                dataType: "json",
                url: url,
                data: {
                    _token: csrf,
                    _method: "POST",
                    comment: comment
                }
            }).catch(error => {
                console.error('Error:', error);
                Swal.showValidationMessage('Request failed: ' + error);
            });
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            // If the request is successful, reload the page or perform additional actions
            location.reload();
            Swal.fire("Changed!", "Your data has been Canceled.", "success");
        }
    });
});


("use strict");
$(document).on("click", ".status-confirm", function () {
    let url = $(this).data("route");
    let csrf = $(this).data("csrf");

    Swal.fire({
        title: "Are you sure?",
        text: "You want to change status",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Change it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: url,
                success: function (data) {
                    location.reload();
                },
            });
            Swal.fire("Changed!", "Your Status has been Changed.", "success");
        }
    });
});

$(document).ready(function() {
    $("#dataTable").DataTable({
        responsive: true,
        pageLength: 25, 
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, "All"]],
    });
});


$(document).ready(function() {
    var start = moment();
    var end = moment();

    function cb(start, end) {
        $('.date-range').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
    }

    $('.date-range').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
});

$(document).ready(function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    $('.needs-validation').each(function() {
        var form = this;
        $(form).on('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            $(form).addClass('was-validated');
        });
    });
});

$("#basic-image").change(function() {
    var input = this;

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image-preview').css('background-image', 'url(' + e.target.result + ')');
            $('#image-preview').hide();
            $('#image-preview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
});