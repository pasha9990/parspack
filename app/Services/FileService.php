<?php
namespace App\Services;

class FileService {


    public function insert($text){
        $command = "echo $text >> product_comment.txt";
        shell_exec($command);
    }
    public function update($old,$new){
        $command = "sed -i 's/$old/$new/g' product_comment.txt";
        shell_exec($command);
    }
}