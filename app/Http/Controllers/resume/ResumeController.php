<?php

namespace App\Http\Controllers\resume;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Resume;
use App\Model\EducationDetail;
use App\Model\ExperienceDetail;
use App\SkillsLanguages;

class ResumeController extends Controller
{
    // public function create(Request $request)
    // {
    //     $regId = $request->query('i');

    //     // Now you can use $regId as needed, e.g., fetch user data associated with this ID

    //     return view('resume.resume', compact('regId'));
    // }
    // public function create(Request $request)
    // {
    //     $regId = $request->query('i');

    //     // Retrieve the resume details based on student_id
    //     $resumeDetails = Resume::where('student_id', $regId)->first();

    //     // Check if the student has a resume and link_status < 3
    //     if ($resumeDetails) {
    //         // Assuming 'link_status' is a column in the 'Resume' model
    //         if ($resumeDetails->link_status < 3) {
    //             // Decode JSON fields as before
    //             $resumeDetails->education_details = json_decode($resumeDetails->education_details);
    //             $resumeDetails->experience_details = json_decode($resumeDetails->experience_details);
    //             $resumeDetails->skills = json_decode($resumeDetails->skills);
    //             $resumeDetails->languages = json_decode($resumeDetails->languages);


    //             return view('resume.edit', compact('resumeDetails'));
    //         } else {
    //             // Redirect or show a message indicating the limit is complete
    //             return redirect()->back()->with('error', 'Access to this resume is restricted due to link status.');
    //         }
    //     }


    //     if (!$resumeDetails || $resumeDetails->link_status < 3) {
    //         return view('resume.resume', compact('regId'));
    //     }

    //     // If link_status >= 3, block access
    //     return redirect()->back()->with('error', 'Access to this resume creation is restricted due to link status.');
    // }
    public function create(Request $request)
    {


        // dd($request->all());
    
        $regId = $request->query('i');  // student
        $stId = $request->query('stId');  // student
        $countriesArray  =  returnCountiesArray(); // calling function form helper class form app/Helper/helper.php


        if ($regId == null && $stId != null) {
            // employee section
            $resumeDetails = Resume::where('student_id', $stId)->first();

            if ($resumeDetails != null) {
                // data present or Decode JSON fields as before
                $resumeDetails->education_details = json_decode($resumeDetails->education_details);
                $resumeDetails->experience_details = json_decode($resumeDetails->experience_details);
                $resumeDetails->skills = json_decode($resumeDetails->skills);
                $resumeDetails->languages = json_decode($resumeDetails->languages);
                $resumeDetails->other_languages_data = json_decode($resumeDetails->other_languages_data);
                $resumeDetails->driving_licence = json_decode($resumeDetails->driving_licence);
                $resumeDetails->hobbies_and_interest = json_decode($resumeDetails->hobbies_and_interest);
                $resumeDetails->awards = json_decode($resumeDetails->awards);
                $resumeDetails->projects = json_decode($resumeDetails->projects);
                return view('resume.edit', compact('resumeDetails' ,'countriesArray'));
            }
            else{
                $regId = $stId;
                return view('resume.resume', compact('regId' , 'countriesArray') );

            }
        } else {
            // student section 
            $resumeDetails = Resume::where('student_id', $regId)->first();
            if ($resumeDetails != null) {
                if ($resumeDetails->link_status < 300) {
                    $resumeDetails->link_status += 1;  // Increment link_status by 1
                    $resumeDetails->save(); // Save the updated link_status
                    // Decode JSON fields as before
                    $resumeDetails->education_details = json_decode($resumeDetails->education_details);
                    $resumeDetails->experience_details = json_decode($resumeDetails->experience_details);
                    $resumeDetails->skills = json_decode($resumeDetails->skills);
                    $resumeDetails->languages = json_decode($resumeDetails->languages);
                    $resumeDetails->other_languages_data = json_decode($resumeDetails->other_languages_data);
                    $resumeDetails->driving_licence = json_decode($resumeDetails->driving_licence);
                    $resumeDetails->hobbies_and_interest = json_decode($resumeDetails->hobbies_and_interest);
                    $resumeDetails->awards = json_decode($resumeDetails->awards);
                    $resumeDetails->projects = json_decode($resumeDetails->projects);
                    return view('resume.edit', compact('resumeDetails' , 'countriesArray'));
                } else {
                    // Redirect or show a message indicating the limit is complete
                    return view('resume.resume_alert');
                }
            }
            else{
                return view('resume.resume', compact('regId' , 'countriesArray'));

            }

        }
    }

