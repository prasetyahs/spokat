<?php 

    function getDataRating($idLayanan,$con){
       
        $allBintang = getCountRating($con,$idLayanan);
        if($allBintang == null){
            $allBintang = 0;
        }else{
            $allBintang = count($allBintang);
        }
        $bintang5 = getCountRating($con,$idLayanan,5);
        if($bintang5 == null){
            $bintang5 = 0;
        }else{
            $bintang5 = count($bintang5);
        }
        
        $bintang4 = getCountRating($con,$idLayanan,4);
        if($bintang4 == null){
            $bintang4 = 0;
        }else{
            $bintang4 = count($bintang4);
        }

        $bintang3 = getCountRating($con,$idLayanan,3);
        if($bintang3 == null){
            $bintang3 = 0;
        }else{
            $bintang3 = count($bintang3);
        }
        $bintang2 = getCountRating($con,$idLayanan,2);

        if($bintang2 == null){
            $bintang2 = 0;
        }else{
            $bintang2 = count($bintang2);
        }
        $bintang1 = getCountRating($con,$idLayanan,1);
        if($bintang1 == null){
            $bintang1 = 0;
        }else{
            $bintang1 = count($bintang1);
        }
        if($allBintang != 0){

            $rata_rata =  ((5*$bintang5) + (4*$bintang4) + (3*$bintang3) + (2*$bintang2) + (1*$bintang1)) / $allBintang;
        }else{
            $rata_rata = 0;
        }

        $rating = [
            "all_bintang" => $allBintang,
            "bintang5" => $bintang5,
            "bintang4" => $bintang4,
            "bintang3" => $bintang3,
            "bintang2" => $bintang2,
            "bintang1" => $bintang1,
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