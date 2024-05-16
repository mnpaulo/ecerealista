<?php

$json['atualizacao'] = filter_input(INPUT_POST, 'data');
file_put_contents('datas.json', json_encode($json));