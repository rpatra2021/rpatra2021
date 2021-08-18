<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SalesEstimate;
use App\Models\EstimateItems;
use Illuminate\Support\Facades\Input;

class SalesEstimateController extends Controller
{
    public function saveSalesEstimateData(Request $request, $estimateId = null)
    {
        $SalesEstimateData = SalesEstimate::with(['sales_estimate_items','attachment_data'])->where("estimate_number", $estimateId)->first();
        if($request->isMethod('post')){
            if (empty($SalesEstimateData)){
                $SalesEstimateData = new SalesEstimate();
                $SalesEstimateData->estimate_number = generate_unique_id();
            } 
            /** General data save */
            $SalesEstimateData = $this->salesEstimateGeneralDataSave($SalesEstimateData, $request);
            /** Billing Address and shipping address save*/
            $SalesEstimateData = $this-> billingAddressSave($SalesEstimateData, $request);
            $SalesEstimateData->is_shipping_same_billing = ($request['is_shipping_same_billing'] == 'Y') ? $request['is_shipping_same_billing'] : 'N';
            $SalesEstimateData = $this-> shippingAddressSave($SalesEstimateData, $request);
            /** Sales Item save */
            $this->saveSalesEstimateItems($SalesEstimateData['id'], $request, $request['total_item_count']);
            /** Payment Data save */
            $SalesEstimateData = $this->salesEstimatePaymentDataSave($SalesEstimateData, $request);
            if (Input::hasFile('sales_estimate_attachment'))
            {
                $file = $request->file('sales_estimate_attachment');
                $fileData = save_attachment_files($file);
                $SalesEstimateData->attachment_id = $fileData['id'];
            }
            $SalesEstimateData->save();
            return redirect()->back();
        }
        
        return view("web.sales_estimate_form",["salesEstimateData" => $SalesEstimateData]);
    }

    public function salesEstimatePaymentDataSave($model, $requestData)
    {
        
        $model->subtotal_ex_tax = ($requestData['subtotal_ex_tax']) ? $requestData['subtotal_ex_tax'] : 0;
        $model->total_ex_tax = ($requestData['total_ex_tax']) ? $requestData['total_ex_tax'] : 0;
        $model->inv_discount_amount = ($requestData['inv_discount_amount']) ? $requestData['inv_discount_amount'] : 0;
        $model->inv_discount_present = ($requestData['inv_discount_present'])? $requestData['inv_discount_present'] : 0;
        $model->cgst = ($requestData['cgst']) ? $requestData['cgst'] : 0;
        $model->sgst = ($requestData['sgst']) ? $requestData['sgst'] : 0;
        $model->total_inc_tax = ($requestData['total_inc_tax'])? $requestData['total_inc_tax']: 0;
        $model->currency = ($requestData['currency']) ? $requestData['currency'] : null;
        $model->expected_inv_date = ($requestData['expected_inv_date']) ? $requestData['expected_inv_date'] : null;
        $model->payment_terms = ($requestData['payment_terms']) ? $requestData['payment_terms'] : null;
        $model->payment_mode = ($requestData['payment_mode']) ? $requestData['payment_mode'] : "cash";
        $model->payment_discount_percent = ($requestData['payment_discount_percent']) ? $requestData['payment_discount_percent'] : 0;
        $model->payment_discount_date = ($requestData['payment_discount_date']) ? $requestData['payment_discount_date'] : null;
        $model->pre_payment_percent = ($requestData['pre_payment_percent']) ? $requestData['pre_payment_percent'] : 0;
        $model->schedule = ($requestData['schedule']) ? $requestData['schedule'] : null;
        $model->save();
        return $model;
    }

    public function billingAddressSave($model, $requestData)
    {
        $model->bill_address1 = $requestData['bill_address1'];
        $model->bill_address2 = $requestData['bill_address2'];
        $model->bill_postal_code = $requestData['bill_postal_code'];
        $model->bill_city = $requestData['bill_city'];
        $model->bill_state = $requestData['bill_state'];
        $model->bill_country = $requestData['bill_country'];
        $model->bill_gstin = $requestData['bill_gstin'];
        $model->bill_pan = $requestData['bill_pan'];
        $model->bill_vat = $requestData['bill_vat'];
        $model->bill_fssai = $requestData['bill_fssai'];
        $model->bill_contact = $requestData['bill_contact'];
        $model->bill_contact_number = $requestData['bill_contact_number'];
        $model->bill_mobile_number = $requestData['bill_mobile_number'];
        $model->bill_email = $requestData['bill_email'];
        $model->save();
        return $model;
    }