    // public function store(Request $request)
    // {
    //     // Validate the request data
    //     $validated = $request->validate([
    //         'full_name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255|unique:resumes,email',
    //         'phone_number' => 'required|string|max:20',
    //         'gender' => 'required|string|in:Male,Female,Other',
    //         'birth_date' => 'required|date',
    //         'nationality' => 'required|string|max:255',
    //         'about_yourself' => 'required|string',
    //         'postal_code' => 'required|string|max:10',
    //         'city' => 'required|string|max:255',
    //         'country' => 'required|string|max:255',
    //         'address' => 'required|string',
    //         'education_degree_name.*' => 'required|string|max:255', // Add validation for each education field
    //         'education_university_name.*' => 'required|string|max:255',
    //         'education_city.*' => 'required|string|max:255',
    //         'education_country.*' => 'required|string|max:255',
    //         'education_total_marks.*' => 'required|numeric',
    //         'education_start_date.*' => 'required|date',
    //         'education_end_date.*' => 'required|date',
    //         'education_details.*' => 'nullable|string',
    //         'experience_position.*' => 'required|string|max:255',
    //         'experience_employer.*' => 'required|string|max:255',
    //         'experience_city.*' => 'required|string|max:255',
    //         'experience_country.*' => 'required|string|max:255',
    //         'experience_start_date.*' => 'required|date',
    //         'experience_end_date.*' => 'nullable|date',
    //         'experience_details.*' => 'nullable|string',
    //         'skill_name.*' => 'required|string|max:255',
    //         'skill_perofessionlism.*' => 'required|string|in:Basic,Intermediate,Expert',
    //         'language_name.*' => 'required|string|max:255',
    //         'language_perofessionlism.*' => 'required|string|in:Basic,Intermediate,Expert',
    //     ]);

    //     // Handle profile image upload
    //     $profileImageName = null;
    //     if ($request->hasFile('profile_image')) {
    //         $file = $request->file('profile_image');
    //         $profileImageName = time() . '_' . $file->getClientOriginalName();
    //         $destinationPath = public_path('assets_frontend/images/resume_profiles');
    //         $file->move($destinationPath, $profileImageName);
    //     }

    //     // Create the resume record
    //     $resume = Resume::create([
    //         'full_name' => $validated['full_name'],
    //         'email' => $validated['email'],
    //         'phone_number' => $validated['phone_number'],
    //         'gender' => $validated['gender'],
    //         'birth_date' => $validated['birth_date'],
    //         'nationality' => $validated['nationality'],
    //         'about_yourself' => $validated['about_yourself'],
    //         'profile_image' => $profileImageName,
    //         'postal_code' => $validated['postal_code'],
    //         'city' => $validated['city'],
    //         'country' => $validated['country'],
    //         'address' => $validated['address'],
    //         'student_id' => "0",
    //     ]);

    //     // Prepare education data
    //     $educationData = [];
    //     foreach ($validated['education_degree_name'] as $index => $degreeName) {
    //         $educationData[] = [
    //             'resume_id' => $resume->id,
    //             'degree_name' => $degreeName,
    //             'university_name' => $validated['education_university_name'][$index],
    //             'city' => $validated['education_city'][$index],
    //             'country' => $validated['education_country'][$index],
    //             'total_marks' => $validated['education_total_marks'][$index],
    //             'start_date' => $validated['education_start_date'][$index],
    //             'end_date' => $validated['education_end_date'][$index],
    //             'details' => $validated['education_details'][$index],
    //         ];
    //     }

    //     // Check if education data is not empty
    //     if (!empty($educationData)) {
    //         // Insert education data into the database
    //         EducationDetail::insert($educationData);
    //     }


