<?php

namespace App\Exports;

use App\Models\Product;
use App\Models\Transactions;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransactionExport implements WithStyles,FromView,WithColumnWidths,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function styles(Worksheet $sheet)
    {
        return [
            1    => [
                'font' => ['bold' => true],
                'borders' => [
                    'allBorders' => ['borderStyle' => Border::BORDER_DASHED]]
            ],  

        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,
            'D' => 20            
        ];
    }
    public function view() :View
    {
        $transaction = Transactions::get();
        $transaction->map(function($transaction) {
            $data =  array();
            $decode = json_decode($transaction->products);
            foreach ($decode as $value) {
                $product = Product::where("id",$value->product_id)->first();
                $product['pieces'] = $value->pieces;
                array_push($data,$product);
            }
            return  $transaction->products = $data;;
        });
       
        return view('contents.reports.export_income', [
            'transactions' => $transaction,
        ]);
    }
}
