<?php

use App\Models\GeneralInfo;

class GeneralInfoSeeder extends Seeder
{
  public function run()
  {
    GeneralInfo::truncate();
    GeneralInfo::create(array('key' => 'romy','title_en' => 'About Romy Rafael','title_id' => 'Tentang Romy Rafael','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'management','title_en' => 'Management Team','title_id' => 'Tim Manajemen','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'work','title_en' => 'How We Work','title_id' => 'Cara Kerja Kami','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
  }
}