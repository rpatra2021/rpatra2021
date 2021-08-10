<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesEstimate extends Model
{
    protected $table = "tbl_sales_estimates";

    protected $fillable = [
        /** All string */
        "receiver_code", "receiver_name",

        /** estimate_date, expected_ordering_date, expected_delivery_date => datetime; edited_version => tinyint 4  */
        "estimate_date", "expected_ordering_date", "expected_delivery_date", "edited_version",

        /** All string except status => tinyint */
        "sales_person", "created_by", "status", "location",

        /** All string */
        "receiver_type", "receiver_group", "expiry",

        /** All string for Billing Address */
        "bill_address1", "bill_address2", "bill_postal_code", "bill_city", "bill_state", "bill_country", "bill_gstin", "bill_pan", 
        "bill_vat", "bill_fssai", "bill_contact", "bill_contact_number", "bill_mobile_number", "bill_email",

        /** Is the shipping details same as the billing address enum field contains Y/N */
        "is_shipping_same_billing",

        /** All string Shipping Address */
        "ship_address1", "ship_address2", "ship_postal_code", "ship_city", "ship_state", "ship_country", "ship_gstin", "ship_pan", 
        "ship_vat", "ship_fssai", "ship_contact", "ship_contact_number", "ship_mobile_number", "ship_email",

        /** subtotal_ex_tax, total_ex_tax, inv_discount_amount, total_inc_tax => float 10,2, inv_discount_present, cgst, sgst => tinyint,  */
        "subtotal_ex_tax", "total_ex_tax", "inv_discount_amount", "inv_discount_present", "cgst", "sgst", "total_inc_tax",

        /** currency,payment_terms,schedule =>string,  expected_inv_date,payment_discount_date => datetime, payment_mode => enum(Online/cash), 
         * payment_discount_percent,pre_payment_percent => tinyint, attachment_id => integer, 
        */
        "currency", "expected_inv_date", "payment_terms", "payment_mode", "payment_discount_percent", "payment_discount_date", 
        "attachment_id", "pre_payment_percent", "schedule"
    ];

}
