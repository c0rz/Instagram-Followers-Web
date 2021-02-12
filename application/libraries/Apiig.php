<?php
require "autoload.php";

use c0rz\InstagramPHP\Instagram;

class Apiig
{
    private $UserAgent;
    private $userId;
    private $sessionId;

    public function __construct($useragent = null, $userId = null, $sessionid = null)
    {
        $this->UserAgent = $useragent;
        $this->userId = $userId;
        $this->sessionId = $sessionid;
    }

    public function login($username, $password, $useragent = null)
    {
        if ($useragent) {
            $instagram = new Instagram($useragent);
            $account = json_decode($instagram->login_account($username, $password));
            return $account;
        } else {
            $instagram = new Instagram();
            $account = json_decode($instagram->login_account($username, $password));
            return $account;
        }
    }

    public function follow($username)
    {
        if ($this->UserAgent && $this->userId && $this->sessionId) {
            $instagramId = new Instagram($this->UserAgent, $this->userId, $this->sessionId);
            $getInfo = $instagramId->follow_user($username);
            return $getInfo;
        } else {
            return false;
        }
    }

    public function likes($media_id)
    {
        if ($this->UserAgent && $this->userId && $this->sessionId) {
            $instagramId = new Instagram($this->UserAgent, $this->userId, $this->sessionId);
            $getInfo = $instagramId->likes_photo($media_id);
            return $getInfo;
        } else {
            return false;
        }
    }

    public function getUser(string $username)
    {
        $user_id = file_get_contents('https://www.instagram.com/' . $username . '/');
        $re      = '/sharedData\s=\s(.*[^\"]);<.script>/ixU';

        preg_match_all($re, $user_id, $id_username, PREG_SET_ORDER);

        $data = json_decode($id_username[0][1], true);

        return $data['entry_data']['ProfilePage']['0']['graphql']['user'];
    }
}
