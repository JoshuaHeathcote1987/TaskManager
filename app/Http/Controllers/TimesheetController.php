<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $timesheets = Timesheet::all();
        $fields = [
            [
                'name' => 'timesheet_id',        // The name of the field (used in the form data and as the field's key)
                'label' => 'Timesheet ID',       // The label text to display next to the input
                'type' => 'hidden',              // Hidden field for timesheet ID (auto-generated)
                'value' => '',                   // Default value (empty for now)
                'placeholder' => ''              // No placeholder needed for hidden field
            ],
            [
                'name' => 'task_id',             // The field's name for the task ID
                'label' => 'Task ID',            // The label for the task ID input
                'type' => 'hidden',              // Hidden field for task ID (auto-filled)
                'value' => '',                   // Default value (empty for now)
                'placeholder' => ''              // No placeholder needed for hidden field
            ],
            [
                'name' => 'user_id',             // The field's name for the user ID
                'label' => 'User ID',            // The label for the user ID input
                'type' => 'hidden',              // Hidden field for user ID (auto-filled)
                'value' => '',                   // Default value (empty for now)
                'placeholder' => ''              // No placeholder needed for hidden field
            ],
            [
                'name' => 'hours_logged',        // The field name for hours logged
                'label' => 'Hours Logged',       // Label for the hours logged input
                'type' => 'number',              // Number input for the hours logged
                'value' => '',                   // Default value (empty for now)
                'placeholder' => 'Enter hours logged' // Placeholder text inside the input
            ],
            [
                'name' => 'log_date',            // The field name for the log date
                'label' => 'Log Date',           // Label for the log date input
                'type' => 'date',                // Date input for selecting the log date
                'value' => '',                   // Default value (empty for now)
                'placeholder' => ''              // Date fields typically don't have a placeholder
            ],
            [
                'name' => 'description',         // The field's name for the description
                'label' => 'Description',        // The label for the description input
                'type' => 'textarea',            // Use a textarea for multi-line input
                'value' => '',                   // Default value (empty for now)
                'placeholder' => 'Enter description of the work' // Placeholder text inside the textarea
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
        
        return Inertia::render('Table', ['results' => $timesheets, 'fields' => $fields]);
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
