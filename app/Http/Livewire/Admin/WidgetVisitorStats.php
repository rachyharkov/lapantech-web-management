<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Visitor;
use Carbon\Carbon;


class WidgetVisitorStats extends Component
{
    public $chartData;
    public $dateRange;

    protected $listeners = [
        'getLatestVisitorReport',
        'getDateRangeVisitorReport',
        'getVisitorReport'
    ];

    public function mount()
    {
        $this->getLatestVisitorReport();
    }

    public function render()
    {
        return view('livewire.admin.widget-visitor-stats');
    }

    public function getLatestVisitorReport()
    {
        $visitorCurrentMonth = Visitor::selectRaw('count(*) as count, date(created_at) as date')
            ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->groupBy('date')
            ->get();

        $visitorsPreviousMonth = Visitor::selectRaw('count(*) as count, date(created_at) as date')
            ->whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])
            ->groupBy('date')
            ->get();

        $visitors = collect();
        for ($i = 1; $i <= Carbon::now()->daysInMonth; $i++) {
            $visitors->push([
                'date' => Carbon::now()->startOfMonth()->addDays($i - 1)->format('Y-m-d'),
                'count' => $visitorCurrentMonth->where('date', Carbon::now()->startOfMonth()->addDays($i - 1)->format('Y-m-d'))->first()['count'] ?? 0,
                'count_previous' => $visitorsPreviousMonth->where('date', Carbon::now()->subMonth()->startOfMonth()->addDays($i - 1)->format('Y-m-d'))->first()['count'] ?? 0,
            ]);
        }

        $data = [
            'labels' => $visitors->pluck('date'),
            'datasets' => [
                [
                    'label' => 'Current Month',
                    'data' => $visitors->pluck('count'),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                ],
                [
                    'label' => 'Previous Month',
                    'data' => $visitors->pluck('count_previous'),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1,
                ],
            ]
        ];

        return $data;
    }

    public function getDateRangeVisitorReport($startDate, $endDate)
    {

        $startDate = new Carbon($startDate);
        $endDate = new Carbon($endDate);

        $visitorCurrentMonth = Visitor::selectRaw('count(*) as count, date(created_at) as date')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->get();

        $visitors = collect();

        $days = Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate)) + 1;
        for ($i = 1; $i <= $days; $i++) {
            $visitors->push([
                'date' => Carbon::parse($startDate)->addDays($i - 1)->format('Y-m-d'),
                'count' => $visitorCurrentMonth->where('date', Carbon::parse($startDate)->addDays($i - 1)->format('Y-m-d'))->first()['count'] ?? 0,
            ]);
        }

        $data = [
            'labels' => $visitors->pluck('date'),
            'datasets' => [
                [
                    'label' => 'Visitor',
                    'data' => $visitors->pluck('count'),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                ],
            ]
        ];

        return $data;
    }

    public function getVisitorReport() {
        dd('test');
    }
}
