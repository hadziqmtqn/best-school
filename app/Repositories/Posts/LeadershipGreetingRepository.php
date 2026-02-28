<?php

namespace App\Repositories\Posts;

use App\Models\LeadershipGreeting;
use Illuminate\Support\Str;

class LeadershipGreetingRepository
{
    public function index(): array
    {
        $leadershipGreeting = LeadershipGreeting::with('user.employeePositionActive.personnelDepartment')
            ->first();

        // 1. Bersihkan tag HTML lainnya tapi biarkan <p> untuk penanda
        // Atau langsung pecah berdasarkan pola </p><p>
        $paragraphs = preg_split('/<\/p>\s*<p>/', ($leadershipGreeting?->message ?? ''));

        // 2. Ambil Paragraf Pertama & bersihkan sisa tag-nya
        $firstParagraph = isset($paragraphs[0]) ? strip_tags($paragraphs[0]) : '';

        // 3. Ambil Sisanya, gabungkan kembali, dan bersihkan tag-nya
        array_shift($paragraphs); // Hapus paragraf pertama dari array
        $remainingText = implode(' ', $paragraphs);
        $limitedParagraph = $remainingText ? '...' . strip_tags($remainingText) : '';

        return [
            'headMaster' => $leadershipGreeting?->user?->name,
            'personnelDepartment' => $leadershipGreeting?->user?->employeePositionActive?->personnelDepartment?->name,
            'avatar' => $leadershipGreeting?->user?->hasMedia('avatar') ? $leadershipGreeting->user->getFirstTemporaryUrl(now()->addDay(), 'avatar') : asset('assets/headmaster.png'),
            'title' => $leadershipGreeting?->title,
            'firstParagraph' => $firstParagraph,
            'limitedParagraph' => Str::limit($limitedParagraph, 200)
        ];
    }
}
