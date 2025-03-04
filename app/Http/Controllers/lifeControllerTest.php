<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lifeControllerTest extends Controller
{
    public function showServiceContainerTest(){
        app()->bind('lifeCycleTest',function(){
            return 'ライフサイクルテスト';
        });
        $test=app()->make('lifeCycleTest');
        // dd($test,app()); 
    // サービスコンテナなしのパターん
    $message=new Message();
    $sample=new Sample($message);
    $sample->run();
    // サービスコンテナを使ってのパターン
    app()->bind('sample',Sample::class);
    $sample=app()->make('sample');
    $sample->run();
    dd($sample,app());
    }
    public function showServiceProviderTest(){
        $encrypt=app()->make('encrypter');
        $password=$encrypt->encrypt('password123');
        
        $sample=app()->make('serviceProviderTest');

        dd($sample,$password,$encrypt->decrypt($password));

    }
}
class Sample {
    public $message;
    public function __construct(Message $message){
        $this->message=$message;
    }    
    public function run(){
        $this->message->send();
    }
}

class Message{
    public function send(){
        echo('メッセージ表示');
    }
}