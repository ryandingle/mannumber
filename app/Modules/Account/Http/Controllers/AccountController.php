<?php

namespace App\Modules\Account\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Account\AccountInterface;
use Auth;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    private $account;

    public function __construct(AccountInterface $account)
    {
        $this->account = $account;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account::account', [
            'data' => $this->account->show(Auth::user()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->account->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'data'              => $this->account->show($id),
            'method'            => ''.$id.'/update',
            'module'            => request('module'),
            'id'                => request('id'),
        ];

        return view('account::modal.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unique_username    = '|unique:users';
        $unique_email       = '|unique:users';
        $unique_employee_no = '|unique:users';
        $unique_sss_no      = '|unique:users';
        $password_require   = '|required';
        
        $user_check = $this->account->show($id);

        if($user_check['username']      == $request->username) $unique_username = '';
        if($user_check['email']         == $request->email) $unique_email = '';
        if($user_check['employee_no']   == $request->employee_no) $unique_employee_no = '';
        if($user_check['sss_no']        == $request->sss_no) $unique_sss_no = '';

        if($request->password == '' && $request->password_confirmation == '') $password_require = '|nullable';

        $request->validate([
            'firstname'                 => 'required',
            'middlename'                => 'nullable',
            'lastname'                  => 'required',
            'username'                  => 'required'.$unique_username.'',
            'email'                     => 'required|email'.$unique_email.'',
            'employee_no'               => 'required'.$unique_employee_no.'',
            'sss_no'                    => 'nullable'.$unique_sss_no.'',
            'password'                  => 'confirmed|min:6'.$password_require.'',
            'password_confirmation'     => ''.$password_require.'',
        ]);

        if($request->hasFile('image'))
        {
            $request->validate(['image' => 'image|mimes:png,jpg,jpeg,svg,gif']);

            $old_image = $this->account->show($id)->image;

            $db_image = str_replace(url('/storage/profile'), storage_path('app/public/profile'), $old_image); 

            if(file_exists($db_image)) unlink($db_image);

            $file           = $request->file('image');
            $ext            = $file->guessClientExtension();
            $path           = storage_path('app/public/profile');
            $image          = time().''.sha1(bcrypt(time())).'.n.'.$ext;
            $photo          = $request->file('image')->move($path, $image);
            $public         = url('/').'/storage/profile/'.$image;

            $this->account->update_profile_picture($id, $public);
        }

        $data  = $this->account->update($id, $request->all());

        return response()->json([
            'message'   => 'Successfully Updated', 
            'data'      => $data
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
