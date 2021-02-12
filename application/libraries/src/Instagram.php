<?php

namespace c0rz\InstagramPHP;

use c0rz\InstagramPHP\userAgent;

class Instagram
{
    private $UserAgent;
    private $ig_did;
    private $csrftoken;
    private $mid;
    private $userId;
    private $sessionId;

    public function __construct($useragent = null, $userId = null, $sessionid = null)
    {
        if (!empty($userId) && !empty($sessionid)) {
            $this->userId = $userId;
            $this->sessionId = $sessionid;
        } else if (!empty($useragent)) {
            $this->UserAgent = $useragent;
        } else {
            $UA = new userAgent();
            $this->UserAgent = $UA->generate();
        }
    }

    public function curl($url, $useragent, $post = null, $headers = null, $proxy = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        if ($proxy) {
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
        }
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
        if ($headers !== null) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        if ($post !== null) curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($ch);
        $header = substr($result, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        $body = substr($result, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
        $cookies = array();
        foreach ($matches[1] as $item) {
            parse_str($item, $cookie);
            $cookies = array_merge($cookies, $cookie);
        }
        return array(
            $header,
            $body,
            $cookies
        );
    }

    public function HeaderId($ig_did, $csrftoken, $mid, $userid = null, $session = null, $useragent)
    {
        if ($userid && $session) {
            return
                [
                    'Accept: */*',
                    'Accept-Language: en-US,en;q=0.5',
                    'Accept-Encoding: gzip, deflate, br',
                    'cookie: ig_did=' . $ig_did . '; mid=' . $mid . '; ig_nrcb=1; csrftoken=' . $csrftoken . '; ds_user_id=' . $userid . '; sessionid=' . $session . '; rur=NAO',
                    'x-csrftoken: ' . $csrftoken,
                    'X-Instagram-AJAX: 9d79bd80d783-hot',
                    'X-IG-App-ID: 936619743392459',
                    'X-IG-WWW-Claim: 0',
                    'Content-Type: application/x-www-form-urlencoded',
                    'X-Requested-With: XMLHttpRequest',
                    'Origin: https://www.instagram.com',
                    'Connection: keep-alive',
                    'Referer: https://www.instagram.com',
                    'Pragma: no-cache',
                    'user-agent: ' . $useragent,
                    'Cache-Control: no-cache',
                ];
        } else {
            return
                [
                    'Host: www.instagram.com',
                    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0',
                    'Accept: */*',
                    'Accept-Language: id,en-US;q=0.7,en;q=0.3',
                    'X-CSRFToken: ' . $csrftoken . '',
                    'Content-Type: application/x-www-form-urlencoded',
                    'X-Requested-With: XMLHttpRequest',
                    'Origin: https://www.instagram.com',
                    'Connection: close',
                    'Referer: https://www.instagram.com/accounts/emailsignup/',
                    'Cookie: Cookie: ig_did=' . $ig_did . '; mid=' . $mid . '; csrftoken=' . $csrftoken . '',
                    'user-agent: ' . $useragent,

                ];
        }
    }

    public function generateHeader($proxy = null): bool
    {
        $header = [
            'user-agent: ' . $this->UserAgent,
        ];
        $cURL = $this->curl('https://www.instagram.com/data/shared_data/?__a=1', $this->UserAgent, 0, $header);
        $this->ig_did = $cURL[2]['ig_did'];
        $this->csrftoken = $cURL[2]['csrftoken'];
        $this->mid = $cURL[2]['mid'];
        return true;
    }

    public function login_account($username, $password)
    {
        $this->generateHeader();
        $headers = $this->HeaderId($this->ig_did, $this->csrftoken, $this->mid, 0, 0, $this->UserAgent);
        $enc = date_timestamp_get(date_create());
        $data = 'username=' . $username . '&enc_password=#PWD_INSTAGRAM_BROWSER:0:' . $enc . ':' . $password . '&queryParams=%7B%7D&optIntoOneTap=true';
        $login = $this->curl('https://www.instagram.com/accounts/login/ajax/', $this->UserAgent, $data, $headers);
        $result = json_decode($login[1], true);
        if (@$result['userId']) {
            $sessionid = $login[2]['sessionid'];
            $message = array('status' => true, 'userId' => $result['userId'], 'csrftoken' => $this->csrftoken, 'ig_did' => $this->ig_did, 'mid' => $this->mid, 'sessionid' => $sessionid, 'user_Agent' => $this->UserAgent);
        } else if (@$login['message']) {
            $message = array('status' => false, 'message' => 'Please check your account instagram checkpoint required.');
        } else {
            $message = array('status' => false, 'message' => 'Sorry, your username/password is wrong. Please double check your instagram.');
        }
        return json_encode($message);
    }

    public function logout_account()
    {
        $headers = $this->HeaderId($this->ig_did, $this->csrftoken, $this->mid, $this->userId, $this->sessionId, $this->UserAgent);
        $data = 'one_tap_app_login=1';
        $logout = $this->curl('https://www.instagram.com/accounts/logout/ajax/', $this->UserAgent, $data, $headers);
        return $logout;
    }

    /**
     * Get data Id (Photo/Username).
     *
     * @param string $url
     *
     * @return json|string
     */

    public function infoMedia($url)
    {
        $this->generateHeader();
        $headers = $this->HeaderId($this->ig_did, $this->csrftoken, $this->mid, 0, 0, $this->UserAgent);
        $getData = $this->curl($url . '?__a=1', $this->UserAgent, 0, $headers);
        return json_decode($getData[1], true);
    }

    /**
     * Get data Id (Photo/Username).
     *
     * @param string $url
     *
     * @return json|string
     */

    private function usr2id(string $username): ?int
    {
        $user_id = file_get_contents('https://www.instagram.com/' . $username . '/');
        $re      = '/sharedData\s=\s(.*[^\"]);<.script>/ixU';

        preg_match_all($re, $user_id, $id_username, PREG_SET_ORDER);

        $data = json_decode($id_username[0][1], true);

        return $data['entry_data']['ProfilePage']['0']['graphql']['user']['id'];
    }

    public function likes_photo($mediaId)
    {
        $this->generateHeader();
        $headers = $this->HeaderId($this->ig_did, $this->csrftoken, $this->mid, $this->userId, $this->sessionId, $this->UserAgent);
        $likes = $this->curl('https://www.instagram.com/web/likes/' . $mediaId . '/like/', $this->UserAgent, 0, $headers)[1];
        return $likes;
    }

    public function follow_user($username)
    {
        $getId = $this->usr2id($username);
        $this->generateHeader();
        $headers = $this->HeaderId($this->ig_did, $this->csrftoken, $this->mid, $this->userId, $this->sessionId, $this->UserAgent);
        $follow = $this->curl('https://www.instagram.com/web/friendships/' . $getId . '/follow/', $this->UserAgent, 0, $headers)[1];
        return $follow;
    }
}
