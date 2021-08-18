<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesOrders extends Model
{
    protected $table = "tbl_sales_orders";
    protected $fillable = [
        /** All string */
        "order_number", "receiver_code", "receiver_name",

        /** order_date,expected_delivery_date => date, edited_version => integer length 8, receiver_purchase_order_number=>string */
        "order_date", "expected_delivery_date", "edited_version", "receiver_purchase_order_number",

        /** All string except status => tinyint */
        "sales_person", "created_by", "status", "location",

        /** All string except expiry => date*/
        "receiver_type", "receiver_group", "estimate_reference" ,"expiry",

        /** All string for Billing Address */
        "bill_address1", "bill_address2", "bill_postal_code", "bill_city", "bill_state", "bill_country", "bill_gstin", "bill_pan", 
        "bill_vat", "bill_fssai", "bill_contact", "bill_contact_number", "bill_mobile_number", "bill_email",

        /** Is the shipping details same as the billing address enum field contains Y/N */
        "is_shipping_same_billing",

        /** All string Shipping Address */
        "ship_address1", "ship_address2", "ship_postal_code", "ship_city", "ship_state", "ship_country", "ship_gstin", "ship_pan", 
        "ship_vat", "ship_fssai", "ship_contact", "ship_contact_number", "ship_mobile_number", "ship_email",

        /** subtotal_ex_tax, total_ex_tax, inv_discount_amount, total_inc_tax => float 10,2, inv_discount_present, cgst, sgst => integer length 8,  */
        "subtotal_ex_tax", "total_ex_tax", "inv_discount_amount", "inv_discount_present", "cgst", "sgst", "total_inc_tax",

        /** currency,payment_terms,schedule =>string,  expected_inv_date,payment_discount_date,payment_due_date,due_date1,due_date2 => date, 
         * payment_mode => enum(online/cash), 
         * payment_discount_percent,pre_payment_percent => integer length 8, attachment_id => integer, 
        */
        "currency", "expected_inv_date", "payment_terms", "payment_mode", "payment_discount_percent", "payment_discount_date", "payment_due_date",
        "attachment_id", "pre_payment_percent", "schedule", "due_date1", "due_date2"
    ];

    public function sales_order_items()
    {
        return $this->hasMany('App\Models\SalesOrderItems', 'sales_order_id', 'id');
    }

    public function attachment_data()
    {
        return $this->hasOne('App\Models\AttachmentFiles', 'id', 'attachment_id');
    }

}
