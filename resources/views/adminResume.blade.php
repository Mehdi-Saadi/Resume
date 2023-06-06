@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card px-0">
                <div class="card-header align-items-center">Resume</div>

                <div class="card-body">
                    <div>
                        <div class="d-flex justify-content-center" >
                            <div class="col" style="max-width: 760px">
                                <div class="d-flex justify-content-center">
                                    @if($errors->any())
                                        <div class="alert alert-danger m-1 pb-0 d-flex justify-content-center" style="max-width: 300px">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <form action="{{ route('resumeUpdate') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mt-4 mb-2 mx-5">
                                        <div class="row mb-4">
                                            <label for="title" class="form-label">Title:</label>
                                            <input type="text" name="title" id="title" class="form-control" autocomplete="off" value="{{ $resume->title }}">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" name="name" id="name" class="form-control" autocomplete="off" value="{{ $resume->name }}">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="iam" class="form-label">I'm:</label>
                                            <input type="text" name="iam" id="iam" class="form-control" autocomplete="off" value="{{ $resume->iam }}">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="about_txt" class="form-label">About Text:</label>
                                            <textarea name="about_txt" id="about_txt" class="form-control">{{ $resume->about_txt }}</textarea>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="about_title" class="form-label">About Title:</label>
                                            <input type="text" name="about_title" id="about_title" class="form-control" autocomplete="off" value="{{ $resume->about_title }}">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="birthday" class="form-label">Birthday:</label>
                                            <input type="text" name="birthday" id="birthday" class="form-control" autocomplete="off" value="{{ $resume->birthday }}">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="age" class="form-label">Age:</label>
                                            <input type="number" name="age" id="age" class="form-control" autocomplete="off" min="10" max="99" value="{{ $resume->age }}">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="phone" class="form-label">Phone:</label>
                                            <input type="text" name="phone" id="phone" class="form-control" autocomplete="off" value="{{ $resume->phone }}">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="degree" class="form-label">Degree:</label>
                                            <input type="text" name="degree" id="degree" class="form-control" autocomplete="off" value="{{ $resume->degree }}">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="email" name="email" id="email" class="form-control" autocomplete="off" value="{{ $resume->email }}">
                                        </div>
                                        <div class="row mb-4">
                                            <label class="form-check pe-2">Available: </label>
                                            <div class="form-check pe-2">
                                                <input class="form-check-input" type="radio" name="available" value="1" id="yes" @if($resume->available == 1) checked @endif>
                                                <label class="form-check-label" for="yes">
                                                    YES
                                                </label>
                                            </div>
                                            <div class="form-check pe-2">
                                                <input class="form-check-input" type="radio" name="available" value="0" id="no" @if($resume->available == 0) checked @endif>
                                                <label class="form-check-label" for="no">
                                                    NO
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="location" class="form-label">Location:</label>
                                            <input type="text" name="location" id="location" class="form-control" autocomplete="off" value="{{ $resume->location }}">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="facts_txt" class="form-label">Facts Text: (can be empty)</label>
                                            <textarea name="facts_txt" id="facts_txt" class="form-control">{{ $resume->facts_txt }}</textarea>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="clients" class="form-label">Number of Clients:</label>
                                            <input type="number" name="clients" id="clients" min="0" class="form-control" autocomplete="off" value="{{ $resume->clients }}">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="projects_done" class="form-label">Number of Projects:</label>
                                            <input type="number" name="projects_done" id="projects_done" min="0" class="form-control" autocomplete="off" value="{{ $resume->projects_done }}">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="awards" class="form-label">Number of Awards:</label>
                                            <input type="number" name="awards" id="awards" min="0" class="form-control" autocomplete="off" value="{{ $resume->awards }}">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="skills_txt" class="form-label">Skills Text: (can be empty)</label>
                                            <textarea name="skills_txt" id="skills_txt" class="form-control">{{ $resume->skills_txt }}</textarea>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="resume_txt" class="form-label">Resume Text: (can be empty)</label>
                                            <textarea name="resume_txt" id="resume_txt" class="form-control">{{ $resume->resume_txt }}</textarea>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="last_words" class="form-label">Last Words Text: (can be empty)</label>
                                            <textarea name="last_words" id="last_words" class="form-control">{{ $resume->last_words }}</textarea>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="background_img" class="form-label">Background Image: (can be empty)</label>
                                            <input type="file" name="background_img" id="background_img" class="form-control">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="profile_img" class="form-label">Profile Image: (can be empty)</label>
                                            <input type="file" name="profile_img" id="profile_img" class="form-control">
                                        </div>

                                        <div class="row">
                                            <div class="col-sm p-4">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
