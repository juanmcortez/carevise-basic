<?php

namespace App\Http\Controllers\Patients;

use Illuminate\View\View;
use App\Models\Patients\Patient;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $patients = Patient::query()
            ->with(['demographic', 'demographic.phone'])
            ->join('demographics', 'demographics.id', '=', 'patients.demographic_id')
            ->orderBy('demographics.last_name')
            ->orderBy('demographics.first_name')
            ->orderBy('demographics.middle_name')
            ->select('patients.*')
            ->paginate(config('carevise.pagination.long'));
        return view('pages.patients.list', compact('patients'));
    }

    /**
     * @param  Patient  $patient
     * @return View
     */
    public function show(Patient $patient): View
    {
        return view('pages.patients.show', compact('patient'));
    }
}