    public function shippingAddressSave($model, $requestData)
    {
        $model->ship_address1 = $requestData['ship_address1'];
        $model->ship_address2 = $requestData['ship_address2'];
        $model->ship_postal_code = $requestData['ship_postal_code'];
        $model->ship_city = $requestData['ship_city'];
        $model->ship_state = $requestData['ship_state'];
        $model->ship_country = $requestData['ship_country'];
        $model->ship_gstin = $requestData['ship_gstin'];
        $model->ship_pan = $requestData['ship_pan'];
        $model->ship_vat = $requestData['ship_vat'];
        $model->ship_fssai = $requestData['ship_fssai'];
        $model->ship_contact = $requestData['ship_contact'];
        $model->ship_contact_number = $requestData['ship_contact_number'];
        $model->ship_mobile_number = $requestData['ship_mobile_number'];
        $model->ship_email = $requestData['ship_email'];
        $model->save();
        return $model;
    }

    public function salesEstimateGeneralDataSave($model, $requestData)
    {
        $model->receiver_code = ($requestData['receiver_code']) ? $requestData['receiver_code'] : null;
        $model->receiver_name = ($requestData['receiver_name']) ? $requestData['receiver_name'] : null;
        $model->estimate_date = ($requestData['estimate_date']) ? $requestData['estimate_date'] : null;
        $model->expected_ordering_date = ($requestData['expected_ordering_date']) ? $requestData['expected_ordering_date'] : null;
        $model->expected_delivery_date = ($requestData['expected_delivery_date']) ? $requestData['expected_delivery_date'] : null;
        $model->edited_version = ($model->edited_version) ? $model->edited_version + 1 : 1;
        $model->sales_person = ($requestData['sales_person']) ? $requestData['sales_person']: null;
        $model->created_by = ($requestData['created_by']) ? $requestData['created_by'] : null;
        $model->status = ($requestData['status']) ? $requestData['status'] : 0;
        $model->location = ($requestData['location']) ? $requestData['location'] : null;
        $model->receiver_type = ($requestData['receiver_type']) ? $requestData['receiver_type'] : null;
        $model->receiver_group = ($requestData['receiver_group']) ? $requestData['receiver_group'] : null;
        $model->expiry = ($requestData['expiry']) ? $requestData['expiry'] : null;
        $model->save();
        return $model;
    }

    public function saveSalesEstimateItems($SalesEstimateId, $requestData, $totalItemCount = 0)
    {
        EstimateItems::where("sales_estimate_id", $SalesEstimateId)->delete();
        for ($i=0; $i < $totalItemCount; $i++) { 
            $estimateItem = new EstimateItems();
            $estimateItem->sales_estimate_id = $SalesEstimateId;
            $estimateItem->item_name = $requestData['item_name'][$i];
            $estimateItem->item_code = $requestData['item_code'][$i];
            $estimateItem->item_attribute = $requestData['item_attribute'][$i];
            $estimateItem->storage_code = $requestData['storage_code'][$i];
            $estimateItem->quantity = $requestData['quantity'][$i];
            $estimateItem->unit_measure = $requestData['unit_measure'][$i];
            $estimateItem->unit_price_ex_tax = $requestData['unit_price_ex_tax'][$i];
            $estimateItem->tax_group = $requestData['tax_group'][$i];
            $estimateItem->line_discount_percent = $requestData['line_discount_percent'][$i];
            $estimateItem->line_amount_ex_tax = $requestData['line_amount_ex_tax'][$i];
            $estimateItem->cgst = $requestData['item_cgst'][$i];
            $estimateItem->sgst = $requestData['item_sgst'][$i];
            $estimateItem->line_amount = $requestData['line_amount'][$i];
            $estimateItem->sub_location = $requestData['sub_location'][$i];
            $estimateItem->receiver_group = $requestData['item_receiver_group'][$i];
            $estimateItem->save();
        }
        return true;
    }

}
