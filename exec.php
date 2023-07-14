<?php
$mFirstName = $fFirstName = $lastName = $userId = $cardCompany = $state = $emailProvider = null;

function randomUserId(){
    global $userId;
    if($userId===null)
        $userId = explode("\n", file_get_contents(__DIR__.'/uidList.txt'));

    switch(mt_rand(0,6)){
        case 0:
            // 영문 + 숫자
            shuffle($userId);
            return $userId[0].mt_rand(100,9999);
        case 1:
            // 숫자 + 영문
            shuffle($userId);
            return mt_rand(100,99999).$userId[0];
        case 2:
            // 영문 + 영문
            shuffle($userId);
            return $userId[0].$userId[1];
        case 3:
            // 영문 + 숫자 + 영문
            shuffle($userId);
            return substr($userId[0],0,3).mt_rand(100,99999).substr($userId[1],0,3);
        case 4:
            // 영문 + 영문 + 숫자
            shuffle($userId);
            return substr($userId[0],0,3).substr($userId[1],0,3).mt_rand(100,99999);
        case 5:
            // 완전 랜덤생성
            $uid = str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyz0123456789', 20));
            return substr($uid, 0,mt_rand(8,12));
        case 6:
            // 랜덤생성영문 + 숫자
            $uid = str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyz', 10));
            return substr($uid, 0,mt_rand(8,12)).mt_rand(100,99999);
    }
}

function randomMenName(){
    global $mFirstName, $lastName;
    if($mFirstName===null)
        $mFirstName = explode("\n", file_get_contents(__DIR__.'/mFirstName.txt'));
    if($lastName===null)
        $lastName = explode("\n", file_get_contents(__DIR__.'/lastName.txt'));

    shuffle($mFirstName);
    shuffle($lastName);
    return $lastName[0].$mFirstName[0];
}

function randomWomenName(){
    global $fFirstName, $lastName;
    if($fFirstName===null)
        $fFirstName = explode("\n", file_get_contents(__DIR__.'/fFirstName.txt'));
    if($lastName===null)
        $lastName = explode("\n", file_get_contents(__DIR__.'/lastName.txt'));
    shuffle($fFirstName);
    shuffle($lastName);
    return $lastName[0].$fFirstName[0];
}

function randomUserName(){
    return (mt_rand(0,1)===0)?randomMenName():randomWomenName();
}

function randomCardCompany(){
    global $cardCompany;
    if($cardCompany===null)
        $cardCompany = explode("\n", file_get_contents(__DIR__.'/cardCompany.txt'));
    shuffle($cardCompany);
    return $cardCompany[0];
}

function randomCardNumber(){
    $rand = 'mt_rand';
    return "{$rand(3000,9800)}-{$rand(1000,9999)}-{$rand(1000,9999)}-{$rand(1000,9999)}";
}

function randomState(){
    global $state;
    if($state===null)
        $state = explode("\n", file_get_contents(__DIR__.'/state.txt'));
    shuffle($state);
    return $state[0];
}

function randomEmailProvider(){
    global $emailProvider;
    if($emailProvider===null)
        $emailProvider = explode("\n", file_get_contents(__DIR__.'/emailProvider.txt'));
    shuffle($emailProvider);
    return $emailProvider[0];
}

function randomBirth(){
    $rand = 'mt_rand';
    return "{$rand(1950,2003)}년 {$rand(1,12)}월 {$rand(1,27)}일";
}

$randomUserId = "randomUserId";
$randomMenName = "randomMenName";
$randomWomenName = "randomWomenName";
$randomUserName = "randomUserName";
$randomCardCompany = "randomCardCompany";
$randomCardNumber = "randomCardNumber";
$randomState = "randomState";
$randomEmailProvider = "randomEmailProvider";
$randomBirth = "randomBirth";

for($i=1; $i<=1000; $i++)
echo <<<FAKE
===================================
> {$i}번째 거짓정보
===================================
>> 이름 : {$randomUserName()}
>> 생년월일 : {$randomBirth()}
>> 거주지 : {$randomState()}
>> 아이디 : {$randomUserId()}
>> 이메일 : {$randomUserId()}@{$randomEmailProvider()}
>> 신용카드사 : {$randomCardCompany()}
>> 신용카드번호 : {$randomCardNumber()}
FAKE;
