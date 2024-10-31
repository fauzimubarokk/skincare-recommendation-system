<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recommendations extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Skincare_model');
        $this->load->model('admin/User_model');
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

        // Nilai lowAge, middleAge, dan oldAge merupakan pembatas antara umur muda, sedang dan tua.
        $lowAge = 20;
        $middleAge = 30;
        $oldAge = 40;
        $age = $this->input->post('umur');
        
        /*
        Penghitungan index fuzzifikasi umur. Rumus yang digunakan terdapat pada paper halaman 89 - 90.
        Terletak pada poin a. Tahap Fuzzifikasi nomor 1.
         */

        // Perhitungan ageIndexLow, yaitu index untuk umur muda.
        if ($age <= $lowAge) {
            $ageIndexLow = 1;
        } else if ($age >= $middleAge) {
            $ageIndexLow = 0;
        } else if ($age >= $lowAge && $age <= $middleAge){
            $ageIndexLow = ($middleAge - $age) / ($middleAge - $lowAge);
        }

        // Perhitungan ageIndexLow, yaitu index untuk umur menengah.
        if ($age < $lowAge || $age > $oldAge) {
            $ageIndexMid = 0;
        } else if ($age >= $middleAge && $age <= $oldAge) {
            $ageIndexMid = ($oldAge - $age) / ($oldAge - $middleAge);
        } else if($age >= $lowAge && $age <= $middleAge){
            $ageIndexMid = ($age - $lowAge) / ($middleAge - $lowAge);
        }

        // Perhitungan ageIndexLow, yaitu index untuk umur tua.
        if ($age >= $oldAge) {
            $ageIndexOld = 1;
        } else if ($age <= $middleAge) {
            $ageIndexOld = 0;
        } else if($age >= $middleAge && $age <= $oldAge){
            $ageIndexOld = ($age - $middleAge) / ($oldAge - $middleAge);
        }

        // simpan nilai ageIndexLow, ageIndexMid, dan ageIndexOld kedalam array fuzzAge.
        $fuzzAge = array(
            'ageIndexLow' => $ageIndexLow,
            'ageIndexMid' => $ageIndexMid,
            'ageIndexOld' => $ageIndexOld,
        );

        // fuzzifikasi jenis kulit

        // Nilai lowSkin, middleSkin, dan highSkin merupakan pembatas antara kulit kering, normal dan berminyak.
        $lowSkin = 1;
        $middleSkin = 2;
        $highSkin = 3;
        $skin = $this->input->post('id_jenis_kulit');
        
        /*
        Penghitungan index fuzzifikasi kulit. Rumus yang digunakan terdapat pada paper halaman 89 - 90.
        Terletak pada poin a. Tahap Fuzzifikasi nomor 1.
         */

        // Perhitungan ageIndexLow, yaitu index untuk kulit kering.
        if ($skin <= $lowSkin) {
            $skinIndexLow = 1;
        } else if ($skin >= $middleSkin) {
            $skinIndexLow = 0;
        } else if ($skin >= $lowSkin && $skin <= $middleSkin){
            $skinIndexLow = ($middleSkin - $skin) / ($middleSkin - $lowSkin);
        }

        // Perhitungan ageIndexLow, yaitu index untuk kulit normal.
        if ($skin < $lowSkin && $skin > $middleSkin) {
            $skinIndexMid = 0;
        } else if ($skin >= $middleSkin && $skin <= $highSkin) {
            $skinIndexMid = 1;
        } else if($skin >= $lowSkin && $skin <= $middleSkin){
            $skinIndexMid = ($skin - $lowSkin) / ($middleSkin - $lowSkin);
        }

        // Perhitungan ageIndexLow, yaitu index untuk kulit berminyak.
        if ($skin >= $highSkin) {
            $skinIndexHigh = 1;
        } else if ($skin < $middleSkin) {
            $skinIndexHigh = 0;
        } else if($skin >= $middleSkin && $skin <= $highSkin){
            $skinIndexHigh = ($skin - $middleSkin) / ($highSkin - $middleSkin);
        }

        // simpan nilai skinIndexLow, skinIndexMid, dan skinIndexOld kedalam array fuzzSkin.
        $fuzzSkin = array(
            'skinIndexLow' => $skinIndexLow,
            'skinIndexMid' => $skinIndexMid,
            'skinIndexHigh' => $skinIndexHigh,
        );

        // simpan nilai fuzzAge dan fuzzSkin kedalam array data.
        $data = array(
            'age' => $fuzzAge,
            'skin' => $fuzzSkin,
        );

        // generate rules berdasarkan nilai dari array fuzzAge dan fuzzSkin yang telah dihitung
        $rules = $this->generateRules($fuzzAge, $fuzzSkin);

        // lakukan proses deffuzifikasi dari rules yang sudah di-generate
        $resultIndex = $this->deffuzifikasi($rules);

        // Nilai productLowIndex dan productHigh Index merupakan pembatas antara produk murah dan mahal.
        $productLowIndex = 30;
        $productHighIndex = 50;

        // Ini adalah 3 variabel untuk pembatas antar sesi produk (mahal, biasa, murah).
        /*
        Nilai default 3 karena dari jumlah dataset yang dimiliki
        kebanyakan jumlah datanya adalah bilangan kelipatan 3.
        */
        $skincareIndexLowDivider = 3;
        $skincareIndexMidDivider = 3;
        $skincareIndexHighDivider = 3;

        if(count($skincareList) % 3 == 0) {
            // Jika jumlah data skincare adalah kelipatan 3
            // maka masing-masing pembatas rumusnya: total produk dibagi tiga.
            $skincareIndexLowDivider = count($skincareList) / 3;
            $skincareIndexMidDivider = count($skincareList) / 3;
            $skincareIndexHighDivider = count($skincareList) / 3;
        } else {
            // Jika bukan kelipatan 3
            // maka hanya pembatas low(produk mahal) dan mid(produk biasa) rumusnya total produk dibagi tiga.
            // Sementara untuk high(produk murah) rumusnya: total produk - pembatas mahal - pembatas biasa
            $skincareIndexLowDivider = ceil(count($skincareList) / 3);
            $skincareIndexMidDivider = ceil(count($skincareList)) / 3;
            $skincareIndexHighDivider = count($skincareList) - $skincareIndexLowDivider - $skincareIndexMidDivider;
        }

        if($resultIndex <= $productLowIndex) {
            // rekomendasi skincare mahal
            $resultRecomendationList = array_slice($skincareList, 0, $skincareIndexLowDivider);
        } else if($resultIndex <= $productHighIndex && $resultIndex > $productLowIndex) {
            // rekomendasi skincare menengah
            $resultRecomendationList = array_slice($skincareList, $skincareIndexLowDivider, $skincareIndexMidDivider);
        } else if($resultIndex > $productHighIndex){
            // rekomendasi skincare murah
            $resultRecomendationList = array_slice($skincareList, $skincareIndexLowDivider + $skincareIndexMidDivider, $skincareIndexHighDivider);
        }

        // ambil data user yang sedang login
        $userSession = $this->session->get_userdata();
        $user = $this->User_model->get_user_by_email($userSession["email"]);

        // simpan ke tabel riwayat rekomendasi
        foreach ($resultRecomendationList as $recomendation) {

            $data = array(
                'id_pengguna' => $user->id,
                'id_skincare' => $recomendation->id,
            );

            $this->History_model->insert_history($data);
        }

        // simpan hasil perhitungan ke session untuk diteruskan ke view dengan tag 'success'
        $this->session->set_flashdata('success', $resultRecomendationList);
        redirect('recom/check');

    }


    /*
    Fungsi untuk generate rules berdasarkan hasil fuzzifikasi umur dan kulit.
    Dengan aturan sebagai berikut :
     if ($ageIndex == 1 && $skin == 1) {
         $resultIndex = 40;
     } else if($ageIndex == 2 && $skin == 1) {
         $resultIndex = 40;
     } else if($ageIndex == 3 && $skin == 1) {
         $resultIndex = 20;
     } else if ($ageIndex == 1 && $skin == 2) {
         $resultIndex = 100;
     } else if($ageIndex == 2 && $skin == 2) {
         $resultIndex = 80;
     } else if($ageIndex == 3 && $skin == 2) {
         $resultIndex = 80;
     } else if ($ageIndex == 1 && $skin == 3) {
         $resultIndex = 60;
     } else if($ageIndex == 2 && $skin == 3) {
         $resultIndex = 20;
     } else if($ageIndex == 3 && $skin == 3) {
         $resultIndex = 40;
     }

     Note :
     * Semakin besar nilai AgeIndex, maka semakin tua umurnya. ageIndex 1 berarti muda, 2 berarti sedang, 3 berarti tua.
     * skin = 1 berarti kulit kering, skin = 2 berarti kulit normal, skin = 3 berarti kulit berminyak
     * nilai p merupakan nilai minimum dari fuzzAge dan fuzzSkin yang sedang diproses
     * nilai z merupakan index hasil yang melambangkan tingkat tinggi atau rendahnya produk yang akan direkomendasikan.
        semakin kecil nilai z, maka produk yang direkomendasikan akan semakin bagus. Bagus disini berarti paling mahal.
    */
    public function generateRules($fuzzAge, $fuzzSkin) {
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

    /*
    Fungsi untuk deffuzifikasi rules yang telah diperoleh dari perhitungan.
    Dengan menggunaka rumus z = (total rules[p] x rules[z]) / (total rules[p])
    */
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
