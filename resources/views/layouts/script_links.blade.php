<!-- Latest compiled and minified JavaScript -->
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
    window.setTimeout(function () {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 3000);

    function sameAsBilling() {
        var isChecked = document.getElementById("is-shipping-same-billing").checked;
		if (isChecked){
            $("#ship_address1").val($("#bill_address1").val());
            $("#ship_address2").val($("#bill_address2").val());
            $("#ship_postal_code").val($("#bill_postal_code").val());
            $("#ship_city").val($("#bill_city").val());
            $("#ship_state").val($("#bill_state").val());
            $("#ship_country").val($("#bill_country").val());
            $("#ship_gstin").val($("#bill_gstin").val());
            $("#ship_pan").val($("#bill_pan").val());
            $("#ship_vat").val($("#bill_vat").val());
            $("#ship_fssai").val($("#bill_fssai").val());
            $("#ship_contact").val($("#bill_contact").val());
            $("#ship_contact_number").val($("#bill_contact_number").val());
            $("#ship_mobile_number").val($("#bill_mobile_number").val());
            $("#ship_email").val($("#bill_email").val());
        }
    }
</script>