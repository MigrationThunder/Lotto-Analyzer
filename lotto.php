<?php
header('Content-Type: application/json');

// 1회차부터 현재 회차(1160)까지 데이터 수집
$lottoData = [];
for ($draw = 1; $draw <= 1160; $draw++) {
    $url = "https://www.dhlottery.co.kr/common.do?method=getLottoNumber&drwNo=$draw";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    if ($data['returnValue'] === 'success') {
        $lottoData[$draw] = [
            $data['drwtNo1'], $data['drwtNo2'], $data['drwtNo3'],
            $data['drwtNo4'], $data['drwtNo5'], $data['drwtNo6']
        ];
    }
}

// JSON으로 출력 (클라이언트에서 사용할 수 있게)
echo json_encode($lottoData);
?>