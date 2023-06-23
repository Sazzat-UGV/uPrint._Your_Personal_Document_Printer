<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AccountController extends Controller
{

    public function IndexPage()
    {
        $students=User::with('department:id,name')->where('role_id',2)->where('is_system_admin',0)->latest('updated_at')->select('id','updated_at','name','student_id','balance','department_id')->get();
        
        return view('backend.pages.account.index',compact('students'));
    }



    public function AddBalancePage($student_id)
    {
        $student=User::where('student_id',$student_id)->select('id','student_id')->get();
        return view('backend.pages.account.recharge',compact('student'));
    }


    public function AddBalance(Request $request, $student_id)
    {
        $validation = $request->validate([
            'recharge_amount' => 'required|numeric'
        ]);

        $user = User::where('student_id', $student_id)->first();

        if (!$user) {
            // Handle the case when no user is found with the given student ID
            Toastr::error('User not found!');
            return redirect()->route('admin.accountIndexPage');
        }

        $old_balance = $user->balance;
        $new_balance = $old_balance + $request->recharge_amount;

        $user->update([
            'balance' => $new_balance,
        ]);

        Toastr::success('Account Recharge Successfully!');
        return redirect()->route('admin.accountIndexPage');
    }



    public function RemoveBalancePage($student_id)
    {
        $student=User::where('student_id',$student_id)->select('id','student_id')->get();
        return view('backend.pages.account.discharge',compact('student'));
    }


    public function RemoveBalance(Request $request, $student_id)
    {
        $validation = $request->validate([
            'remove_amount' => 'required|numeric'
        ]);

        $user = User::where('student_id', $student_id)->first();

        if (!$user) {
            // Handle the case when no user is found with the given student ID
            Toastr::error('User not found!');
            return redirect()->route('admin.accountIndexPage');
        }

        $old_balance = $user->balance;
        $new_balance = $old_balance - $request->remove_amount;

        $user->update([
            'balance' => $new_balance,
        ]);

        Toastr::success('Account Discharge Successfully!');
        return redirect()->route('admin.accountIndexPage');
    }

}
