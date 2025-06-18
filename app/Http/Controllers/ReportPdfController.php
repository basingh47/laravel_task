<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection ;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportPdfController extends Controller
{
    public function index()
    {
        return view("reportpdf");
    }

    public function generatePDF()
    {
        $startDate = '2025-06-01';
        $endDate = '2025-06-07';
        $usersOrders  = DB::table('products')
        ->join('waste_products', 'products.product_id', '=', 'waste_products.product_id')
        ->join('purchase_products', 'products.product_id', '=', 'purchase_products.product_id')
        ->select(
            'products.product_name',
            'purchase_products.qty',
            'purchase_products.date',
            DB::raw('SUM(COALESCE(waste_products.throwable_qty, 0)) as wasteqty'),
        )
        ->whereBetween('purchase_products.date', [$startDate, $endDate])
        ->groupBy('products.product_id', 'products.product_name', 'purchase_products.qty', 'purchase_products.date')
        ->orderBy('purchase_products.date','asc')
        ->get();
        $rs = $usersOrders->groupBy('date');
        //  dd($rs);
        //  dd($usersOrders->toArray());
        $pdf = PDF::loadView('reportpdf', ['usersOrders'=>$rs]);

         return $pdf->stream('document.pdf');
        // return view('reportpdf',['usersOrders'=>$rs]);
     }
}
