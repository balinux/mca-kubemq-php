<?php

namespace Usdidev\McaKubemqPhp\Services;

class McaKubemqPhp
{

    // /**
    //  * @var Address
    //  */
    // protected $address;


    // /**
    //  * Session constructor.
    //  *
    //  * @param Address $address
    //  */
    // public function __construct($address)
    // {
    //     $this->address = $address;
    // }

    public static function dump()
    {
        dd('dumping kube mq package');
    }

    /**
     * Sending Message.
     *
     * @param Address $address
     */
    public static function sendMessage($address, $port, $channel, $clientid)
    {
        $curl = curl_init();

        $post_fields = json_encode(array(
            "EventID" => "1234-5678-90",
            "ClientID" => $clientid,
            "Channel" => $channel,
            "Metadata" => "some-metadata",
            "Body" => base64_encode(json_encode(array(
                "id_sso" => "32018000182",
                "message_text" => '[SIRAISA]
                Ada surat masuk dari Rektor
                DETAIL SURAT 
                <strong>Perihal:</strong> 
                        BERITA ACARA SERAH TERIMA BARANG MILIK NEGARA KONOHA
                <strong>Sifat surat:</strong> Biasa
                        
                <strong>Tgl. Surat:</strong> 09-11-2020
                <strong>LAMPIRAN FILE</strong> 
                <a href="https://siraisa.unud.ac.id/uploads/surat-keluar/BAST_FEB.pdf">B_UN14_PL_2020_1607569648</a>
                <a href="https://siraisa.unud.ac.id/mca/read_letter?code=IKQE5t2t4vW52F7ecGxQLbqAnJBYNwHFlFOh2ING&jabatan_penerima=59&detail_surat_id=317314" target="_blank">TANDAI SURAT INI SUDAH DIBACA!</a>'
            ))),
            "Store" => false
        ));
        // echo $post_fields;
        // exit;
        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$address}:{$port}/send/event",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $post_fields,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Accept: application/json",
                "Content-Type: text/plain"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public static function sendMeAddress()
    {
        //    echo $this->address;
    }
}
