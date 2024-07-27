<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recommendations extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Skincare_model');
        $this->load->model("History_model");
        $this->load->library('auth');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        if ($this->auth->check_login_is_user() == FALSE) {
            redirect('login');
        }
    }

    public function index()
    {
    }

    public function history()
    {
        $email = $this->session->userdata("email");
        $data = array(
            'contents' => "user/history",
            'history' => $this->History_model->get_history_by_user($email),
        );

        $this->load->view('admin/index', $data);
    }

    public function check()
    {
        $data = array(
            'contents' => 'user/check_recommendation',
            'skincare' => $this->Skincare_model->get_all_skincare(),
            'jenis_skincare' => $this->Skincare_model->get_all_jenis_skincare(),
            'jenis_kulit' => $this->Skincare_model->get_all_jenis_kulit(),
        );

        $this->load->view('admin/index', $data);
    }

    public function process()
    {
        $this->form_validation->set_rules('umur', 'Umur', 'required|greater_than[11]');
        $this->form_validation->set_rules('id_jenis_skincare', 'Jenis Skincare', 'required');
        $this->form_validation->set_rules('id_jenis_kulit', 'Jenis Kulit', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('recom/check');
            return;
        }

        // get all skincare by type
        $scType = $this->input->post('id_jenis_skincare');
        $skinType = $this->input->post('id_jenis_kulit');
        $skincareList = $this->Skincare_model->get_all_skincare_by_type($scType, $skinType);

        // fuzzifikasi umur
        $lowAge = 20;
        $middleAge = 30;
        $oldAge = 40;
        $age = $this->input->post('umur');
        
        if ($age <= $lowAge) {
            $ageIndexLow = 1;
        } else if ($age >= $middleAge) {
            $ageIndexLow = 0;
        } else if ($age >= $lowAge && $age <= $middleAge){
            $ageIndexLow = ($middleAge - $age) / ($middleAge - $lowAge);
        }

        if ($age < $lowAge || $age > $oldAge) {
            $ageIndexMid = 0;
        } else if ($age >= $middleAge && $age <= $oldAge) {
            $ageIndexMid = ($oldAge - $age) / ($oldAge - $middleAge);
        } else if($age >= $lowAge && $age <= $middleAge){
            $ageIndexMid = ($age - $lowAge) / ($middleAge - $lowAge);
        }

        if ($age >= $oldAge) {
            $ageIndexOld = 1;
        } else if ($age <= $middleAge) {
            $ageIndexOld = 0;
        } else if($age >= $middleAge && $age <= $oldAge){
            $ageIndexOld = ($age - $middleAge) / ($oldAge - $middleAge);
        }

        $fuzzAge = array(
            'ageIndexLow' => $ageIndexLow,
            'ageIndexMid' => $ageIndexMid,
            'ageIndexOld' => $ageIndexOld,
        );

        // fuzzifikasi jenis kulit
        $lowSkin = 1;
        $middleSkin = 2;
        $highSkin = 3;
        $skin = $this->input->post('id_jenis_kulit');
        
        if ($skin <= $lowSkin) {
            $skinIndexLow = 1;
        } else if ($skin >= $middleSkin) {
            $skinIndexLow = 0;
        } else if ($skin >= $lowSkin && $skin <= $middleSkin){
            $skinIndexLow = ($middleSkin - $skin) / ($middleSkin - $lowSkin);
        }

        if ($skin < $lowSkin && $skin > $middleSkin) {
            $skinIndexMid = 0;
        } else if ($skin >= $middleSkin && $skin <= $highSkin) {
            $skinIndexMid = 1;
        } else if($skin >= $lowSkin && $skin <= $middleSkin){
            $skinIndexMid = ($skin - $lowSkin) / ($middleSkin - $lowSkin);
        }

        if ($skin >= $highSkin) {
            $skinIndexHigh = 1;
        } else if ($skin < $middleSkin) {
            $skinIndexHigh = 0;
        } else if($skin >= $middleSkin && $skin <= $highSkin){
            $skinIndexHigh = ($skin - $middleSkin) / ($highSkin - $middleSkin);
        }

        $fuzzSkin = array(
            'skinIndexLow' => $skinIndexLow,
            'skinIndexMid' => $skinIndexMid,
            'skinIndexHigh' => $skinIndexHigh,
        );

        $data = array(
            'age' => $fuzzAge,
            'skin' => $fuzzSkin,
        );

        $rules = $this->generateRules($fuzzAge, $fuzzSkin);
        $resultIndex = $this->deffuzifikasi($rules);

        $productLowIndex = 40;
        $productHighIndex = 60;

        $skincareIndexLowDivider = 3;
        $skincareIndexMidDivider = 3;
        $skincareIndexHighDivider = 3;

        if(count($skincareList) % 3 == 0) {
            $skincareIndexLowDivider = count($skincareList) / 3;
            $skincareIndexMidDivider = count($skincareList) / 3;
            $skincareIndexHighDivider = count($skincareList) / 3;
        } else {
            $skincareIndexLowDivider = ceil(count($skincareList) / 3);
            $skincareIndexMidDivider = ceil(count($skincareList)) / 3;
            $skincareIndexHighDivider = count($skincareList) - $skincareIndexLowDivider - $skincareIndexMidDivider;
        }

        if($resultIndex <= $productLowIndex) {
            // rekomendasi skincare mahal
            $resultRecomendationList = array_slice($skincareList, $skincareIndexLowDivider);
        } else if($resultIndex <= $productHighIndex && $resultIndex > $productLowIndex) {
            // rekomendasi skincare menengah
            $resultRecomendationList = array_slice($skincareList, $skincareIndexLowDivider, $skincareIndexMidDivider);
        } else if($resultIndex > $productHighIndex){
            // rekomendasi skincare murah
            $resultRecomendationList = array_slice($skincareList, $skincareIndexLowDivider + $skincareIndexMidDivider, $skincareIndexHighDivider);
        }

        $this->session->set_flashdata('success', $resultRecomendationList);
        redirect('recom/check');

    }

    public function generateRules($fuzzAge, $fuzzSkin) {
        // Rules Table
        // if ($ageIndex == 1 && $skin == 1) {
        //     $resultIndex = 40;
        // } else if($ageIndex == 2 && $skin == 1) {
        //     $resultIndex = 40;
        // } else if($ageIndex == 3 && $skin == 1) {
        //     $resultIndex = 20;
        // } else if ($ageIndex == 1 && $skin == 2) {
        //     $resultIndex = 100;
        // } else if($ageIndex == 2 && $skin == 2) {
        //     $resultIndex = 80;
        // } else if($ageIndex == 3 && $skin == 2) {
        //     $resultIndex = 80;
        // } else if ($ageIndex == 1 && $skin == 3) {
        //     $resultIndex = 60;
        // } else if($ageIndex == 2 && $skin == 3) {
        //     $resultIndex = 20;
        // } else if($ageIndex == 3 && $skin == 3) {
        //     $resultIndex = 40;
        // }

        $rules = array(
            0 => array(
                "k1" => $fuzzAge['ageIndexLow'],
                "k2" => $fuzzSkin['skinIndexLow'],
                "p" => min($fuzzAge['ageIndexLow'], $fuzzSkin['skinIndexLow']),
                "z" => 40,
            ),
            1 => array(
                "k1" => $fuzzAge['ageIndexMid'],
                "k2" => $fuzzSkin['skinIndexLow'],
                "p" => min($fuzzAge['ageIndexMid'], $fuzzSkin['skinIndexLow']),
                "z" => 20,
            ),
            2 => array(
                "k1" => $fuzzAge['ageIndexOld'],
                "k2" => $fuzzSkin['skinIndexLow'],
                "p" => min($fuzzAge['ageIndexOld'], $fuzzSkin['skinIndexLow']),
                "z" => 20,
            ),
            3 => array(
                "k1" => $fuzzAge['ageIndexLow'],
                "k2" => $fuzzSkin['skinIndexMid'],
                "p" => min($fuzzAge['ageIndexLow'], $fuzzSkin['skinIndexMid']),
                "z" => 100,
            ),
            4 => array(
                "k1" => $fuzzAge['ageIndexMid'],
                "k2" => $fuzzSkin['skinIndexMid'],
                "p" => min($fuzzAge['ageIndexMid'], $fuzzSkin['skinIndexMid']),
                "z" => 80,
            ),
            5 => array(
                "k1" => $fuzzAge['ageIndexOld'],
                "k2" => $fuzzSkin['skinIndexMid'],
                "p" => min($fuzzAge['ageIndexOld'], $fuzzSkin['skinIndexMid']),
                "z" => 80,
            ),
            6 => array(
                "k1" => $fuzzAge['ageIndexLow'],
                "k2" => $fuzzSkin['skinIndexHigh'],
                "p" => min($fuzzAge['ageIndexLow'], $fuzzSkin['skinIndexHigh']),
                "z" => 60,
            ),
            7 => array(
                "k1" => $fuzzAge['ageIndexMid'],
                "k2" => $fuzzSkin['skinIndexHigh'],
                "p" => min($fuzzAge['ageIndexMid'], $fuzzSkin['skinIndexHigh']),
                "z" => 20,
            ),
            8 => array(
                "k1" => $fuzzAge['ageIndexOld'],
                "k2" => $fuzzSkin['skinIndexHigh'],
                "p" => min($fuzzAge['ageIndexOld'], $fuzzSkin['skinIndexHigh']),
                "z" => 40,
            ),
            
        );
        

        return $rules;
    }

    public function deffuzifikasi($rules) {
        $zTotal = 0;
        $pTotal = 0;

        foreach($rules as $r) {
            $zTotal += $r["p"] * $r["z"];
            $pTotal += $r["p"];
        }

        return $zTotal / $pTotal;
    }
}
