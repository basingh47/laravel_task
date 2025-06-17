<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product;
use App\Models\PurchaseProduct;
use App\Models\WasteProduct;


class ReportPdfController extends Controller
{
    public function index()
    {
        return view("reportpdf");
    }

    public function generatePDF()
    {
        $purchases = PurchaseProduct::with('product')
            ->whereBetween('date', ['2025-06-01', '2025-06-16'])
            ->get();
        // dd($purchases->toArray());
        $data = [];
        $dateRange = [];
        $start = new \DateTime('2025-06-01');
        $end = new \DateTime('2025-06-16');
        while ($start <= $end) {
            $dateRange[] = $start->format('Y-m-d');
            $start->modify('+1 day');
        }
        // dd($dateRange);
        foreach ($dateRange as $date) {
            foreach ($purchases as $purchase) {
                if ($purchase->date == $date) {
                        if (empty($data[$date])) {
                            $data[$date][] = [
                                'product_name' => $purchase->product->product_name,
                                'qty' => $purchase->qty,
                            ];
                        } else {
                            $found = false;
                            foreach ($data[$date] as &$item) {
                                if ($item['product_name'] === $purchase->product->product_name) {
                                    $item['qty'] += $purchase->qty;
                                    $found = true;
                                    break;
                                }
                            }
                            unset($item);
                            if (!$found) {
                                $data[$date][] = [
                                    'product_name' => $purchase->product->product_name,
                                    'qty' => $purchase->qty,
                                ];
                            }
                        }
                    }
            }
        }
        // dd($data);
        // $pdf = PDF::loadView('reportpdf', ['data' => $data]);

        // return $pdf->download('document.pdf');
        return view('reportpdf', ['data' => $data]);
    }
}
