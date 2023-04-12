<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Mail\UserCreatedMail;

use App\Models\UserAddress;

use App\Events\NewuserCreated;

use App\Models\UserMobile;

use Rap2hpoutre\FastExcel\FastExcel;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Jobs\NewUserJob;

use App;

class FrondEndController extends Controller
{
    public function homepage()
    {
        if(cache()->has('users')){
            $users=cache()->get('users');
        }else{
        // $users=User::active()->latest()->limit(10)->skip(5)->get();
            $users=User::withCount('orders')->withTrashed()->paginate(10);
            cache()->put('users',$users);
        }
        return view('welcome',compact('users'));
    }
    public function aboutus()
    {
        return view('about_us');
    }
    public function contactus()
    {
        Artisan::call('delete:inactive_users');
        return view('contact');
    }
    public function create()
    {
        return view('users.create');
    }
    public function save()
    {
        request()->validate([
            'name' => 'required|min:10',
            'email' => 'required',
            'dob' => 'required'
        ]);
        
        $input=[
            'name'=>request('name'),
            'email'=>request('email'),
            'dob'=>request('dob'),
            'status'=>request('status')
        ];
        if(request()->hasFile('image')){
           $extension=request('image')->extension();
           $fileName='user_pic'.time().'.'.$extension;
           request('image')->storeAs('images',$fileName);
           $input['image'] = 'images/' . $fileName;
        }
        
        // cache()->forget('users');
        $user=User::create($input);

        NewUserJob::dispatch($user);

        
        
    //    User::withoutEvents(function() use($user){
    //     User::create($user);
    //    });
        // $user=new User();
        // $user->name=$name;
        // $user->email=$email;
        // $user->dob=$dob;
        // $user->status=$status;
        // $user->save();
        // $user=User::firstOrCreate([
        //     'email'=>request('email')
        // ],[
        //     'name'=>request('name'),
        //     'dob'=>request('dob'),
        //     'status'=>request('status'),
        // ]);
        // $user=User::updateOrCreate([
        //     'email'=>request('email')
        // ],[
        //     'name'=>request('name'),
        //     'dob'=>request('dob'),
        //     'status'=>request('email'),
        // ]);
        return redirect()->route('home')
        ->with('message','user created successfully');
    }
    public function delete($user_id)
    {
        $user=User::find(decrypt($user_id));
        if ($user != null) {
        $user->delete();
        }
        return redirect()->route('home')
        ->with('message','user deleted successfully');
    }
    public function activate($user_id)
    {
        $user=User::withTrashed()->find(decrypt($user_id));
        $user->restore();
        return redirect()->route('home')
        ->with('message','user activated successfully');
    }
    public function forceDelete($user_id)
    {
        $user=User::find(decrypt($user_id))->forceDelete(); 
        return redirect()->route('home')
        ->with('message','user force deleted successfully');
    }
    public function edituser($user_id)
    {
        $user=User::find(decrypt($user_id));
        return view('users.edit',compact('user'));
    }
    public function updateuser()
    {
        $user_id=(decrypt(request('user_id')));
        $user=User::find($user_id);
        $user->update([
            'name'=>request('name'),
            'email'=>request('email'),
            'dob'=>request('dob'),
            'status'=>request('status')
        ]);
        return redirect()->route('home')
        ->with('message','user updated successfully');
    }
    public function viewuser($user_id)
    {
        // $user=User::find(decrypt($user_id));
        $user=User::find(decrypt($user_id));
        return view('users.view',compact('user'));
    }
    public function subhome()
    {
       return view('home');
    }

    public function submit()
    {
       $user=UserMobile::create([
        'name' => request('name'),
        'email' => request('email'), 
        'mobile' => request('mobile')
       ]);
       NewuserCreated::dispatch($user);
       return $user;
    }
    public function export()
    {
        $users=User::all();
        return (new FastExcel($users))->download('users_export.xlsx',function($user){
            return [
                'name' => $users->name,
                'email' => $users->email,
                'status' => $users->status_text,
            ];
        });
    }
    public function pdf()
    {
        $users=User::get()->toArray();
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML($users);
        // return $pdf->stream();
        $pdf = Pdf::loadView('pdf.invoice', ['users'=>$users]);
        return $pdf->download('invoice.pdf');
    }
}
