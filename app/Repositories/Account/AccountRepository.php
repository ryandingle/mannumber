<?php

namespace App\Repositories\Account;

use App\Repositories\Account\AccountInterface;
use App\User;
use Auth;

class AccountRepository implements AccountInterface
{
    private $account;

    public function __construct(User $account)
    {
        $this->account = $account;
    }

    public function all()
    {
        return $this->account->all();
    }

    public function get($where, $rows)
    {
        return $this->account->select($rows)->where($where)->get();
    }

    public function store($data)
    {
        
    }

    public function edit($id)
    {
        return $this->account->find($id);
    }

    public function update($id, $data)
    {
        $user_data = [
            'name'             => $data['firstname'].'&nbsp;'.$data['middlename'].'&nbsp;'.$data['lastname'],
            'firstname'        => $data['firstname'],
            'middlename'       => $data['middlename'],
            'lastname'         => $data['lastname'],
            'username'         => $data['username'],
            'email'            => $data['email'],
            'employee_no'      => $data['employee_no'],
            'sss_no'           => $data['sss_no'],
            'password'         => bcrypt($data['password']),
            'updated_by'       => Auth::user()->id,
            'updated_at'       => date('Y-m-d H:i:s'),
        ];

        if($data['password'] == '' && $data['password_confirmation'] == '')
        {
            unset($user_data['password']);
        }

        $this->account->where('id', $id)->update($user_data);
        
        return $this->show($id);
    }

    public function show($id)
    {
        return $this->account->find($id);
    }

    public function destroy($id)
    {
        return $this->account->destroy($id);
    }

    public function count($where)
    {
        return $this->account->where($where)->count();
    }

    public function countList()
    {
        return $this->account->count();
    }

    public function update_profile_picture($id, $data)
    {
        return $this->account->where('id', $id)->update(['image' => $data]);
    }

}