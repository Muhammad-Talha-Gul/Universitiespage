<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobOpprtunitiesRequest;
use App\Model\JobOpprtunities;
use Illuminate\Support\Facades\File;


class AdminJobOpprtunitiesController extends Controller
{
    public function create(){
        $jobOpportunities = JobOpprtunities::with('jobApplies')->latest()->get();
        return view('admin.jobs.create', compact('jobOpportunities'));
    }
    public function store(JobOpprtunitiesRequest  $request){
        
        JobOpprtunities::create([
            'title' => $request->input('title'),
            'job_type' => $request->input('job_type'),
            'city' => $request->input('city'),
            'province' => $request->input('province'),
            'country' => $request->input('country'),
            'site_based' => $request->input('site_based'),
            'experience' => $request->input('experience'),
            'requirements' => $request->input('requirements'),
            'responsibilities' => $request->input('responsibilities'),
            'description' => $request->input('description'),
            'skills' => $request->input('skills'),
        ]);
        $jobOpportunities = JobOpprtunities::all();
        return redirect()->back()->with('success', 'Job opportunity saved successfully.', compact('jobOpportunities'));
    }
    public function jobList(){
        $jobOpportunities = JobOpprtunities::with('jobApplies')->latest()->get();
        return view('admin.jobs.job_list', compact('jobOpportunities'));
    }

    public function updateStatus($id, Request $request)
    {
        $status = $request->input('status');
    
        // Validate the status value if needed
        // Example: $request->validate(['status' => 'required|in:0,1']);
    
        // Update status in the database
        $job = JobOpprtunities::find($id);
        if ($job) {
            $job->	post_status = $status;
            $job->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Comment not found'], 404);
        }
    }

    public function delete($id)
    {
        // Find the job opportunity
        $job = JobOpprtunities::findOrFail($id);

        // Retrieve all related job applications
        $jobApplies = $job->jobApplies;

        // Delete each job application and its associated file
        foreach ($jobApplies as $apply) {
            $filePath = public_path('uploads/files/' . $apply->resume);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $apply->delete();
        }

        // Delete the job opportunity
        $job->delete();

        return redirect()->back()->with(['success' => 'Job Deleted Successfully']);
    }

    public function edit($id){
        $job = JobOpprtunities::find($id);
        return view('admin.jobs.edit', compact('job'));
    }
    public function update($id, Request $request)
    {
        // Find the job by ID
        $job = JobOpprtunities::findOrFail($id);
    
        // Update the job with the request data
        $job->title = $request->input('title');
        $job->job_type = $request->input('job_type');
        $job->city = $request->input('city');
        $job->province = $request->input('province');
        $job->country = $request->input('country');
        $job->site_based = $request->input('site_based');
        $job->experience = $request->input('experience');
        $job->description = $request->input('description');
        $job->requirements = $request->input('requirements');
        $job->responsibilities = $request->input('responsibilities');
        $job->skills = $request->input('skills');
        
        $job->save();
    
        // Redirect or return response as needed
        return back()->with('success', 'Job updated successfully.');
    }
}
