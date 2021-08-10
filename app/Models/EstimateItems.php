<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstimateItems extends Model
{
    protected $table = "tbl_estimate_items";

    protected $fillable = [
        /** 
         * item_name,item_code,item_attribute,storage_code,tax_group,cgst,sgst,sub_location,receiver_group => string 
         * quantity => integer
         * unit_price_ex_tax,line_amount_ex_tax,line_amount => float,
         * line_discount_percent => tinyint
         * 
        */
        "item_name", "item_code", "item_attribute", "storage_code", "quantity", "unit_price_ex_tax", "tax_group", 
        "line_discount_percent", "line_amount_ex_tax", "cgst", "sgst", "line_amount", "sub_location", "receiver_group"
    ];
}
