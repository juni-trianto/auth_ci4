<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_model extends model
{

    public function register_user($data, $token, $email)
    {
        $this->db->table('users')->insert($data);
        $this->db->table('user_token')->insert(['email' => $email , 'token' => $token, 'created_at' => date('Y-m-d H:i:s') ]);
    }

    public function verify($email)
    {
        return $this->db->table('users')->getWhere(['email' => $email])->getRowArray();
    }

    public function cek_token($token)
    {
        return $this->db->table('user_token')->getWhere(['token' => $token])->getRowArray();

    }

    public function active($user_email, $user_id)
    {
        $this->db->table('users')->set('active', 1)->where('email', $user_email)->update();

        $this->db->table('user_token')->where('email', $user_email)->delete();

        $this->db->table('user_group')->insert(['user_id' => $user_id , 'group_id' => 2 ]);
    }

    public function cek_user_login($email)
    {
        return $this->db->table('users')->join('user_group', 'user_group.user_id=users.id_user')->join('groups', 'groups.id_group=user_group.group_id')->getWhere(['email' => $email])->getRowArray();
    }

    public function last_login($data, $get_email)
    {
        $this->db->table('users')->update($data , ['email' => $get_email]);
    }

    public function get_all_user()
    {
        return $this->db->table('users')->get()->getResultArray();
    }

    public function reset_password($data){

        $this->db->table('user_token')->insert($data);
    }

    public function delete_user_token($user_email)
    {
        $this->db->table('user_token')->where('email', $user_email)->delete();
    }

    public function change_password($data, $email)
    {
        $this->db->table('users')->update($data ,['email' => $email ]);
        $this->db->table('user_token')->where('email', $email)->delete();
    }
  
    public function get_detail_user($id)
    {
        return $this->db->table('users')->join('user_group', 'user_group.user_id=users.id_user')->join('groups', 'groups.id_group=user_group.group_id')->getWhere(['id_user' => $id])->getRowArray();
    }

    public function get_group()
    {
        return $this->db->table('groups')->get()->getResultArray();
    }

    public function ubah_roles_user($id, $group)
    {
        $this->db->table('user_group')->update(['user_id' => $id, 'group_id' => $group],['user_id' => $id ] );
    }

    public function tambah_group($data)
    {
        $this->db->table('groups')->insert($data);
    }

    public function cek_email_change_password($email)
    {
        return $this->db->table('users')->getWhere(['email' => $email ])->getRowArray();
    }

    public function update_user($email, $data)
    {
        $this->db->table('users')->update($data, ['email' => $email ]);
    }

   
}
