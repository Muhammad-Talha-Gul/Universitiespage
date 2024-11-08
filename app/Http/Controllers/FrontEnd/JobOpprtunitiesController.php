<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobApplyRequest;
use App\JobApply;
use App\Model\JobOpprtunities;

class JobOpprtunitiesController extends Controller
{
    public function index(){
        $jobOpportunities = JobOpprtunities::where('post_status', 1)->latest()->get();
        return view('frontend.job_opportunities', compact('jobOpportunities'));
    }
    public function details($id){
        $details = JobOpprtunities::find($id);
        return view('frontend.job_opportunities_details', ['details' => $details]);
    }

    public function applyStore(JobApplyRequest $request)
{
    if ($request->hasFile('resume')) {
        $resume = $request->file('resume');
        $originalName = $resume->getClientOriginalName();
        $extension = $resume->getClientOriginalExtension();
        
        // Create a unique filename
        $uniqueFileName = $request->input('name') . '_' . time() . '.' . $extension;
        $uniqueFileName = preg_replace('/\s+/', '_', $uniqueFileName); // Replace spaces with underscores
        
        // Specify the directory where you want to store the file
        $directory = 'public/uploads/files';
        
        // Move the file to the specified directory
        $resume->move($directory, $uniqueFileName);
        
        // Store only the file name in the database
        $resumePath = $uniqueFileName;
    } else {
        $resumePath = null; // Set to null if no file is uploaded
    }
    
    JobApply::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'phone_number' => $request->input('phone_number'),
        // 'current_salary' => $request->input('current_salary'),
        // 'expected_salary' => $request->input('expected_salary'),
        'start_date' => $request->input('start_date'),
        'job_id' => $request->input('job_id'),
        'resume' => $resumePath, // Store the file path
    ]);

    return redirect()->back()->with('success', 'Your application has been submitted successfully.');
}

   
}
