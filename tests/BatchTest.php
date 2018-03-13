<?php
namespace MohdNazrul\CTOSLaravelTest;


class BatchTest extends TestCase{

    public function __construct()
     {
        echo 'BatchTest';
     }

     public function testEmpty(){
         $records = [];
         $this->assertEmpty($records);

         return $records;
     }



}


