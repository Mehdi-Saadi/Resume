<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Resume;
use App\Models\DetailImg;
use App\Models\SampleProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'background_img' => 'mimes:jpg,png|nullable|max:500',
            'profile_img' => 'mimes:jpg,png|nullable|max:500',
        ]);

        if ($request->file('background_img') !== null) {
            $file = $request->file('background_img');
            $file->move(public_path('assets\img\\'), $background_img_name = 'background.' . $file->getClientOriginalExtension());
        }

        if ($request->file('profile_img') !== null) {
            $file = $request->file('profile_img');
            $file->move(public_path('assets\img\\'), $profile_img_name = 'profile.' . $file->getClientOriginalExtension());
        }

        $resume = Resume::findOrFail(1);
        $resume->title = $validated['title'];

        if ($request->file('background_img') !== null)
            $resume->background_img = $background_img_name;

        $resume->name = $validated['name'];
        $resume->iam = $validated['iam'];
        $resume->about_txt = $validated['about_txt'];

        if ($request->file('profile_img') !== null)
            $resume->about_img = $profile_img_name;

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
            'sample_projects' => SampleProject::all(),
        ]);
    }

    public function storeSample(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'main_img' => 'required|mimes:jpg,png|max:500',
            'details_client' => 'max:255',
            'details_date' => 'max:255',
            'details_url' => 'max:255',
            'details_title' => 'max:255',
            'details_txt' => 'max:1500',
            'img1' => 'mimes:jpg,png|max:500',
            'img2' => 'mimes:jpg,png|max:500',
            'img3' => 'mimes:jpg,png|max:500',
        ]);

        $file = $request->file('main_img');
        $file->move(public_path('assets\img\portfolio\\'), $main_img_name = rand(1, 9999999) . '.' . $file->getClientOriginalExtension());

        $sample = new SampleProject();
        $sample->title = $validated['title'];
        $sample->main_img = $main_img_name;
        $sample->details_client = $validated['details_client'];
        $sample->details_date = $validated['details_date'];
        $sample->details_url = $validated['details_url'];
        $sample->details_title = $validated['details_title'];
        $sample->details_txt = $validated['details_txt'];
        $sample->save();

        // add more IMGs to detail_imgs table
        if ($request->file('img1') !== null || $request->file('img2') !== null || $request->file('img3') !== null) {
            $img_name1 = null;
            $img_name2 = null;
            $img_name3 = null;

            if ($request->file('img1') !== null) {
                $file = $request->file('img1');
                $file->move(public_path('assets\img\portfolio\\'), $img_name1 = rand(1, 9999999) . 'details' . '.' . $file->getClientOriginalExtension());
            }

            if ($request->file('img2') !== null) {
                $file = $request->file('img2');
                $file->move(public_path('assets\img\portfolio\\'), $img_name2 = rand(1, 9999999) . 'details' . '.' . $file->getClientOriginalExtension());
            }


            if ($request->file('img3') !== null) {
                $file = $request->file('img3');
                $file->move(public_path('assets\img\portfolio\\'), $img_name3 = rand(1, 9999999) . 'details' . '.' . $file->getClientOriginalExtension());
            }

            DetailImg::insert([
                [
                    'sample_project_id' => $sample->id,
                    'img' => $img_name1,
                ],
                [
                    'sample_project_id' => $sample->id,
                    'img' => $img_name2,
                ],
                [
                    'sample_project_id' => $sample->id,
                    'img' => $img_name3,
                ],
            ]);
        }

        alert()->success('', 'Sample Saved');
        return to_route('samplePage');
    }

    public function updateSample(Request $request)
    {
        $validated = $request->validate([
            'sample_id' => 'required',
            'title' => 'required|max:255',
            'main_img' => 'mimes:jpg,png|max:500',
            'details_client' => 'max:255',
            'details_date' => 'max:255',
            'details_url' => 'max:255',
            'details_title' => 'max:255',
            'details_txt' => 'max:1500',
        ]);

        $sample = SampleProject::findOrFail($validated['sample_id']);
        $sample->title = $validated['title'];

        if ($request->file('main_img') !== null) {
            $file = $request->file('main_img');
            $file->move(public_path('assets\img\portfolio\\'), $main_img_name = rand(1, 9999999) . '.' . $file->getClientOriginalExtension());

            // delete old image and add new one
            if (File::exists(public_path('assets\img\portfolio\\' . $sample->main_img)))
                File::delete(public_path('assets\img\portfolio\\' . $sample->main_img));
            $sample->main_img = $main_img_name;
        }

        $sample->details_client = $validated['details_client'];
        $sample->details_date = $validated['details_date'];
        $sample->details_url = $validated['details_url'];
        $sample->details_title = $validated['details_title'];
        $sample->details_txt = $validated['details_txt'];
        $sample->save();

        alert()->success('', 'Sample Changed');
        return to_route('samplePage');
    }

    public function deleteSample(Request $request)
    {
        $validated = $request->validate([
            'sample_id' => 'required',
        ]);

        $sample = SampleProject::findOrFail($validated['sample_id']);
        $detailIMGs = DetailImg::where('sample_project_id', $validated['sample_id']);

        if (File::exists(public_path('assets\img\portfolio\\' . $sample->main_img)))
            File::delete(public_path('assets\img\portfolio\\' . $sample->main_img));

        // delete detailIMG if exists
        foreach($detailIMGs as $detailIMG) {
            if (File::exists(public_path('assets\img\portfolio\\' . $detailIMG->img)))
                File::delete(public_path('assets\img\portfolio\\' . $detailIMG->img));
        }

        $sample->delete();

        alert()->success('', 'Sample Deleted');
        return to_route('samplePage');
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
