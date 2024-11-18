<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;

class RiskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $risks = \App\Models\Risk::all();
        $fields = [
            [
                'name' => 'risk_id',            // The name of the field (used in the form data and as the field's key)
                'label' => 'Risk ID',           // The label text to display next to the input
                'type' => 'hidden',             // Hidden field for risk ID (auto-generated)
                'value' => '',                  // Default value (empty for now)
                'placeholder' => ''             // No placeholder needed for hidden field
            ],
            [
                'name' => 'title',              // The field's name for the title
                'label' => 'Title',             // The label for the title input
                'type' => 'text',               // Text input for the title
                'value' => '',                  // Default value (empty for now)
                'placeholder' => 'Enter risk title' // Placeholder text inside the input
            ],
            [
                'name' => 'description',        // The field's name for the description
                'label' => 'Description',       // The label for the description input
                'type' => 'textarea',           // Use a textarea for multi-line input
                'value' => '',                  // Default value (empty for now)
                'placeholder' => 'Enter risk description' // Placeholder text inside the textarea
            ],
            [
                'name' => 'impact',             // The field name for the impact dropdown
                'label' => 'Impact',            // Label for the impact dropdown
                'type' => 'select',             // Use a select input (dropdown)
                'value' => 'Medium',            // Default value for the impact dropdown
                'options' => ['Low', 'Medium', 'High'], // The options in the select dropdown
                'placeholder' => ''             // Select fields usually don't have placeholders
            ],
            [
                'name' => 'probability',        // The field name for the probability dropdown
                'label' => 'Probability',       // Label for the probability dropdown
                'type' => 'select',             // Use a select input (dropdown)
                'value' => 'Medium',            // Default value for the probability dropdown
                'options' => ['Low', 'Medium', 'High'], // The options in the select dropdown
                'placeholder' => ''             // Select fields usually don't have placeholders
            ],
            [
                'name' => 'status',             // The field name for the status dropdown
                'label' => 'Status',            // Label for the status dropdown
                'type' => 'select',             // Use a select input (dropdown)
                'value' => 'Identified',        // Default value for the status dropdown
                'options' => ['Identified', 'Mitigating', 'Resolved', 'Closed'], // The options in the select dropdown
                'placeholder' => ''             // Select fields usually don't have placeholders
            ],
            [
                'name' => 'project_id',         // The field's name for the project ID
                'label' => 'Project ID',        // The label for the project ID input
                'type' => 'hidden',             // Hidden field for project ID (auto-filled)
                'value' => '',                  // Default value (empty for now)
                'placeholder' => ''             // No placeholder needed for hidden field
            ],
            [
                'name' => 'task_id',            // The field's name for the task ID
                'label' => 'Task ID',           // The label for the task ID input
                'type' => 'hidden',             // Hidden field for task ID (auto-filled)
                'value' => '',                  // Default value (empty for now)
                'placeholder' => ''             // No placeholder needed for hidden field
            ],
            [
                'name' => 'reported_by',        // The field's name for the reported by user
                'label' => 'Reported By',       // The label for the reported by user input
                'type' => 'hidden',             // Hidden field for reported by user (auto-filled)
                'value' => '',                  // Default value (empty for now)
                'placeholder' => ''             // No placeholder needed for hidden field
            ],
            [
                'name' => 'created_at',         // The field name for the created_at timestamp
                'label' => 'Created At',        // Label for the created_at input
                'type' => 'datetime-local',     // Date and time picker input
                'value' => '',                  // Default value (empty for now)
                'placeholder' => ''             // Date fields typically don't have a placeholder
            ],
            [
                'name' => 'updated_at',         // The field name for the updated_at timestamp
                'label' => 'Updated At',        // Label for the updated_at input
                'type' => 'datetime-local',     // Date and time picker input
                'value' => '',                  // Default value (empty for now)
                'placeholder' => ''             // Date fields typically don't have a placeholder
            ],
            [
                'name' => 'deleted_at',         // The field name for the deleted_at timestamp
                'label' => 'Deleted At',        // Label for the deleted_at input
                'type' => 'datetime-local',     // Date and time picker input
                'value' => '',                  // Default value (empty for now)
                'placeholder' => ''             // Date fields typically don't have a placeholder
            ]
        ];
        
        return Inertia::render('Table', ['results' => $risks, 'fields' => $fields]);
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
