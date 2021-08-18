@extends('layouts.app')

@section('customStyle') 
<style>
    
</style>
@endsection

@section('content')
<div>
    <h1 style="Sales Estimate-align : center background-color: grey;">Sales Estimate</h1> <hr>
    <div class="row">
        <form action="" method="POST" enctype='multipart/form-data' autocomplete="off"> @csrf
            <div class="col-sm-12">
                <h3>General</h3><hr>
                <div class="col-sm-6">
                    <label>	Sales Order Number :</label> @if (!empty($salesOrderData)) {{ $salesOrderData['order_number'] }} @else XXXXXXXXXX @endif <br>
    
                    <label>	Receiver Code</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['receiver_code'] }}" 
                    @elseif(!empty(old('receiver_code'))) value="{{ old('receiver_code') }}"
                    @endif name="receiver_code"> <br>
    
                    <label>	Receiver Name</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['receiver_name'] }}" 
                    @elseif(!empty(old('receiver_name'))) value="{{ old('receiver_name') }}"
                    @endif name="receiver_name"> <br>
                </div>

                <div class="col-sm-6">
                    <label>	Sales Order Date</label>
                    <input type="date" @if (!empty($salesOrderData)) value="{{ $salesOrderData['order_date'] }}" 
                    @elseif(!empty(old('order_date'))) value="{{ old('order_date') }}"
                    @endif name="order_date">
                    <br>
                    <label>	Expected Delivery Date</label>
                    <input type="date" @if (!empty($salesOrderData)) value="{{ $salesOrderData['expected_delivery_date'] }}" 
                    @elseif(!empty(old('expected_delivery_date'))) value="{{ old('expected_delivery_date') }}"
                    @endif name="expected_delivery_date">
                    <br>
                    <label>	Edited Versions:</label> @if (!empty($salesOrderData)) {{ $salesOrderData['edited_version'] + 1 }} @else 1 @endif
                    <br>
                    <label>	Receiver purches order No</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['receiver_purchase_order_number'] }}" 
                    @elseif(!empty(old('receiver_purchase_order_number'))) value="{{ old('receiver_purchase_order_number') }}"
                    @endif name="receiver_purchase_order_number">
                    <br>
                    <label>	Sales Person</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['sales_person'] }}" 
                    @elseif(!empty(old('sales_person'))) value="{{ old('sales_person') }}"
                    @endif name="sales_person"> <br>

                    <label>	Created By</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['created_by'] }}" 
                    @elseif(!empty(old('created_by'))) value="{{ old('created_by') }}"
                    @endif name="created_by"> <br>
                    
                    <label>	Status</label>
                    <select name="status">
                        <option value="">-Select-</option>
                        <option @if (!empty($salesOrderData) && $salesOrderData['status'] == "1") selected 
                        @elseif(!empty(old('status')) && old('status') == "1" ) selected @endif value="1">Active</option>
                        <option @if (!empty($salesOrderData) && $salesOrderData['status'] == "0") selected 
                        @elseif(!empty(old('status')) && old('status') == "0" ) selected @endif value="0">Inactive</option>
                    </select> <br>

                    <label>	Location</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['location'] }}" 
                    @elseif(!empty(old('location'))) value="{{ old('location') }}"
                    @endif name="location"> <br>

                </div>
            </div>

            <div class="col-sm-12">
                <h3>Billing Details</h3><hr>
                <div class="col-sm-6">
                    <label>	Address</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['bill_address1'] }}" 
                    @elseif(!empty(old('bill_address1'))) value="{{ old('bill_address1') }}"
                    @endif name="bill_address1" id="bill_address1"> <br>

                    <label>	Address2</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['bill_address2'] }}" 
                    @elseif(!empty(old('bill_address2'))) value="{{ old('bill_address2') }}"
                    @endif name="bill_address2" id="bill_address2"> <br>

                    <label>	Postal Code</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['bill_postal_code'] }}" 
                    @elseif(!empty(old('bill_postal_code'))) value="{{ old('bill_postal_code') }}"
                    @endif name="bill_postal_code" id="bill_postal_code"> <br>

                    <label>	City</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['bill_city'] }}" 
                    @elseif(!empty(old('bill_city'))) value="{{ old('bill_city') }}"
                    @endif name="bill_city" id="bill_city"> <br>

                    <label>	State</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['bill_state'] }}" 
                    @elseif(!empty(old('bill_state'))) value="{{ old('bill_state') }}"
                    @endif name="bill_state" id="bill_state"> <br>

                    <label>	Country</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['bill_country'] }}" 
                    @elseif(!empty(old('bill_country'))) value="{{ old('bill_country') }}"
                    @endif name="bill_country" id="bill_country"> <br>
                    
                    <label>	GSTIN</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['bill_gstin'] }}" 
                    @elseif(!empty(old('bill_gstin'))) value="{{ old('bill_gstin') }}"
                    @endif name="bill_gstin" id="bill_gstin"> <br>

                    <label>	PAN</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['bill_pan'] }}" 
                    @elseif(!empty(old('bill_pan'))) value="{{ old('bill_pan') }}"
                    @endif name="bill_pan" id="bill_pan"> <br>

                    <label>	VAT</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['bill_vat'] }}" 
                    @elseif(!empty(old('bill_vat'))) value="{{ old('bill_vat') }}"
                    @endif name="bill_vat" id="bill_vat"> <br>

                    <label>	FSSAI</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['bill_fssai'] }}" 
                    @elseif(!empty(old('bill_fssai'))) value="{{ old('bill_fssai') }}"
                    @endif name="bill_fssai" id="bill_fssai"> <br>

                    <label>	Contact</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['bill_contact'] }}" 
                    @elseif(!empty(old('bill_contact'))) value="{{ old('bill_contact') }}"
                    @endif name="bill_contact" id="bill_contact"> <br>

                    <label>	Contact Number</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['bill_contact_number'] }}" 
                    @elseif(!empty(old('bill_contact_number'))) value="{{ old('bill_contact_number') }}"
                    @endif name="bill_contact_number" id="bill_contact_number"> <br>

                    <label>	Mobile Number</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['bill_mobile_number'] }}" 
                    @elseif(!empty(old('bill_mobile_number'))) value="{{ old('bill_mobile_number') }}"
                    @endif name="bill_mobile_number" id="bill_mobile_number"> <br>

                    <label>	Email</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['bill_email'] }}" 
                    @elseif(!empty(old('bill_email'))) value="{{ old('bill_email') }}"
                    @endif name="bill_email" id="bill_email"> <br>
                </div>

                <div class="col-sm-6">
                    <label>	Receiver Type</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['receiver_type'] }}" 
                    @elseif(!empty(old('receiver_type'))) value="{{ old('receiver_type') }}"
                    @endif name="receiver_type"> <br>
                    
                    <label>	Receiver Group</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['receiver_group'] }}" 
                    @elseif(!empty(old('receiver_group'))) value="{{ old('receiver_group') }}"
                    @endif name="receiver_group"> <br>

                    <label>	Sales Estimate Reference</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['estimate_reference'] }}" 
                    @elseif(!empty(old('estimate_reference'))) value="{{ old('estimate_reference') }}"
                    @endif name="estimate_reference"> <br>
                    
                    <label>	Expiry</label>
                    <input type="date" @if (!empty($salesOrderData)) value="{{ $salesOrderData['expiry'] }}" 
                    @elseif(!empty(old('expiry'))) value="{{ old('expiry') }}"
                    @endif name="expiry">
                </div>

            </div>

            <div class="col-sm-12">
                <h3>Shipping Details</h3><hr>
                <div class="col-sm-6">
                    <input type="checkbox" onchange="sameAsBilling();" @if (!empty($salesOrderData) && $salesOrderData['is_shipping_same_billing'] == 'Y')
                    checked @endif name="is_shipping_same_billing" id="is-shipping-same-billing" value="Y"> <label>	As same as Billing</label>
                </div>
                <div class="col-sm-6">
                    <label>	Address</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['ship_address1'] }}" 
                    @elseif(!empty(old('ship_address1'))) value="{{ old('ship_address1') }}"
                    @endif name="ship_address1" id="ship_address1"> <br>

                    <label>	Address2</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['ship_address2'] }}" 
                    @elseif(!empty(old('ship_address2'))) value="{{ old('ship_address2') }}"
                    @endif name="ship_address2" id="ship_address2"> <br>

                    <label>	Postal Code</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['ship_postal_code'] }}" 
                    @elseif(!empty(old('ship_postal_code'))) value="{{ old('ship_postal_code') }}"
                    @endif name="ship_postal_code" id="ship_postal_code"> <br>

                    <label>	City</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['ship_city'] }}" 
                    @elseif(!empty(old('ship_city'))) value="{{ old('ship_city') }}"
                    @endif name="ship_city" id="ship_city"> <br>

                    <label>	State</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['ship_state'] }}" 
                    @elseif(!empty(old('ship_state'))) value="{{ old('ship_state') }}"
                    @endif name="ship_state" id="ship_state"> <br>

                    <label>	Country</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['ship_country'] }}" 
                    @elseif(!empty(old('ship_country'))) value="{{ old('ship_country') }}"
                    @endif name="ship_country" id="ship_country"> <br>
                    
                    <label>	GSTIN</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['ship_gstin'] }}" 
                    @elseif(!empty(old('ship_gstin'))) value="{{ old('ship_gstin') }}"
                    @endif name="ship_gstin" id="ship_gstin"> <br>

                    <label>	PAN</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['ship_pan'] }}" 
                    @elseif(!empty(old('ship_pan'))) value="{{ old('ship_pan') }}"
                    @endif name="ship_pan" id="ship_pan"> <br>

                    <label>	VAT</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['ship_vat'] }}" 
                    @elseif(!empty(old('ship_vat'))) value="{{ old('ship_vat') }}"
                    @endif name="ship_vat" id="ship_vat"> <br>

                    <label>	FSSAI</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['ship_fssai'] }}" 
                    @elseif(!empty(old('ship_fssai'))) value="{{ old('ship_fssai') }}"
                    @endif name="ship_fssai" id="ship_fssai"> <br>

                    <label>	Contact</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['ship_contact'] }}" 
                    @elseif(!empty(old('ship_contact'))) value="{{ old('ship_contact') }}"
                    @endif name="ship_contact" id="ship_contact"> <br>

                    <label>	Contact Number</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['ship_contact_number'] }}" 
                    @elseif(!empty(old('ship_contact_number'))) value="{{ old('ship_contact_number') }}"
                    @endif name="ship_contact_number" id="ship_contact_number"> <br>

                    <label>	Mobile Number</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['ship_mobile_number'] }}" 
                    @elseif(!empty(old('ship_mobile_number'))) value="{{ old('ship_mobile_number') }}"
                    @endif name="ship_mobile_number" id="ship_mobile_number"> <br>

                    <label>	Email</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['ship_email'] }}" 
                    @elseif(!empty(old('ship_email'))) value="{{ old('ship_email') }}"
                    @endif name="ship_email" id="ship_email"> <br>
                </div>
            </div>

            <div class="col-sm-12 container">
                <h3>Actions</h3><hr>
                <input type="hidden" id="total-item-count" name="total_item_count" @if (!empty($salesOrderData['sales_order_items'])) value="{{ count($salesOrderData['sales_order_items']) }}" @endif >
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Item Name</th>
                            <th>Item Code</th>
                            <th>Item Attribute</th>
                            <th>Storage Code</th>
                            <th>Quantity</th>
                            <th>Unit of measure</th>
                            <th>Unit price (Ex. Tax)</th>
                            <th>Tax Group</th>
                            <th>Line Discount %</th>
                            <th>Line Amount (Ex. Tax)</th>
                            <th>CGST</th>
                            <th>SGST</th>
                            <th>Line Amount</th>
                            <th>Sublocation</th>
                            <th>Receiver group</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="add-more-action">
                        @php $itemSlNumber = 0; @endphp
                        @if (!empty($salesOrderData['sales_order_items']) && count($salesOrderData['sales_order_items']))
                            @foreach ($salesOrderData['sales_order_items'] as $itemData)
                                <tr class="close-sl-{{ ++$itemSlNumber }}">
                                    <td>{{ $itemSlNumber }}</td>
                                    <td><input type='text' name='item_name[]' value="{{ $itemData['item_name'] }}"></td>
                                    <td><input type='text' name='item_code[]' value="{{ $itemData['item_code'] }}"></td>
                                    <td><input type='text' name='item_attribute[]' value="{{ $itemData['item_attribute'] }}"></td>
                                    <td><input type='text' name='storage_code[]' value="{{ $itemData['storage_code'] }}"></td>
                                    <td><input type='number' min='1' name='quantity[]' value="{{ $itemData['quantity'] }}"></td>
                                    <td><input type='text' name='unit_measure[]' value="{{ $itemData['unit_measure'] }}"></td>
                                    <td><input type='number' min='1' name='unit_price_ex_tax[]' value="{{ $itemData['unit_price_ex_tax'] }}"></td>
                                    <td><input type='text' name='tax_group[]' value="{{ $itemData['tax_group'] }}"></td>
                                    <td><input type='number' min='0' max='100' name='line_discount_percent[]' value="{{ $itemData['line_discount_percent'] }}"></td>
                                    <td><input type='number' min='1' name='line_amount_ex_tax[]' value="{{ $itemData['line_amount_ex_tax'] }}"></td>
                                    <td><input type='number' min='0' max='100' name='item_cgst[]' value="{{ $itemData['cgst'] }}"></td>
                                    <td><input type='number' min='0' max='100' name='item_sgst[]' value="{{ $itemData['sgst'] }}"></td>
                                    <td><input type='number' min='1' name='line_amount[]' value="{{ $itemData['line_amount'] }}"></td>
                                    <td><input type='text' name='sub_location[]' value="{{ $itemData['sub_location'] }}"></td>
                                    <td><input type='text' name='item_receiver_group[]' value="{{ $itemData['receiver_group'] }}"></td>
                                    <td><button type='button' onclick='removeSalesItem({{$itemSlNumber}});'><i class='fa fa-times' aria-hidden='true'></i></button></td>
                                </tr>
                            @endforeach
                        @endif
                        
                    </tbody>
                </table>
                <button type="button" onclick="addMoreItem();">Add item+</button>
                <hr>
            </div>

            <div class="col-sm-12">
                <div class="col-sm-6">
                    <label>	Subtotal(Ex. Tax)</label>
                    <input type='number' min='1' @if (!empty($salesOrderData)) value="{{ $salesOrderData['subtotal_ex_tax'] }}" 
                    @elseif(!empty(old('subtotal_ex_tax'))) value="{{ old('subtotal_ex_tax') }}"
                    @endif name="subtotal_ex_tax"> <br>

                    <label>	Invoice Discount Amount</label>
                    <input type='number' min='1' @if (!empty($salesOrderData)) value="{{ $salesOrderData['inv_discount_amount'] }}" 
                    @elseif(!empty(old('inv_discount_amount'))) value="{{ old('inv_discount_amount') }}"
                    @endif name="inv_discount_amount"> <br>

                    <label>	Invoice Discount %</label>
                    <input type='number' min='0' max="100" @if (!empty($salesOrderData)) value="{{ $salesOrderData['inv_discount_present'] }}" 
                    @elseif(!empty(old('inv_discount_present'))) value="{{ old('inv_discount_present') }}"
                    @endif name="inv_discount_present"> <br>

                    <label>	Currency</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['currency'] }}" 
                    @elseif(!empty(old('currency'))) value="{{ old('currency') }}"
                    @endif name="currency"> <br>

                    <label>	Expected Invoice Date</label>
                    <input type="date" @if (!empty($salesOrderData)) value="{{ $salesOrderData['expected_inv_date'] }}" 
                    @elseif(!empty(old('expected_inv_date'))) value="{{ old('expected_inv_date') }}"
                    @endif name="expected_inv_date"> <br>

                    <label>	Payment Terms</label>
                    <input type="text" @if (!empty($salesOrderData)) value="{{ $salesOrderData['payment_terms'] }}" 
                    @elseif(!empty(old('payment_terms'))) value="{{ old('payment_terms') }}"
                    @endif name="payment_terms"> <br>

                    <label>	Mode Of Payment</label>
                    <select name="payment_mode">
                        <option value="">--Select--</option>
                        <option @if (!empty($salesOrderData) && $salesOrderData['payment_mode'] == "cash") selected 
                        @elseif(!empty(old('payment_mode')) && old('payment_mode') == "cash" ) selected
                        @endif value="cash">Cash</option>
                        <option @if (!empty($salesOrderData) && $salesOrderData['payment_mode'] == "online") selected 
                        @elseif(!empty(old('payment_mode')) && old('payment_mode') == "online" ) selected
                        @endif value="online">Online</option>
                    </select><br>

                    <label>	Payment Discount %</label>
                    <input type='number' min='0' max="100" @if (!empty($salesOrderData)) value="{{ $salesOrderData['payment_discount_percent'] }}" 
                    @elseif(!empty(old('payment_discount_percent'))) value="{{ old('payment_discount_percent') }}"
                    @endif name="payment_discount_percent"> <br>

                    <label>	Payment Discount Date</label>
                    <input type="date" @if (!empty($salesOrderData)) value="{{ $salesOrderData['payment_discount_date'] }}" 
                    @elseif(!empty(old('payment_discount_date'))) value="{{ old('payment_discount_date') }}"
                    @endif name="payment_discount_date"> <br>

                    <label>	Payment Due Date</label>
                    <input type="date" @if (!empty($salesOrderData)) value="{{ $salesOrderData['payment_due_date'] }}" 
                    @elseif(!empty(old('payment_due_date'))) value="{{ old('payment_due_date') }}"
                    @endif name="payment_due_date"> <br>

                </div>

                <div class="col-sm-6">
                    <label>	Total(Ex. Tax)</label>
                    <input type='number' min='1' @if (!empty($salesOrderData)) value="{{ $salesOrderData['total_ex_tax'] }}" 
                    @elseif(!empty(old('total_ex_tax'))) value="{{ old('total_ex_tax') }}"
                    @endif name="total_ex_tax"> <br>

                    <label>	CGST</label>
                    <input type='number' min='0' max="100" @if (!empty($salesOrderData)) value="{{ $salesOrderData['cgst'] }}" 
                    @elseif(!empty(old('cgst'))) value="{{ old('cgst') }}"
                    @endif name="cgst"> <br>

                    <label>	SGST</label>
                    <input type='number' min='0' max="100" @if (!empty($salesOrderData)) value="{{ $salesOrderData['sgst'] }}" 
                    @elseif(!empty(old('sgst'))) value="{{ old('sgst') }}"
                    @endif name="sgst"> <br>

                    <label>	Total(Inc. Tax)</label>
                    <input type='number' min='1' @if (!empty($salesOrderData)) value="{{ $salesOrderData['total_inc_tax'] }}" 
                    @elseif(!empty(old('total_inc_tax'))) value="{{ old('total_inc_tax') }}"
                    @endif name="total_inc_tax"> <br>
                    <br><br>
                    <label>	Attachment</label>
                    <input type="file" name="sales_estimate_attachment">
                    @if (!empty($salesOrderData['attachment_data']))
                        <br>
                        <img height="350px" width="500px" src="{{ asset(ATTACHMENT_FILE_PATH . "/" . $salesOrderData['attachment_data']['file_unique_name'])}}" alt="image">
                    @endif
                </div>
            </div>

            <div class="col-sm-12">
                <h3>Pre-payment Details</h3><hr>
                <div class="col-sm-6">
                    <label>	Pre Payment %</label>
                    <input type='number' min='1' max="100" @if (!empty($salesOrderData)) value="{{ $salesOrderData['pre_payment_percent'] }}" 
                    @elseif(!empty(old('pre_payment_percent'))) value="{{ old('pre_payment_percent') }}"
                    @endif name="pre_payment_percent"> <br>

                    <label>	Schedule</label>
                    <input type="date"  @if (!empty($salesOrderData)) value="{{ $salesOrderData['schedule'] }}" 
                    @elseif(!empty(old('schedule'))) value="{{ old('schedule') }}"
                    @endif name="schedule">
                    <br>

                    <label>	Due Date 1</label>
                    <input type="date"  @if (!empty($salesOrderData)) value="{{ $salesOrderData['due_date1'] }}" 
                    @elseif(!empty(old('due_date1'))) value="{{ old('due_date1') }}"
                    @endif name="due_date1">
                    <br>

                    <label>	Due Date 2</label>
                    <input type="date"  @if (!empty($salesOrderData)) value="{{ $salesOrderData['due_date2'] }}" 
                    @elseif(!empty(old('due_date2'))) value="{{ old('due_date2') }}"
                    @endif name="due_date2">
                    <br>
                </div>
            </div>

            <div class="col-sm-12">
                <button type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('customScript')
