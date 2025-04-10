<?php
// Generate a unique QR code image (you might need a library for this)
$qrCodeImage = 'qrcode.jpg';

// Redirect to the generated QR code image
header("Location: $qrCodeImage");
exit;
?>
