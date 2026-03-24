<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\SchoolManagements\InstitutionRepository;
use Illuminate\View\View;

class SchoolIdentityController extends Controller
{
    protected InstitutionRepository $institutionRepository;

    /**
     * @param InstitutionRepository $institutionRepository
     */
    public function __construct(InstitutionRepository $institutionRepository)
    {
        $this->institutionRepository = $institutionRepository;
    }

    public function index(): View
    {
        $title = 'Identitas Sekolah';
        $institutions = $this->institutionRepository->identity();

        return \view('home.school-identity.index', compact('title', 'institutions'));
    }
}
