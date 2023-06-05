<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Resume;
use App\Models\SampleProject;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        return view('index', [
            'resume' => Resume::all()->first(),
            'skills' => Skill::all(),
            'sample_projects' => SampleProject::all()
        ]);
    }

    public function details($id)
    {
        return view('protfolio-details');
    }
}
