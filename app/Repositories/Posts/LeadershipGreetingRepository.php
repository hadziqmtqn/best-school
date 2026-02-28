<?php

namespace App\Repositories\Posts;

use App\Models\LeadershipGreeting;
use Illuminate\Support\Str;

class LeadershipGreetingRepository
{
    public function index(): array
    {
        $leadershipGreeting = LeadershipGreeting::with([
            'user:id,name',
            'user.employeePositionActive.personnelDepartment'
        ])
            ->first();
        $message = $leadershipGreeting?->message ?? '';

        $limit = 100;

        // Ambil bagian awal dengan limit
        $firstParagraph = Str::limit($message, $limit);

        // Ambil sisa teksnya
        // Jika pesan lebih panjang dari limit, tambahkan "..." di awal sisa teks
        $remainingText = mb_substr($message, $limit);
        $limitedParagraph = $remainingText ? '...' . $remainingText : '';

        return [
            'headMaster' => $leadershipGreeting?->user?->name,
            'personnelDepartment' => $leadershipGreeting?->user?->employeePositionActive?->personnelDepartment?->name,
            'title' => $leadershipGreeting?->title,
            'firstParagraph' => $firstParagraph,
            'limitedParagraph' => Str::limit($limitedParagraph)
        ];
    }
}