<script>
    var slNumber = salesItemCount = "{{ $itemSlNumber }}";
    function addMoreItem() {
        slNumber++;
        salesItemCount++;
        let addMoreGtml = "<tr class='close-sl-"+slNumber+"'>";
            addMoreGtml += "<td>"+slNumber+"</td>";
            addMoreGtml += "<td><input type='text' name='item_name[]'></td>";
            addMoreGtml += "<td><input type='text' name='item_code[]'></td>";
            addMoreGtml += "<td><input type='text' name='item_attribute[]'></td>";
            addMoreGtml += "<td><input type='text' name='storage_code[]'></td>";
            addMoreGtml += "<td><input type='number' min='1' name='quantity[]'></td>";
            addMoreGtml += "<td><input type='text' name='unit_measure[]'></td>";
            addMoreGtml += "<td><input type='number' min='1' name='unit_price_ex_tax[]'></td>";
            addMoreGtml += "<td><input type='text' name='tax_group[]'></td>";
            addMoreGtml += "<td><input type='number' min='0' max='100' name='line_discount_percent[]'></td>";
            addMoreGtml += "<td><input type='number' min='1' name='line_amount_ex_tax[]'></td>";
            addMoreGtml += "<td><input type='number' min='0' max='100' name='item_cgst[]'></td>";
            addMoreGtml += "<td><input type='number' min='0' max='100' name='item_sgst[]'></td>";
            addMoreGtml += "<td><input type='number' min='1' name='line_amount[]'></td>";
            addMoreGtml += "<td><input type='text' name='sub_location[]'></td>";
            addMoreGtml += "<td><input type='text' name='item_receiver_group[]'></td>";
            addMoreGtml += "<td><button type='button' onclick='removeSalesItem("+slNumber+");'><i class='fa fa-times' aria-hidden='true'></i></button></td>";
        addMoreGtml += "</tr>";

        $("#total-item-count").val(salesItemCount);
        $(".add-more-action").append(addMoreGtml);
        return;
    }

    function removeSalesItem(serialNumber) {
        $(".close-sl-"+serialNumber).remove();
        salesItemCount--;
        $("#total-item-count").val(salesItemCount);
    }
</script>
@endsection
