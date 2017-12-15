<?php

namespace App\Repositories\User;

use App\Repositories\User\UserInterface;
use App\User;
use Auth;

class UserRepository implements UserInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->all();
    }

    public function get($where, $rows)
    {
        return $this->user->select($rows)->where($where)->get();
    }

    public function store($data)
    {
        $id = $this->user->insertGetId([
            'name'                      => $data['firstname'].' '.$data['middlename'].' '.$data['lastname'],
            'firstname'                 => $data['firstname'],
            'middlename'                => $data['middlename'],
            'lastname'                  => $data['lastname'],
            'username'                  => $data['username'],
            'email'                     => $data['email'],
            'employee_no'               => $data['employee_no'],
            'sss_no'                    => $data['sss_no'],
            'password'                  => bcrypt($data['password']),
            'status'                    => $data['status'],
            'created_at'                => date('Y-m-d H:i:s'),
            'created_by'                => Auth::user()->id
        ]);

        return $this->show($id);
    }

    public function edit($id)
    {
        return $this->user->find($id);
    }

    public function update($id, $data)
    {
        $user_data = [
            'name'             => $data['firstname'].' '.$data['middlename'].' '.$data['lastname'],
            'firstname'        => $data['firstname'],
            'middlename'       => $data['middlename'],
            'lastname'         => $data['lastname'],
            'username'         => $data['username'],
            'email'            => $data['email'],
            'employee_no'      => $data['employee_no'],
            'sss_no'           => $data['sss_no'],
            'password'         => bcrypt($data['password']),
            'status'           => $data['status'],
            'updated_by'       => Auth::user()->id,
            'updated_at'       => date('Y-m-d H:i:s'),
        ];

        if($data['password'] == '' && $data['password_confirmation'] == '')
        {
            unset($user_data['password']);
        }

        $this->user->where('id', $id)->update($user_data);
        
        return $this->show($id);
    }

    public function show($id)
    {
        return $this->user->find($id);
    }

    public function destroy($id)
    {
        return $this->user->destroy($id);
    }

    public function count($where)
    {
        return $this->user->where($where)->count();
    }

    public function countList()
    {
        return $this->user->count();
    }

}