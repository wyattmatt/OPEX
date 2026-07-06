<!-- Modal for QR Code Scanner -->
<div class="modal fade" id="scannerModal" tabindex="-1" aria-labelledby="scannerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scannerModalLabel">Scan Item QR Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <div id="qr-reader" style="width: 100%;"></div>
        <div id="qr-reader-results" class="mt-3 text-success fw-bold"></div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const scannerModal = document.getElementById('scannerModal');
    let html5QrcodeScanner;

    scannerModal.addEventListener('shown.bs.modal', function () {
        // Initialize the scanner when the modal is shown
        html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader",
            { fps: 10, showTorchButtonIfSupported: true, qrbox: {width: 250, height: 250} },
            /* verbose= */ false);
            
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    });

    scannerModal.addEventListener('hidden.bs.modal', function () {
        // Stop the scanner when the modal is hidden to release the camera
        if (html5QrcodeScanner) {
            html5QrcodeScanner.clear().catch(error => {
                console.error("Failed to clear html5QrcodeScanner. ", error);
            });
        }
        document.getElementById('qr-reader-results').innerText = "";
    });

    function onScanSuccess(decodedText, decodedResult) {
        // Show result and stop scanning
        document.getElementById('qr-reader-results').innerText = "QR Code detected: " + decodedText + "\nRedirecting...";
        
        if (html5QrcodeScanner) {
            html5QrcodeScanner.clear();
        }
        
        // Redirect to the scan lookup route using the scanned barcode
        setTimeout(() => {
            window.location.href = '/stock/scan/' + encodeURIComponent(decodedText);
        }, 1000);
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // console.warn(`Code scan error = ${error}`);
    }
});
</script>
@endpush
