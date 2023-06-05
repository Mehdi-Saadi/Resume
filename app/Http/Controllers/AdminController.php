<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Resume;
use App\Models\DetailImg;
use App\Models\SampleProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin', [
            'DetailImg' => DetailImg::all(),
        ]);
    }

    public function resume()
    {
        return view('adminResume', [
            'resume' => Resume::all()->first(),
        ]);
    }

    public function updateResume(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'name' => 'required|max:255',
            'iam' => 'required|max:255',
            'about_txt' => 'required|max:1500',
            'about_title' => 'required|max:255',
            'birthday' => 'required|max:255',
            'age' => 'required|numeric|min:10|max:99',
            'phone' => 'required|regex:/(09)[0-9]{9}/|size:11',
            'degree' => 'required|max:255',
            'email' => 'required|email',
            'available' => 'required|in:1,0',
            'location' => 'required|max:255',
            'facts_txt' => 'max:1500',
            'clients' => 'required|numeric|min:0',
            'projects_done' => 'required|numeric|min:0',
            'awards' => 'required|numeric|min:0',
            'skills_txt' => 'max:1500',
            'resume_txt' => 'max:1500',
            'last_words' => 'max:1500',
            'background_img' => 'mimes:jpg|nullable|max:500',
            'profile_img' => 'mimes:jpg|nullable|max:500',
        ]);

        if ($request->file('background_img') !== null) {
            $file = $request->file('background_img');
            $file->move(public_path('assets\img'), 'background.' . $file->getClientOriginalExtension());
        }

        if ($request->file('profile_img') !== null) {
            $file = $request->file('profile_img');
            $file->move(public_path('assets\img'), 'profile.' . $file->getClientOriginalExtension());
        }

        $resume = Resume::findOrFail(1);
        $resume->title = $validated['title'];
        $resume->name = $validated['name'];
        $resume->iam = $validated['iam'];
        $resume->about_txt = $validated['about_txt'];
        $resume->about_title = $validated['about_title'];
        $resume->birthday = $validated['birthday'];
        $resume->age = $validated['age'];
        $resume->phone = $validated['phone'];
        $resume->degree = $validated['degree'];
        $resume->email = $validated['email'];
        $resume->available = $validated['available'];
        $resume->location = $validated['location'];
        $resume->facts_txt = $validated['facts_txt'];
        $resume->clients = $validated['clients'];
        $resume->projects_done = $validated['projects_done'];
        $resume->awards = $validated['awards'];
        $resume->skills_txt = $validated['skills_txt'];
        $resume->resume_txt = $validated['resume_txt'];
        $resume->last_words = $validated['last_words'];
        $resume->save();

        alert()->success('', 'Resume Changed');
        return to_route('admin');
    }

    public function sample()
    {
        return view('adminSampleProject', [
            'sample_project' => SampleProject::all(),
        ]);
    }

    public function storeSample()
    {

    }

    public function updateSample()
    {

    }

    public function deleteSample()
    {

    }

    public function storeIMGDetails()
    {

    }

    public function updateIMGDetails()
    {

    }

    public function deleteIMGDetails()
    {

    }

    public function skill()
    {
        return view('adminSkill', [
            'skills' => Skill::all(),
        ]);
    }

    public function storeSkills(Request $request)
    {
        $validated = $request->validate([
            'skill' => 'required|max:255',
            'percent' => 'required|numeric|min:0|max:100',
        ]);

        $skill = new Skill();
        $skill->skill_name = $validated['skill'];
        $skill->percent = $validated['percent'];
        $skill->save();

        alert()->success('', 'Skill Added');
        return to_route('skillPage');
    }

    public function updateSkills(Request $request)
    {
        $validated = $request->validate([
            'skill_id' => 'required',
            'skill' => 'required|max:255',
            'percent' => 'required|numeric|min:0|max:100',
        ]);

        $skill = Skill::findOrFail($validated['skill_id']);
        $skill->skill_name = $validated['skill'];
        $skill->percent = $validated['percent'];
        $skill->save();

        alert()->success('', 'Skill Updated');
        return to_route('skillPage');
    }

    public function deleteSkills(Request $request)
    {
        $validated = $request->validate([
            'skill_id' => 'required',
        ]);

        $skill = Skill::findOrFail($validated['skill_id']);
        $skill->delete();

        alert()->success('', 'Skill Deleted');
        return to_route('skillPage');
    }
}
