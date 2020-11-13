<?php

namespace App\Http\Controllers;

use App\Back;
use App\Idea;
use App\User;
use App\Project;
use App\Setting;
use App\Interest;
use App\JobeOffer;
use App\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\IdeasResource;
use App\Http\Resources\ProjectsResource;
use App\Http\Resources\SettingsResource;
use App\Mail\JobeOffer as JobeOfferMail;
use App\Http\Resources\InterestsResource;
use App\Http\Resources\CategoriesResource;

class BackController extends Controller
{

    public function addInterest(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required',
        ]);
        $interest = new Interest;
        $interest->title = $request->title; 
        $interest->description = $request->desc; 
        
        // return response()->json($request->title);
        if($interest->save()){
            return response()->json('interest inserted');
        }
        return response()->json('interest inserted feild');
    }

    public function addIdea(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required',
            'project_category' => 'required'
        ]);
        $idea = new Idea;
        $idea->title = $request->title; 
        $idea->description = $request->desc; 
        $idea->project_category = $request->project_category; 
        
        // return response()->json($request->title);
        if($idea->save()){
            return response()->json('idea inserted');
        }
        return response()->json('idea inserted feild');
    }

    public function getIdeas(){
        return  new IdeasResource(Idea::all());
    }

    public function getCategories(){
        return  new CategoriesResource(ProjectCategory::all());
        // return  ProjectCategory::all();
    }

    public function addCategory(Request $request){
        $request->validate([
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'required|image|mimes:png|max:2048',
            'catName' => 'required'
        ]);
        $imageExt = $request->image->getClientOriginalExtension();
        $imageName = $request->catName.".".$request->image->getClientOriginalExtension();
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // Storage::put('public',$file);
        
        // create new project category model object
        $projectCat = new ProjectCategory;
        $projectCat->name = $request->catName;
        $projectCat->tag = $request->catName;
        $projectCat->icon = $imageName;
        // return response()->json($projectCat);
        if($projectCat->save()){
            $request->image->move('storage/icons',$imageName);
            return response()->json("category added successfully");
        }
        return response()->json("faild to add the category");
    }

    public function addProject(Request $request){
        $request->validate([
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'projectname' => 'required',
            'projectdesc' => 'required',
            'projectcat' => 'required',
            'projectvid' => 'required',
            'projectwhy' => 'required',
            'projectdone' => 'required',
            'incomes' => 'required',
            'outcomes' => 'required',
            'framworks' => 'required',
            'tasks' => 'required',
        ]);
        
        $project = new Project();

        $project->name = $request->projectname;
        $project->link = $request->projectvid;
        $project->description = $request->projectdesc;
        $project->youtube = $request->projectvid;
        $project->incomes = $request->incomes;
        $project->outcomes = $request->outcomes;
        $project->category_id = $request->projectcat;
        $project->tech = $request->framworks;
        $project->tasks = $request->tasks;
        $project->status = $request->projectdone;
        // return response()->json("project here");

        if($project->save()){
            
            return response()->json("project added successfully");
        }
        return response()->json("faild to add the project");
    }


    public function updateProject(Request $request){
        $request->validate([
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'projectname' => 'required',
            'projectdesc' => 'required',
            'projectcat' => 'required',
            'projectvid' => 'required',
            'projectwhy' => 'required',
            'projectdone' => 'required',
            ]);

        
        $project = Project::find($request->id);

        $project->name = $request->projectname;
        $project->link = $request->projectvid;
        $project->description = $request->projectdesc;
        $project->youtube = $request->projectvid;
        $project->incomes = $request->incomes;
        $project->outcomes = $request->outcomes;
        $project->category_id = $request->projectcat;
        $project->tech = $request->framworks;
        $project->tasks = $request->tasks;
        $project->status = $request->projectdone;
        // return response()->json("project here");

        if($project->save()){
            return response()->json("project updated successfully");
        }
        return response()->json("faild to update the project");
    }

    public function updateCategory(Request $request){
        $request->validate([
            // 'image' => 'image|mimes:png|max:2048',
            'id' => 'required',
            'catName' => 'required'
        ]);
        $projectCat = ProjectCategory::find($request->id);
        if($request->has('image')){
            // here you have to delete the old image from the storage

            // set up new image
            $imageExt = $request->image->getClientOriginalExtension();
            $imageName = $request->catName.".".$request->image->getClientOriginalExtension();
            $projectCat->icon = $imageName;
        }else{
            
        }
        // return response()->json($request->oldimage);
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // Storage::put('public',$file);
        
        // create new project category model object
        
        $projectCat->name = $request->catName;
        $projectCat->tag = $request->catName;
        
        // return response()->json($projectCat);
        if($projectCat->save()){
            if(isset($imageName) && $imageName != "" ){
                // delete the old image
                if(file_exists(storage_path('app/public/icons/'.$request->oldimage))){
                    unlink(storage_path('app/public/icons/'.$request->oldimage));
                }
                // upload new image
                $request->image->move('storage/icons',$imageName);
            }
            return response()->json("category updated successfully");
        }
        return response()->json("faild to update the category");
    }
    
    public function deleteCategory(Request $request){
        $request->validate([
            // 'image' => 'image|mimes:png|max:2048',
            'id' => 'required|integer',
        ]);
        $projectCat = ProjectCategory::find($request->id);
        if($projectCat->delete()){
            if(file_exists(storage_path('app/public/icons/'.$projectCat->icon))){
                unlink(storage_path('app/public/icons/'.$projectCat->icon));
            }
            return response()->json("category deleted successfully");
        }
        return response()->json("faild to delete the category");
    }

    public function getInterests(){
        return  new InterestsResource(Interest::all());
        // return  ProjectCategory::all();
    }

    public function getPreparedData(){
        $data = array();
        $data['interests'] = $this->getInterests();
        $data['projects'] = $this->getProjects();
        $data['userSet'] = $this->getUserSettings();
        $data['ideas'] = $this->getIdeas();
        $data['categories'] = $this->getCategories();

        return response()->json($data);
        // return  ProjectCategory::all();
    }

    public function updateInterest(Request $request){
        $request->validate([
            // 'image' => 'image|mimes:png|max:2048',
            'id' => 'required',
            'title' => 'required',
            'desc' => 'required',
        ]);
        $interest = Interest::find($request->id);
        // return response()->json("i am here 2");
        
        $interest->title = $request->title;
        $interest->description = $request->desc;
        
        // return response()->json($interest);
        if($interest->save()){
            
            return response()->json("interest updated successfully");
        }
        return response()->json("faild to update the interest");
    }

    public function updateIdea(Request $request){
        $request->validate([
            // 'image' => 'image|mimes:png|max:2048',
            'id' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'projectcat' => 'required',
        ]);
        $Idea = Idea::find($request->id);
        // return response()->json("i am here 2");
        
        $Idea->title = $request->title;
        $Idea->description = $request->desc;
        $Idea->project_category = $request->projectcat;
        
        // return response()->json($Idea);
        if($Idea->save()){
            
            return response()->json("Idea updated successfully");
        }
        return response()->json("faild to update the Idea");
    }

    public function deleteIdea(Request $request){
        $request->validate([
            // 'image' => 'image|mimes:png|max:2048',
            'id' => 'required|integer',
        ]);
        $idea = Idea::find($request->id);
        if($idea->delete()){
            return response()->json("idea deleted successfully");
        }
        return response()->json("faild to delete the idea");
    }

    public function updateUser(Request $request){
        $request->validate([
            // 'image' => 'image|mimes:png|max:2048',
            'name' => 'required',
            'email' => 'required',
            // settings
            'about' => 'required',
            'slug' => 'required',
            'facebook' => 'required',
            'linkedin' => 'required',
            'github' => 'required'
        ]);
        
        $user = User::find(auth()->user()->id);
        $setting = Setting::get()->first();
        
        // get and store new image
        $oldImage = $setting->image;

        $user->name = $request->name;
        $user->email = $request->email;

        $setting->about = $request->about;
        $setting->slug = $request->slug;
        $setting->facebook = $request->facebook;
        $setting->linkedin = $request->linkedin;
        $setting->github = $request->github;
        if($request->has('password')){
            $user->password = Hash::make($request->password);
        }

        if($request->has('image')){
            // remove old image if exits
            $imageExt = $request->image->getClientOriginalExtension();
            $imageName = "profile.".$imageExt;
            if(file_exists(storage_path('app/public/icons/'.$oldImage))){
                unlink(storage_path('app/public/icons/'.$oldImage));
            }

            // return response()->json($imageName);
            // upload new image
            $request->image->move('storage/icons',$imageName);
            $setting->image = $imageName;

            // save new data inside the database
        }
        
        // return response()->json($Idea);
        if($user->save() && $setting->save()){
            return response()->json("User updated successfully");
        }
        return response()->json("faild to update the User info");
        
    }

   
    public function getUserSettings(){
        return  new SettingsResource(Setting::all());
    }

    public function getProjects(){
        return  new ProjectsResource(Project::all());
    }

    public function deleteProject(Request $request){
        $request->validate([
            // 'image' => 'image|mimes:png|max:2048',
            'id' => 'required|integer',
        ]);
        $project = Project::find($request->id);
        if($project->delete()){
            return response()->json("Project deleted successfully");
        }
        return response()->json("faild to delete the project");
    }

    public function sendMessage(Request $request){
        $request->validate([
            // 'image' => 'image|mimes:png|max:2048',
            'fullname' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        //$fullname,$email,$message
        $jobe = new JobeOffer($request->fullname,$request->email,$request->message);

        Mail::to("hafidsoftdev@gmail.com")->send(new JobeOfferMail($jobe));
        return response()->json("The Mail Was Sended");
    }
}
