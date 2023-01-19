<?php

namespace App\Http\Livewire\Admin;

use App\Models\Visitor;
use Livewire\Component;

class WidgetVisitorDeviceStats extends Component
{
    public $chartData;

    protected $listeners = [
        'refreshVisitorDeviceStats'
    ];

    public function mount()
    {
        $this->refreshVisitorDeviceStats();
    }

    public function render()
    {
        return view('livewire.admin.widget-visitor-device-stats');
    }

    public function refreshVisitorDeviceStats()
    {
        $data = Visitor::selectRaw('device, count(*) as total')
            ->groupBy('device')
            ->get()
            ->toArray();

        $data = [
            'labels' => array_column($data, 'device'),
            'datasets' => [
                [
                    'data' => array_column($data, 'total'),
                    'backgroundColor' => [
                        '#f56954',
                        '#00a65a',
                        '#f39c12',
                        '#00c0ef',
                        '#3c8dbc',
                        '#d2d6de',
                    ],
                ],
            ],
        ];

        return $data;
    }
}
