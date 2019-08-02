<?php
class job{
    public $work_num = 5;
    public $manager_num = 3;

    public function __construct()
    {
        $this->create_worker();
        $this->create_manager();
        $this->create_mission();
    }

    public function create_worker()
    {
        for(  $i=1;$i<$this->manager_num;$i++) {
            $process = new Swoole\Process( function (){
                sleep(10);
                echo getmypid(). ':正在执行任务';
            });
            $process->start();//启动进程
        }
    }

    public function create_manager()
    {
        for(  $i=1;$i<$this->manager_num;$i++) {
            $process = new Swoole\Process( function (){
                sleep(10);
                echo getmypid(). ':正在执行任务';
            });
            $process->start();//启动进程
        }
    }

    public function create_mission()
    {
        //回收子进程
        while ( $rt = new Swoole\Process::wait(true)){
            var_dump($rt);
        }
    }
}

$job = new job();