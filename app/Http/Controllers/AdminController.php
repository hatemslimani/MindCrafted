<?php

namespace App\Http\Controllers;
use App\groupModel;
use App\User;
use App\section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function getusers()
    {
        $data = User::query();

        // Filtre de recherche par nom ou email
        if ($search = request('search')) {
            $data->where(function($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        // Filtre par rôle
        if (request()->filled('role')) {
            if (request('role') === 'pending') {
                $data->whereNull('category')
                     ->orWhere('category', 0);
            } else {
                $data->where('category', request('role'));
            }
        }

        // Récupération des utilisateurs avec pagination
        $data = $data->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.controlUser', compact('data'));
    }
    public function getNewNumber()
    {   
        $data=User::where('category',null)->get();
        return view('admin/newUsers',['data'=>$data]);
    }
    public function DeleteUser(Request $request,$id)
    {   
        $data=User::find($id);
        if(empty($data))
        {
            $request->session()->flash('err', 'aucun utilisateur trouver');
        }
        if($data)
        {
           if($data->delete()==1)
           {
            $request->session()->flash('succ', 'supprimer avec succes');
           }
           else
           {
            $request->session()->flash('err', 'supprimer impossible');
           }
        }
        return redirect('admin/controluser');
    }
    public function updateGatg(Request $request, $id)
    {
        $data = User::find($id);
        if($data) {
            if($request->category == "2" || $request->category == "1" || $request->category == "3") {
                $data->update($request->all());
                if($request->ajax()) {
                    return response()->json(['success' => true]);
                }
                return redirect('admin/controluser')->with('succ', 'Modifié avec succès');
            }
        }
        
        if($request->ajax()) {
            return response()->json(['success' => false]);
        }
        return redirect('admin/controluser')->with('err', 'Une erreur est survenue');
    }
    public function delete_studiant_from_group(Request $request,$id)
    {
        $data=User::find($id);
        if(!empty($data))
        {
            $data->idGroup=NULL;
            $data->save();
            $request->session()->flash('succ', 'etudiant supprimer');
        }else
        {
            $request->session()->flash('err', "Etudiant n'est pas inscrit dans cette groupe");
        }
        return redirect()->back();

    }
    public function delete_section_from_group(Request $request,$id)
    {
        $data=Section::find($id);
        if(!empty($data))
        {
            $data->delete();
            $request->session()->flash('succ', 'Section supprimer');
        }else
        {
            $request->session()->flash('err', "Section n'est pas definie dans cette groupe");
        }
        return redirect()->back();

    }

    public function index()
    {
        $groups = groupModel::all()->map(function($group) {
            $group->studentCount = User::where('idGroup', $group->id)->count();
            $group->sectionCount = section::where('group_id', $group->id)->count();
            return $group;
        });
        
        $user = User::where('idGroup', null)
                    ->where('category', 3)
                    ->get();

        return view('admin/controlGroup', [
            'group' => $groups,
            'user' => $user
        ]);
    }
    public function addGroup(Request $request)
    {
        $grp = new groupModel();
        $grp->name = $request->name;
        $grp->save();
        
        if($request->studiant) {
            for($i = 0; $i < count($request->studiant); $i++) {
                $data = User::find($request->studiant[$i]);
                $data->idGroup = $grp->id;
                $data->save();
            }
        }
        
        $request->session()->flash('succ', 'Groupe créé avec succès');
        return redirect('admin/controlGroup');
    }
    public function deleteGroupe(Request $request, $id)
    {
        groupModel::find($id)->delete();
        $request->session()->flash('succ', 'Groupe supprimé avec succès');
        return redirect('admin/controlGroup');
    }
    public function updateNameGroupe(Request $request, $id)
    {
        $data = groupModel::find($id);
        $data->name = $request->namee;
        $data->save();
        $request->session()->flash('succ', 'Groupe mis à jour avec succès');
        return redirect('admin/controlGroup');
    }
    public function infoGroup($id)
    {
        $grpInfo=groupModel::find($id);
        $users=User::where('idGroup',$id)->get();
        $notAffect=User::where('idGroup',null)->where('category' ,3)->get();
        $section=DB::select('select s.*,u.name from section s,users u  where s.group_id = :id and u.id=s.teacher_id', ['id' => $id]);
        $teacher=User::where('category',2)->get();
        return view("admin/groupinformation",['grpInfo'=>$grpInfo,'users'=>$users,'section'=>$section,'teacher'=>$teacher,'notAffect'=>$notAffect]);
    }
    public function addteacher(Request $request,$id)
    {
        $sct = new section();
        $sct->namesection=$request->name;
        $sct->description=$request->objectif;
        $sct->group_id=$id;
        $sct->teacher_id=$request->teacher;
        $sct->save();
        return back();
    }
    public function affecterEtucdiant(Request $request,$id)
    {
        $etd=User::find($request->notAff);
        if(!empty($etd))
        {
            $request->session()->flash('succ', 'etudiant affecter avec succes');
            $etd->idGroup=$id;
            $etd->save();
        }
        return back();
    }
}
