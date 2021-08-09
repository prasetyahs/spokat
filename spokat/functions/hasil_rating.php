<?php 

    function getDataRating($idLayanan,$con){
       
        $allBintang = getCountRating($con,$idLayanan);
        $bintang5 = getCountRating($con,$idLayanan,5);
        $bintang4 = getCountRating($con,$idLayanan,4);
        $bintang3 = getCountRating($con,$idLayanan,3);
        $bintang2 = getCountRating($con,$idLayanan,2);
        $bintang1 = getCountRating($con,$idLayanan,1);
        $rata_rata =  ((5*count($bintang5)) + (4*count($bintang4)) + (3*count($bintang3)) + (2*count($bintang2)) + (1*count($bintang1))) / count($allBintang);
        $rating = [
            "all_bintang" => count($allBintang),
            "bintang5" => count($bintang5),
            "bintang4" => count($bintang4),
            "bintang3" => count($bintang3),
            "bintang2" => count($bintang2),
            "bintang1" => count($bintang1),
            "rata_rata" => $rata_rata
        ];
        return $rating;

    }

    function getCountRating($con,$idLayanan,$rating = null){
        $bintang = [];
        if($rating == null){
            $bintang = readDataAllRow($con,"SELECT * FROM tb_rating 
                                                JOIN transaksi ON tb_rating.id_transaksi = transaksi.transaksi_id
                                                WHERE id_layanan = $idLayanan");
            
        }else{
            $bintang = readDataAllRow($con,"SELECT * FROM tb_rating 
                                                JOIN transaksi ON tb_rating.id_transaksi = transaksi.transaksi_id
                                                WHERE id_layanan = $idLayanan AND
                                                rate = $rating");
        }
        return $bintang;
    }