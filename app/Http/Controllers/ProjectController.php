<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('project.show', compact('project'));
    }
}
