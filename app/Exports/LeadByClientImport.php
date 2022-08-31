<?php

namespace App\Exports;

use App\Models\Invoices;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeadByClientImport implements FromCollection, WithHeadings
{
    protected $id;
    function __construct($id) {
            $this->id = $id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $invoices = Invoices::where('client_id', '=', $this->id)->get();
        $invoice_data = array();
        foreach($invoices as $invoice){
            $data = [
                'name' => $invoice->name,
                'email' => $invoice->email,                
                'contact' => $invoice->contact,                
                'brand' => $invoice->brands->name,                
                'service' => $invoice->services->name,                
                'currency' => $invoice->currencies->name,                
                'invoice_number' => $invoice->invoice_number,    
                'invoice_date' => $invoice->invoice_date,                
                'sales_agent_id' => $invoice->user->name,                
                'description' => $invoice->description,                  
                'amount' => $invoice->amount,                
                'payment_status' => $invoice->payment_status,            
                'payment_type' => $invoice->payment_type,                
                'custom_package' => $invoice->custom_package,            
                'transaction_id' => $invoice->transaction_id,                
            ];

            array_push($invoice_data, $data);
        }
        return collect($invoice_data);
    }
    public function headings() : array
    {
        return [
            'Name',
            'Email',
            'Contact',
            'Brand',
            'Service',
            'Currency',
            'Invoice Number',
            'Invoice Date',
            'Sales Agent',
            'Description',
            'Amount',
            'Payment Status',
            'Payment Type',
            'Package Name',
            'Transaction Id'
        ];
    }
}