    //     // Prepare experience data
    // $experienceData = [];
    // foreach ($validated['experience_position'] as $index => $position) {
    //     $experienceData[] = [
    //         'resume_id' => $resume->id,
    //         'position' => $position,
    //         'employer' => $validated['experience_employer'][$index],
    //         'city' => $validated['experience_city'][$index],
    //         'country' => $validated['experience_country'][$index],
    //         'start_date' => $validated['experience_start_date'][$index],
    //         'end_date' => $validated['experience_end_date'][$index],
    //         'currently_working' => "0",
    //         'details' => $validated['experience_details'][$index],
    //     ];
    // }

    // // Insert experience data into the database
    // if (!empty($experienceData)) {
    //     ExperienceDetail::insert($experienceData);
    // }

    // $skillsData = [];
    // foreach ($validated['skill_name'] as $index => $skill) {
    //     $skillsData[] = [
    //         'resume_id' => $resume->id,
    //         'name' => $skill,
    //         'type' => 'skill',
    //         'proficiency' => $validated['skill_perofessionlism'][$index],
    //     ];
    // }

    // // Prepare languages data
    // $languagesData = [];
    // foreach ($validated['language_name'] as $index => $language) {
    //     $languagesData[] = [
    //         'resume_id' => $resume->id,
    //         'name' => $language,
    //         'type' => 'language',
    //         'proficiency' => $validated['language_perofessionlism'][$index],
    //     ];
    // }

    // // Insert skills and languages data into the database
    // if (!empty($skillsData)) {
    //     SkillsLanguages::insert($skillsData);
    // }
    // if (!empty($languagesData)) {
    //     SkillsLanguages::insert($languagesData);
    // }

    //     return redirect()->back()->with('success', 'Resume saved successfully.');
    // }
    
    
    
