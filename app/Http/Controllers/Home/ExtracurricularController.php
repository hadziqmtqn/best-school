<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\ExtracurricularRequest;
use App\Models\Institution;
use App\Repositories\SchoolManagements\ExtracurricularRepository;
use Illuminate\View\View;

class ExtracurricularController extends Controller
{
    protected ExtracurricularRepository $extracurricularRepository;

    /**
     * @param ExtracurricularRepository $extracurricularRepository
     */
    public function __construct(ExtracurricularRepository $extracurricularRepository)
    {
        $this->extracurricularRepository = $extracurricularRepository;
    }

    public function index(ExtracurricularRequest $request): View
    {
        $title = 'Ekstrakurikuler';
        $extracurriculars = $this->extracurricularRepository->index($request->input('institution-slug'));
        $institutions = Institution::all();

        return \view('home.extracurricular.index', compact('title', 'extracurriculars', 'institutions'));
    }
}
