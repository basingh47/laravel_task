<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
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
        $startDate = '2025-06-02';
        $endDate = '2025-06-14';
        function findWeeks($startDate, $endDate): array
        {
            $week_data = [];
            $start = \Carbon\Carbon::parse($startDate)->startOfWeek();
            $end = \Carbon\Carbon::parse($endDate)->endOfWeek();

            while ($start->lte($end)) {
                $weekStart = $start->copy();
                $weekEnd = $start->copy()->endOfWeek();
                $week_data[] = [
                    'start' => $weekStart->format('Y-m-d'),
                    'end' => $weekEnd->format('Y-m-d'),
                ];
                $start->addWeek();
            }
            return $week_data;
        }
        $weeks = findWeeks($startDate, $endDate);
        // dd($weeks);
        $data = [];
        foreach ($weeks as $key => $week) {
            $usersOrders = DB::table('products')
                ->join('waste_products', 'products.product_id', '=', 'waste_products.product_id')
                ->join('purchase_products', 'products.product_id', '=', 'purchase_products.product_id')
                ->select(
                    'products.product_name',
                    'purchase_products.qty',
                    'purchase_products.date',
                    DB::raw('SUM(COALESCE(waste_products.throwable_qty,0)) as wasteqty'),
                )
                ->whereBetween('purchase_products.date', [$week['start'], $week['end']])
                ->groupBy('products.product_id', 'products.product_name', 'purchase_products.qty', 'purchase_products.date')
                ->orderBy('purchase_products.date', 'asc')
                ->get();
                $userData = $usersOrders->groupBy('date');
                $data[$key+1]=$userData;
        }
        // dd($data);

        // dd($information);
        //  dd($rs);
        //  dd($usersOrders->toArray());
        // $pdf = PDF::loadView('reportpdf', ['userData' => $data]);

        // return $pdf->download('Data.pdf');
        return view('reportpdf', ['data' => $data, 'weeks' => $weeks]);
    }
}
