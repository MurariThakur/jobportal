@if (session('success'))
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
            <path
                d="M16 8a8 8 0 1 1-16 0 8 8 0 0 1 16 0zM11.03 5.97a.75.75 0 1 0-1.06-1.06L7 7.94 6.03 6.97a.75.75 0 0 0-1.06 1.06l2 2a.75.75 0 0 0 1.06 0l4-4z" />
        </symbol>
    </svg>
    <div id="success-alert" class="alert alert-success d-flex align-items-center alert-dismissible fade show"
        role="alert">
        <!-- SVG icon -->
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" fill="currentColor" role="img"
            aria-label="Success:">
            <use xlink:href="#check-circle-fill"></use>
        </svg>

        <!-- Success message -->
        <div>
            {{ session('success') }}
        </div>

        <!-- Close button -->
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        setTimeout(function() {
            let alertElement = document.getElementById('success-alert');
            let bootstrapAlert = new bootstrap.Alert(alertElement);
            bootstrapAlert.close(); // Dismiss the alert programmatically
        }, 2000); // 2 seconds delay
    </script>
@endif

@if ($errors->any())
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-circle-fill" viewBox="0 0 16 16">
            <path
                d="M16 8a8 8 0 1 1-16 0 8 8 0 0 1 16 0zM8 4a.5.5 0 0 0-.5.5V8a.5.5 0 0 0 1 0V4.5A.5.5 0 0 0 8 4zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
        </symbol>
    </svg>
    <div id="error-alert" class="alert alert-danger d-flex align-items-center alert-dismissible fade show"
        role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" fill="currentColor" role="img"
            aria-label="Error:">
            <use xlink:href="#exclamation-circle-fill"></use>
        </svg>

        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script>
    setTimeout(function() {
        let successAlert = document.getElementById('success-alert');
        if (successAlert) {
            let bootstrapSuccessAlert = new bootstrap.Alert(successAlert);
            bootstrapSuccessAlert.close(); // Dismiss the success alert programmatically
        }

        let errorAlert = document.getElementById('error-alert');
        if (errorAlert) {
            let bootstrapErrorAlert = new bootstrap.Alert(errorAlert);
            bootstrapErrorAlert.close(); // Dismiss the error alert programmatically
        }
    }, 3000); // 3 seconds delay
</script>
