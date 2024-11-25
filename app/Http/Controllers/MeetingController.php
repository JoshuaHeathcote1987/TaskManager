<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $meetings = Meeting::all();
        $fields = [
            [
                'name' => 'meeting_id',          // The name of the field (used in the form data and as the field's key)
                'label' => 'Meeting ID',         // The label text to display next to the input
                'type' => 'hidden',              // Hidden field for meeting ID (auto-generated)
                'value' => '',                   // Default value (empty for now)
                'placeholder' => ''              // No placeholder needed for hidden field
            ],
            [
                'name' => 'title',               // The field's name for the meeting title
                'label' => 'Meeting Title',      // The label for the meeting title input
                'type' => 'text',                // Text input for the title
                'value' => '',                   // Default value (empty for now)
                'placeholder' => 'Enter meeting title' // Placeholder text inside the input field
            ],
            [
                'name' => 'description',         // The field's name for the description
                'label' => 'Description',        // The label for the description input
                'type' => 'textarea',            // Use a textarea for multi-line input
                'value' => '',                   // Default value (empty for now)
                'placeholder' => 'Enter meeting description' // Placeholder text inside the textarea
            ],
            [
                'name' => 'scheduled_at',        // The field name for the scheduled date and time
                'label' => 'Scheduled At',       // Label for the scheduled date and time input
                'type' => 'datetime-local',      // Date and time picker input
                'value' => '',                   // Default value (empty for now)
                'placeholder' => ''              // Date fields typically don't have a placeholder
            ],
            [
                'name' => 'duration',            // The field name for the meeting duration
                'label' => 'Duration (in minutes)', // Label for the duration input
                'type' => 'number',              // Number input for the duration
                'value' => '',                   // Default value (empty for now)
                'placeholder' => 'Enter meeting duration in minutes' // Placeholder text inside the input
            ],
            [
                'name' => 'project_id',          // The field name for the project ID
                'label' => 'Project ID',         // Label for the project ID input
                'type' => 'hidden',              // Hidden field for project ID (auto-filled)
                'value' => '',                   // Default value (empty for now)
                'placeholder' => ''              // No placeholder needed for hidden field
            ],
            [
                'name' => 'created_by',          // The field name for the created_by user ID
                'label' => 'Created By',         // Label for the created_by input
                'type' => 'hidden',              // Hidden field for created_by (auto-filled)
                'value' => '',                   // Default value (empty for now)
                'placeholder' => ''              // No placeholder needed for hidden field
            ],
            [
                'name' => 'created_at',          // The field name for the created_at timestamp
                'label' => 'Created At',         // Label for the created_at input
                'type' => 'datetime-local',      // Date and time picker input
                'value' => '',                   // Default value (empty for now)
                'placeholder' => ''              // Date fields typically don't have a placeholder
            ],
            [
                'name' => 'updated_at',          // The field name for the updated_at timestamp
                'label' => 'Updated At',         // Label for the updated_at input
                'type' => 'datetime-local',      // Date and time picker input
                'value' => '',                   // Default value (empty for now)
                'placeholder' => ''              // Date fields typically don't have a placeholder
            ],
            [
                'name' => 'deleted_at',          // The field name for the deleted_at timestamp
                'label' => 'Deleted At',         // Label for the deleted_at input
                'type' => 'datetime-local',      // Date and time picker input
                'value' => '',                   // Default value (empty for now)
                'placeholder' => ''              // Date fields typically don't have a placeholder
            ]
        ];
        
        return Inertia::render('Table', ['results' => $meetings, 'fields' => $fields]);
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
    public function store()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
