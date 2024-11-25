<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tasks = Task::all();
        $fields = [
            [
                'name' => 'task_id',             // The name of the field (used in the form data and as the field's key)
                'label' => 'Task ID',            // The label text to display next to the input
                'type' => 'hidden',              // Hidden field for task ID
                'value' => '',                   // Default value (empty for now)
                'placeholder' => ''              // No placeholder needed for hidden field
            ],
            [
                'name' => 'title',               // The field's name for the task title
                'label' => 'Task Title',         // The label for the title input
                'type' => 'text',                // Text input for the title
                'value' => '',                   // Default value (empty for now)
                'placeholder' => 'Enter task title' // Placeholder text inside the input field
            ],
            [
                'name' => 'description',         // The field's name for the description
                'label' => 'Description',        // The label for the description input
                'type' => 'textarea',            // Use a textarea for multi-line input
                'value' => '',                   // Default value (empty for now)
                'placeholder' => 'Enter task description' // Placeholder text inside the textarea
            ],
            [
                'name' => 'status',              // The field name for the status dropdown
                'label' => 'Status',             // Label for the status dropdown
                'type' => 'select',              // Select dropdown for status options
                'value' => 'To-Do',              // Default value for the status dropdown
                'options' => ['To-Do', 'In Progress', 'Completed'], // Options in the select dropdown
                'placeholder' => ''              // Select fields usually don't have placeholders
            ],
            [
                'name' => 'priority',            // The field name for the priority dropdown
                'label' => 'Priority',           // Label for the priority dropdown
                'type' => 'select',              // Select dropdown for priority options
                'value' => 'Medium',             // Default value for the priority dropdown
                'options' => ['High', 'Medium', 'Low'], // Options in the select dropdown
                'placeholder' => ''              // Select fields usually don't have placeholders
            ],
            [
                'name' => 'due_date',            // Name of the due date field
                'label' => 'Due Date',           // Label for the due date input
                'type' => 'date',                // Date picker input type
                'value' => '',                   // Default value (empty for now)
                'placeholder' => ''              // Date fields typically don't have a placeholder
            ],
            [
                'name' => 'project_id',          // The field name for the project ID
                'label' => 'Project ID',         // Label for the project ID input
                'type' => 'text',              // Hidden field for project ID (auto-filled)
                'value' => '',                   // Default value (empty for now)
                'placeholder' => ''              // No placeholder needed for hidden field
            ],
        ];
        
        return Inertia::render('Table', ['results' => $tasks, 'fields' => $fields]);
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
