<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends ShareSystem_Model {

    public $tableName = 'user';
    public $tableId = 'userId';

    public function __construct() {
        parent::__construct();
    }
    
    public function editPassword($userId, $oldPassword, $newPassword) {
        $userInfo = $this->getOneById($userId);
        if($userInfo->userPassword !== $this->passwordHash($oldPassword)) {
            return -1;
        }
        $this->updateById([
            'userPassword' => $this->passwordHash($newPassword)
        ], $userId);
        return $this->passwordHash($newPassword);
    }

    public function loginByUser($user, $password) {
        $userInfo = $this->table()->or_where([
                    'userName' => $user,
                    'userEmail' => $user
                ])->get()->first_row();
        if (empty($userInfo)) {
            return false;
        } elseif ($userInfo->userPassword !== $this->passwordHash($password)) {
            return false;
        } else {
            return $userInfo;
        }
    }

    public function checkUser($username, $email) {
        $userInfo = $this->table()->or_where([
                    'userName' => $username,
                    'userEmail' => $email
                ])->get()->first_row();
        if ($userInfo) {
            return false;
        } else {
            return true;
        }
    }

    public function updateByUser($userId, $data) {
        if (empty($userId)) {
            return false;
        }
        if ($data['userPassword']) {
            $data['userPassword'] = $this->passwordHash($data['userPassword']);
        }
        $this->updateById($data, $userId);
    }

    public function regUser($userName, $password, $email = '', $roles = 1) {
        $userId = $this->addData([
            'userName' => $userName,
            'userPassword' => $this->passwordHash($password),
            'userEmail' => $email,
            'userType' => $roles,
        ]);
        if ($roles == 1) {
            $this->callModel('resume_model')->addData(['userId' => $userId]);
        } else {
            $cid = $this->callModel('company_model')->addData(['userId' => $userId]);
            $this->updateById(['companyId' => $cid], $userId);
        }
    }

    private function passwordHash($password) {
        return md5(trim($password));
    }

}
