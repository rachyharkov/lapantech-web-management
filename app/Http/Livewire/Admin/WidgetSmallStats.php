<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use App\Models\PostComment;
use Livewire\Component;
use App\Models\Visitor;
use Carbon\Carbon;

class WidgetSmallStats extends Component
{

    protected $listeners = [
        'getGrowthPercentage'
    ];

    public function render()
    {
        return view('livewire.admin.widget-small-stats');
    }

    public function getGrowthPercentage() {
        $countPostLast7Days = [];
        for ($i = 7; $i >= 1; $i--) {
            $countPostLast7Days[] = Post::whereDay('created_at', Carbon::now()->subDays($i)->day)->where('post_status', ['published', 'draft'])->count();
        }

        $countCommentLast7Days = [];
        for ($i = 7; $i >= 1; $i--) {
            $countCommentLast7Days[] = PostComment::whereDay('created_at', Carbon::now()->subDays($i)->day)->count();
        }

        $growthPostPercentageFromTwoDaysAgoUntilYesterday = !empty($countPostLast7Days[5]) ? ($countPostLast7Days[6] - $countPostLast7Days[5]) / $countPostLast7Days[5] * 100 : 0;
        $growthCommentPercentageFromTwoDaysAgoUntilYesterday = !empty($countCommentLast7Days[5]) ? ($countCommentLast7Days[6] - $countCommentLast7Days[5]) / $countCommentLast7Days[5] * 100 : 0;

        $returnthispls = [
            [
                'backgroundColor' => 'rgba(0, 184, 216, 0.1)',
                'borderColor' => 'rgb(0, 184, 216)',
                'data' => $countPostLast7Days,
                'percentageGrowth' => $growthPostPercentageFromTwoDaysAgoUntilYesterday
            ],
            [
                'backgroundColor' => 'rgba(23,198,113,0.1)',
                'borderColor' => 'rgb(23,198,113)',
                'data' => [20, 20, 5, 5, 5, 20, 20],
                'percentageGrowth' => 20
            ],
            [
                'backgroundColor' => 'rgba(255,180,0,0.1)',
                'borderColor' => 'rgb(255,180,0)',
                'data' => $countCommentLast7Days,
                'percentageGrowth' => $growthCommentPercentageFromTwoDaysAgoUntilYesterday
            ],

            [
                'backgroundColor' => 'rgba(255,65,105,0.1)',
                'borderColor' => 'rgb(255,65,105)',
                'data' => [20, 20, 5, 5, 5, 20, 20],
                'percentageGrowth' => 0
            ],
            [
                'backgroundColor' => 'rgb(0,123,255,0.1)',
                'borderColor' => 'rgb(0,123,255)',
                'data' => [20, 20, 5, 5, 5, 20, 20],
                'percentageGrowth' => 0
            ]
        ];

        return $returnthispls;
    }
}

