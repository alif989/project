<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

     public function get_db(){
        //  dd('jii');
        // $users = Project::all();
        $users = $users = DB::table('projects')->get();
        // $result = Project::select('id', 'deadline', 'budget', 'status')->get();
        // dd($users);
     }
    public function index(Request $request)
    {
     
    	if ( $request->input('client') ) {
    	    return Project::select('id', 'deadline', 'budget', 'status')->get();
    	}

        $columns = ['deadline', 'budget', 'status'];
     
        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $dir = $request->input('dir');
        $searchValue = $request->input('search');
        // dd($column);
        $query = Project::select('id', 'deadline', 'budget', 'status')->orderBy($columns[$column], $dir);
        // dd($query);
        if ($searchValue) {
            $query->where(function($query) use ($searchValue) {
                $query->where('budget', 'like', '%' . $searchValue . '%')
                ->orWhere('status', 'like', '%' . $searchValue . '%');
            });
        }

        $projects = $query->paginate($length);
        return ['data' => $projects, 'draw' => $request->input('draw')];
    }
}