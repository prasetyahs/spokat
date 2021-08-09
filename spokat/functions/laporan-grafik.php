<?php 

    function readGrafikTransaksi($years,$con){
        $januari = readDataAllRow($con,queryGrafikTransaksi('01',$years));
        $februari = readDataAllRow($con,queryGrafikTransaksi('02',$years));
        $maret = readDataAllRow($con,queryGrafikTransaksi('03',$years));
        $april = readDataAllRow($con,queryGrafikTransaksi('04',$years));
        $mei = readDataAllRow($con,queryGrafikTransaksi('05',$years));
        $juni = readDataAllRow($con,queryGrafikTransaksi('06',$years));
        $juli = readDataAllRow($con,queryGrafikTransaksi('07',$years));
        $agustus = readDataAllRow($con,queryGrafikTransaksi('08',$years));
        $september = readDataAllRow($con,queryGrafikTransaksi('09',$years));
        $oktober = readDataAllRow($con,queryGrafikTransaksi('10',$years));
        $november = readDataAllRow($con,queryGrafikTransaksi('11',$years));
        $desember = readDataAllRow($con,queryGrafikTransaksi('12',$years));

        $array = [
            count($januari),
            count($februari),
            count($maret),
            count($april),
            count($mei),
            count($juni),
            count($juli),
            count($agustus),
            count($september),
            count($oktober),
            count($november),
            count($desember),
        ];
        return $array;
    }

    function readGrafikLayanan($years,$con){
        $readLayanan = readDataAllRow($con,"SELECT * FROM layanan");
        $arrayIdLayanan = [];
        for($i = 0;$i < count($readLayanan); $i++){
            $idLayanan = $readLayanan[$i]['id_layanan'];
            $getCount = readDataAllRow($con,"SELECT * FROM transaksi 
                                                WHERE 
                                                    id_layanan = '$idLayanan' AND
                                                    year(transaksi_tgl) = '$years' ");
            array_push($arrayIdLayanan,count($getCount));
        }
        return $arrayIdLayanan;
    }

    function queryGrafikTransaksi($month,$years){
        $query = "SELECT * FROM transaksi 
                    WHERE 
                        month(transaksi_tgl) = '$month' AND 
                        year(transaksi_tgl) = '$years'";
        return $query;
    }