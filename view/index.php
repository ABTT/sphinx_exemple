<?php

include Info::get('root_dir').'/Library/Sphinx/sphinxapi_1.6.php';

$cl = new SphinxClient();
$cl->SetServer( "192.168.33.100", 9312 );
$cl->SetMatchMode( SPH_MATCH_EXTENDED  );
$cl->SetRankingMode ( SPH_RANK_SPH04 );
$result = $cl->Query( 'this is my test document number two' );



echo '<h2>Пример работы Sphinx</h2>';

if ( $result === false ) {
    echo "Query failed: " . $cl->GetLastError() . ".\n"; // выводим ошибку если произошла
}
else {
    if ( $cl->GetLastWarning() ) {
        echo "WARNING: " . $cl->GetLastWarning(); // выводим предупреждение если оно было
    }

    if ( ! empty($result["matches"]) ) { // если есть результаты поиска - обрабатываем их
        foreach ( $result["matches"] as $product => $info ) {
            echo $product . "<br />"; // просто выводим id найденных товаров
        }
    }
}

echo '<pre>';
print_r($result);
/*print_r(Test::getproduct());
print_r(RightsControll::get_rights(1, 1));
print_r(Test::getproduct());
print_r(Test::getproduct());
print_r(Test::getproduct());
print_r(Test::getproduct());
print_r(RightsControll::get_rights(1, 1));print_r(RightsControll::get_rights(1, 1));
print_r(RightsControll::get_rights(1, 1));
print_r(RightsControll::get_rights(1, 1));*/
echo '</pre>';