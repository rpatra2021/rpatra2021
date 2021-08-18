<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesOrderItems extends Model
{
    protected $table = "tbl_order_items";
    protected $fillable = [
        /** 
         * item_name,item_code,item_attribute,storage_code,unit_measure,tax_group,cgst,sgst,sub_location,receiver_group => string 
         * quantity => integer
         * unit_price_ex_tax,line_amount_ex_tax,line_amount => float,
         * line_discount_percent => int length 8
         * 
        */
        "sales_order_id",
        "item_name", "item_code", "item_attribute", "storage_code", "quantity", "unit_measure", "unit_price_ex_tax", "tax_group", 
        "line_discount_percent", "line_amount_ex_tax", "cgst", "sgst", "line_amount", "sub_location", "receiver_group"
    ];

}
