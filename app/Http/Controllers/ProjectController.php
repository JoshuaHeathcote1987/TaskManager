<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $url = "/dashboard/projects";

        $projects = Project::all();

        $fields = [
            [
                'name' => 'name',               // The name of the field (used in the form data and as the field's key)
                'label' => 'Project Name',      // The label text to display next to the input
                'type' => 'text',               // The type of input (e.g., 'text', 'textarea', 'select', 'date')
                'value' => '',                  // The default value for the input field
                'placeholder' => 'Enter project name'  // Placeholder text inside the input field
            ],
            [
                'name' => 'description',        // The field's name for the description
                'label' => 'Description',       // The label for the description input
                'type' => 'textarea',           // Use a textarea for multi-line input
                'value' => '',                  // Default value for the textarea
                'placeholder' => 'Enter project description' // Placeholder text inside the textarea
            ],
            [
                'name' => 'status',             // The field name for the status dropdown
                'label' => 'Status',            // Label for the status dropdown
                'type' => 'select',             // Use a select input (dropdown)
                'value' => 'Active',            // The default value for the status dropdown
                'options' => ['Active', 'Completed', 'Archived'], // The options in the select dropdown
                'placeholder' => ''             // Select fields usually don't have placeholders
            ],
            [
                'name' => 'start_date',         // Name of the start date field
                'label' => 'Start Date',        // Label for the start date input
                'type' => 'date',               // Type of input (date picker)
                'value' => '',                  // Default value (empty for now)
                'placeholder' => ''             // Date fields typically don't need a placeholder
            ],
            [
                'name' => 'end_date',           // Name of the end date field
                'label' => 'End Date',          // Label for the end date input
                'type' => 'date',               // Type of input (date picker)
                'value' => '',                  // Default value (empty for now)
                'placeholder' => ''             // Date fields typically don't need a placeholder
            ]
        ];

        return Inertia::render('Projects', ['url' => $url, 'results' => $projects, 'fields' => $fields]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the request
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'required|string|max:1000',
        //     'status' => 'required|string|in:Active,Inactive',
        //     'start_date' => 'required|date|before_or_equal:end_date',
        //     'end_date' => 'required|date|after_or_equal:start_date',
        //     'owner_id' => 'nullable|integer|exists:users,id',
        // ]);

        $project = new \App\Models\Project;
        $project->name = $request['name'];
        $project->description = $request['description'];
        $project->status = $request['status'];
        $project->start_date = $request['start_date'];
        $project->end_date = $request['end_date'];
        $project->owner_id = Auth::id();
        $project->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        // Find the project by its ID
        $project = Project::where('project_id', $request['project_id'])->first();

        // Assign request values to the project's attributes manually
        $project->name = $request->name;
        $project->description = $request->description;
        $project->status = $request->status;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->owner_id = $request->owner_id;

        // Save the updated project to the database
        $project->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $project = Project::where('project_id', $id)->first();
        $project->delete();
    }
}
