<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instalib extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->config('mainconfig');
        $this->load->model('Database');
    }
    public function follow()
    {
        $data['list_config'] = $this->config->config;
        if (!$this->session->userdata('credentials')) :
            redirect(base_url());
        else :
            $ses = $this->session->userdata('credentials');
            $con['returnType'] = 'single';
            $con['conditions'] = array(
                'user_id' => $ses['user_id'],
            );
            $db_orang = $this->Database->getData($con);
            if ($db_orang['poin'] < 1) :
                print_r(json_encode(array('result' => 0, 'content' => '<div class="alert alert-warning alert-dismissible">
                <h3>INFORMASI!</h3> Poin anda tidak mencukupi, datang lagi 6jam atau besok jika ingin mendapatkan bonus.
              </div>')));
            else :
                $sql = array(
                    'poin' => $db_orang['poin'] - 1,
                );
                $this->Database->update($sql, $ses["user_id"]);
                $jumlah = rand(1, 4);
                sleep(3);
                $rand = $this->Database->randGet($jumlah);
                foreach ($rand as $member) :
                    $instagram = new Apiig($member['useragent'], $member['user_id'], $member['session']);
                    $instagram->follow($ses['username']);
                endforeach;
                sleep(3);
                print_r(json_encode(array('result' => 0, 'content' => '<div class="alert alert-success alert-dismissible">
                <h4>INFORMASI!</h4> Followers+/Pengikut+ anda sudah ditambahkan nikmati layanan kami lainnya, ajak teman-teman kamu untuk mendapatkan poin tambahan.
              </div>')));
            endif;
        endif;
    }

    public function likes()
    {
        $data['list_config'] = $this->config->config;
        if (!$this->session->userdata('credentials')) :
            redirect(base_url());
        else :
            print_r(json_encode(array('result' => 0, 'content' => '<div class="alert alert-warning alert-dismissible">
                <h3>INFORMASI!</h3> Layanan ini sedang dalam tahap perbaikan info lebih lanjut akan diberikan informasi dalam web.
              </div>')));
        // $ses = $this->session->userdata('credentials');
        // $con['returnType'] = 'single';
        // $con['conditions'] = array(
        //     'user_id' => $ses['user_id'],
        // );
        // $db_orang = $this->Database->getData($con);
        // if ($db_orang['poin'] < 1) :
        //     print_r(json_encode(array('result' => 0, 'content' => '<div class="alert alert-warning alert-dismissible">
        //     <h3>INFORMASI!</h3> Poin anda tidak mencukupi, datang lagi 6jam atau besok jika ingin mendapatkan bonus.
        //   </div>')));
        // else :
        //     $sql = array(
        //         'poin' => $db_orang['poin'] - 1,
        //     );
        //     $this->Database->update($sql, $ses["user_id"]);
        //     $jumlah = rand(1, 4);
        //     sleep(3);
        //     $rand = $this->Database->randGet($jumlah);
        //     foreach ($rand as $member) :
        //         $instagram = new Apiig($member['useragent'], $member['user_id'], $member['session']);
        //         $instagram->follow($ses['username']);
        //     endforeach;
        //     sleep(3);
        //     print_r(json_encode(array('result' => 0, 'content' => '<div class="alert alert-success alert-dismissible">
        //     <h4>INFORMASI!</h4> Followers+/Pengikut+ anda sudah ditambahkan nikmati layanan kami lainnya, ajak teman-teman kamu untuk mendapatkan poin tambahan.
        //   </div>')));
        // endif;
        endif;
    }
}