    public function store(Request $request){

// education_present[]


        // Validate the request data
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|string|max:20',
            'gender' => 'required|string|in:Male,Female,Other',
            'birth_date' => 'required|date',
            'nationality' => 'required|string|max:255',
            'about_yourself' => 'required|string',
            'postal_code' => 'required|string|max:10',
            'student_id' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'address' => 'required|string',
            'education_degree_name.*' => 'required|string|max:255', // Add validation for each education field
            'education_university_name.*' => 'required|string|max:255',
            'education_city.*' => 'required|string|max:255',
            'education_country.*' => 'required|string|max:255',
            'education_total_marks.*' => 'required|numeric',
            'education_start_date.*' => 'required|date',
            'education_end_date.*' => 'nullable|date',
            'education_details.*' => 'nullable|string',
            'education_university_web_link.*' => 'required',
            
        ]);


        // Handle profile image upload
        $profileImageName = null;
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $profileImageName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets_frontend/images/resume_profiles');
            $file->move($destinationPath, $profileImageName);
        }
        $educationData = []; // Populate this if you have education fields
        $currentStudying = $request->input('education_currently_studying') === '1' ? true : false; // Store as boolean
        foreach ($request->input('education_degree_name', []) as $index => $degree) {
            $educationData[] = [
                'degree_name' => $degree,
                'university_name' => $request->input('education_university_name')[$index],
                'city' => $request->input('education_city')[$index],
                'country' => $request->input('education_country')[$index],
                'total_marks' => $request->input('education_total_marks')[$index],
                'start_date' => $request->input('education_start_date')[$index],
                'end_date' => $request->input('education_end_date')[$index],
                'education_present' => $request->input('education_present')[$index],
                'university_web_link' => $request->input('education_university_web_link')[$index],
                'details' => $request->input('education_details')[$index],
                'currently_studying' => $currentStudying, // Store the studying status here

            ];
        }





        // Prepare experience details if applicable
        $experienceData = []; // Similar to education
        foreach ($request->input('experience_position', []) as $index => $position) {
            $experienceData[] = [
                'position' => $position,
                'employer' => $request->input('experience_employer')[$index],
                'city' => $request->input('experience_city')[$index],
                'country' => $request->input('experience_country')[$index],
                'start_date' => $request->input('experience_start_date')[$index],
                'end_date' => $request->input('experience_end_date')[$index],
                'experience_present' => $request->input('experience_present')[$index],
                'details' => $request->input('experience_details')[$index],
            ];
        }


        // Prepare skills
        $skillsData = [];
        foreach ($request->input('skill_name', []) as $index => $skill) {
            $skillsData[] = [
                'name' => $skill,
                'proficiency' => $request->input('skill_perofessionlism')[$index],
            ];
        }

        // Prepare languages
        $languagesData = [];
        foreach ($request->input('language_name', []) as $index => $language) {
            $languagesData[] = [
                'name' => $language,
                'proficiency' => $request->input('language_professionalisms')[$index],
                'cirtificate_type' => $request->input('cirtificate_type')[$index],
                'listening' => $request->input('language_listening')[$index],
                'reading' => $request->input('language_reading')[$index],
                'spoken_interaction' => $request->input('language_spoken_interaction')[$index],
                'spoken_production' => $request->input('language_spoken_production')[$index],
                'writing' => $request->input('language_writing')[$index],
                'overall' => $request->input('language_overall')[$index],

            ];
        }

        $otherLanguagesData = [];
        foreach ($request->input('other_language_name', []) as $index => $language) {
            $otherLanguagesData[] = [
                'name' => $language,
                'proficiency' => $request->input('other_language_professionalism')[$index],
            ];
        }


        // Prepare Driving licence
        $drivingLicence = [];
        foreach ($request->input('driving_licence', []) as $index => $skill) {
            $drivingLicence[] = [
                'driving_licence' => $request->input('driving_licence')[$index],
            ];
        }


        // Prepare Driving licence
        $hobbies = [];
        foreach ($request->input('hobbies', []) as $index => $skill) {
            $hobbies[] = [
                'hobbies' => $request->input('hobbies')[$index],
            ];
        }
        // Prepare awards
        $awards = [];
        foreach ($request->input('Awarded_date', []) as $index => $skill) {
            $awards[] = [
                'awarded_date' => $request->input('Awarded_date')[$index],
                'awarded_uni_name' => $request->input('awarded_uni_name')[$index],
                'awarded_title' => $request->input('Awarded_title')[$index],
            ];
        }

        // Prepare projects
        $projects = [];
        foreach ($request->input('project_start_date', []) as $index => $skill) {
            $projects[] = [
                'project_start_date' => $request->input('project_start_date')[$index],
                'project_end_date' => $request->input('project_end_date')[$index],
                'project_title' => $request->input('project_title')[$index],
            ];
        }

        // Create the resume record
        Resume::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'gender' => $validated['gender'],
            'birth_date' => $validated['birth_date'],
            'nationality' => $validated['nationality'],
            'about_yourself' => $validated['about_yourself'],
            'profile_image' => $profileImageName,
            'postal_code' => $validated['postal_code'],
            'city' => $validated['city'],
            'country' => $validated['country'],
            'address' => $validated['address'],
            'student_id' => $validated['student_id'],
            'education_details' => json_encode($educationData),
            'experience_details' => json_encode($experienceData),
            'skills' => json_encode($skillsData),
            'languages' => json_encode($languagesData),
            'other_languages_data' => json_encode($otherLanguagesData),
            'driving_licence' => json_encode($drivingLicence),
            'awards' => json_encode($awards),
            'hobbies_and_interest' => json_encode($hobbies),
            'projects' => json_encode($projects),
        ]);


        session()->flash('success', 'Resume added successfully!');

        return response()->json([ 'status' => true , 'success' => 'Resume saved successfully']);
    }





    
  public function update(Request $request, $id)
  {

      // Find the existing resume record
      $resume = Resume::findOrFail($id);

      // Handle profile image upload
      $profileImageName = $resume->profile_image; // Default to current image
      if ($request->hasFile('profile_image')) {
          $file = $request->file('profile_image');
          $profileImageName = time() . '_' . $file->getClientOriginalName();
          $destinationPath = public_path('assets_frontend/images/resume_profiles');
          $file->move($destinationPath, $profileImageName);
      }
      
      // Populate education data
      $educationData = [];
      foreach ($request->input('education_degree_name', []) as $index => $degree) {
          $educationData[] = [
              'degree_name' => $degree,
              'university_name' => $request->input('education_university_name')[$index],
              'city' => $request->input('education_city')[$index],
              'country' => $request->input('education_country')[$index],
              'total_marks' => $request->input('education_total_marks')[$index],
              'start_date' => $request->input('education_start_date')[$index],
              'end_date' => $request->input('education_end_date')[$index],
              'university_web_link' => $request->input('education_university_web_link')[$index],
              'education_present' => $request->input('education_present')[$index],
              'details' => $request->input('education_details')[$index],
          ];
      }
     
      
      // Populate experience data
      $experienceData = [];
      foreach ($request->input('experience_position', []) as $index => $position) {
          $experienceData[] = [
              'position' => $position,
              'employer' => $request->input('experience_employer')[$index],
              'city' => $request->input('experience_city')[$index],
              'country' => $request->input('experience_country')[$index],
              'start_date' => $request->input('experience_start_date')[$index],
              'end_date' => $request->input('experience_end_date')[$index],
              'experience_present' => $request->input('experience_present')[$index],
              'details' => $request->input('experience_details')[$index],
          ];
      }
      // Populate skills data
      $skillsData = [];
      foreach ($request->input('skill_name', []) as $index => $skill) {
          $skillsData[] = [
              'name' => $skill,
              'proficiency' => $request->input('skill_perofessionlism')[$index],
          ];
      }

      // Populate languages data
      $languagesData = [];
      foreach ($request->input('language_name', []) as $index => $language) {
          $languagesData[] = [
              'name' => $language,
              'cirtificate_type' => $request->input('language_type')[$index],
              'listening' => $request->input('language_listening')[$index],
              'reading' => $request->input('language_reading')[$index],
              'spoken_interaction' => $request->input('language_spoken_interaction')[$index],
              'spoken_production' => $request->input('language_spoken_production')[$index],
              'writing' => $request->input('language_writing')[$index],
              'language_overall' => $request->input('language_overall')[$index],
          ];
      }


      $otherLanguagesData = [];
      foreach ($request->input('other_language_name', []) as $index => $language) {
          $otherLanguagesData[] = [
              'name' => $language,
              'proficiency' => $request->input('other_language_professionalism')[$index],
          ];
      }
    //   dd($otherLanguagesData);


      
      // Prepare Driving licence
      $drivingLicence = [];
      foreach ($request->input('driving_licence', []) as $index => $skill) {
          $drivingLicence[] = [
              'driving_licence' => $request->input('driving_licence')[$index],
          ];
      }


      // Prepare Driving licence
      $hobbies = [];
      foreach ($request->input('hobbies', []) as $index => $skill) {
          $hobbies[] = [
              'hobbies' => $request->input('hobbies')[$index],
          ];
      }
      // Prepare awards
      $awards = [];
      foreach ($request->input('Awarded_date', []) as $index => $skill) {
          $awards[] = [
              'awarded_date' => $request->input('Awarded_date')[$index],
              'awarded_uni_name' => $request->input('awarded_uni_name')[$index],
              'awarded_title' => $request->input('Awarded_title')[$index],
          ];
      }


      // Prepare projects
      $projects = [];
      foreach ($request->input('project_start_date', []) as $index => $skill) {
          $projects[] = [
              'project_start_date' => $request->input('project_start_date')[$index],
              'project_end_date' => $request->input('project_end_date')[$index],
              'project_title' => $request->input('project_title')[$index],
          ];
      }

    $resume->full_name = $request->input('full_name');
    $resume->email = $request->input('email');
    $resume->phone_number = $request->input('phone_number');
    $resume->gender = $request->input('gender');
    $resume->birth_date = $request->input('birth_date');
    $resume->nationality = $request->input('nationality');
    $resume->about_yourself = $request->input('about_yourself');
    $resume->profile_image = $profileImageName;
    $resume->postal_code = $request->input('postal_code');
    $resume->city = $request->input('city');
    $resume->country = $request->input('country');
    $resume->address = $request->input('address');
    $resume->student_id = $request->input('student_id');
    $resume->education_details = json_encode($educationData);
    $resume->experience_details = json_encode($experienceData);
    $resume->skills = json_encode($skillsData);
    $resume->languages = json_encode($languagesData);
    $resume->other_languages_data = json_encode($otherLanguagesData);
    $resume->driving_licence = json_encode($drivingLicence);
    $resume->awards = json_encode($awards);
    $resume->hobbies_and_interest = json_encode($hobbies);
    $resume->projects = json_encode($projects);
    $resume->save();
    session()->flash('success', 'Resume updated successfully!');

    return response()->json(['success' => 'Resume updated successfully']);
  }



}
