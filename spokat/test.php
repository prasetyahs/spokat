<?php
include __DIR__ . "/vendor/autoload.php";

use Tigo\Recommendation\Recommend; // import class
$artistRatings = array(
	"Abe" => array(
		"Blues Traveler" => 3,
		"Broken Bells" => 2,
		"Norah Jones" => 4,
		"Phoenix" => 5,
		"Slightly Stoopid" => 1,
		"The Strokes" => 2,
		"Vampire Weekend" => 2
	),
	"Blair" => array(
		"Blues Traveler" => 2,
		"Broken Bells" => 3,
		"Deadmau5" => 4,
		"Phoenix" => 2,
		"Slightly Stoopid" => 3,
		"Vampire Weekend" => 3
    ),
	"Clair" => array(
		"Blues Traveler" => 5,
		"Broken Bells" => 1,
		"Deadmau5" => 1,
		"Norah Jones" => 3,
		"Phoenix" => 5,
		"Slightly Stoopid" => 1
	)
);
$data = new \stojg\recommend\Data($artistRatings);
foreach ($artistRatings as $key => $v) {
    $recommendations = $data->recommend($key, new \stojg\recommend\strategy\Manhattan());
    echo "Rekomendasi untuk '$key' : ";
    foreach($recommendations as $recommendations){
        print_r($recommendations['key']);
    }
    echo "<br><br>";
}
