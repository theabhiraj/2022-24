$(document).ready(function() {
    $('#brandName').change(function() {
        var brand_id = $(this).val();
        $.ajax({
            url: 'fetch.php',
            type: 'POST',
            data: {
                brand_id: brand_id
            },
            dataType: 'json',
            success: function(data) {
                var modelOptions = '<option value="">Select Model</option>';
                $('#modelName').html(modelOptions);
                $('#purchaseDate').attr('min', ''); // Reset min date
                $('#purchaseDate').attr('max', new Date().toISOString().split('T')[0]); // Max date is today

                $.each(data, function(key, value) {
                    modelOptions += '<option value="' + value.modelsName + '" data-launch-date="' + value.launchDate + '">' + value.modelsName + '</option>';
                });
                $('#modelName').html(modelOptions);
            }
        });
    });

    // Conditions
    $('#purchaseDate').change(function() {
        var purchaseDate = new Date($(this).val());
        var today = new Date();
        var oneYearAgo = new Date(today.setFullYear(today.getFullYear() - 1));

        if (purchaseDate < oneYearAgo) {
            $('#condition option[value="Like New"]').prop('disabled', true);
        } else {
            $('#condition option[value="Like New"]').prop('disabled', false);
        }
    });

    $('#modelName').change(function() {
        var launchDate = $(this).find(':selected').data('launch-date');
        if (launchDate) {
            $('#purchaseDate').attr('min', launchDate);
        }
    });
});