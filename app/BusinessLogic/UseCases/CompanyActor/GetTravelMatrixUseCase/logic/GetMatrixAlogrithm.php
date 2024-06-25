<?php
namespace App\BusinessLogic\UseCases\UserActor\GetTravelMatrixUseCase\logic;


class GetMatrixAlogrithm {


    public static function getMatrixAlogrithm(array $seatNumbers) {


    $male = [];
    $female = [];
    $n =count($seatNumbers);
    for($i=0; $i<$n; $i++)
    {
        if($seatNumbers[$i]!=0)
        {
            $male[$i]   = ['id'=> $i+1 , 'available'=>false ];
            $female[$i] = ['id'=> $i+1 , 'available'=>false ];
        }

        else
        {
            if(($i+1 < $n) && (($i+1)%2==1) )
            {
                if($seatNumbers[$i+1]==1||$seatNumbers[$i+1]==0)
                    $male[$i]=['id'=> $i+1 , 'available'=>True ];
                else
                   $male[$i]=['id'=> $i+1 , 'available'=>False ];

                if($seatNumbers[$i+1]==2||$seatNumbers[$i+1]==0)
                    $female[$i]=['id'=> $i+1 , 'available'=>True ];
                else
                    $female[$i]=['id'=> $i+1 , 'available'=>False ];
            }
            else
            {
                if($seatNumbers[$i-1]==1||$seatNumbers[$i-1]==0)
                    $male[$i]=['id'=> $i+1 , 'available'=>True ];
                else
                    $male[$i]=['id'=> $i+1 , 'available'=>False ];
                if($seatNumbers[$i-1]==2||$seatNumbers[$i-1]==0)
                    $female[$i]=['id'=> $i+1 , 'available'=>True ];
                else
                    $female[$i]=['id'=> $i+1 , 'available'=>False ];
            }
        }
    }

    return [
        "maleMatrix" => $male,
        "femaleMatrix" => $female,
    ];

}

}

