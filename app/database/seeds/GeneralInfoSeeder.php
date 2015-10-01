<?php

use App\Models\GeneralInfo;

class GeneralInfoSeeder extends Seeder
{
  public function run()
  {
    GeneralInfo::truncate();
    GeneralInfo::create(array('key' => 'romy','section'=>'General','title_en' => 'About Romy Rafael','title_id' => 'Tentang Romy Rafael','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'management','section'=>'General','title_en' => 'Management Team','title_id' => 'Tim Manajemen','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'work-entertainer','section'=>'Corporate Entertainer','title_en' => 'How We Work (Corporate Entertainer)','title_id' => 'Cara Kerja Kami (Corporate Entertainer)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'work-speaker','section'=>'Corporate Speaker','title_en' => 'How We Work (Corporate Speaker)','title_id' => 'Cara Kerja Kami (Corporate Speaker)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'work-therapist','section'=>'Certified Therapist','title_en' => 'How We Work (Certified Therapist)','title_id' => 'Cara Kerja Kami (Certified Therapist)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'work-entertainer-summary','section'=>'Corporate Entertainer','title_en' => 'How We Work (Corporate Entertainer) [Summary]','title_id' => 'Cara Kerja Kami (Corporate Entertainer) [Summary]','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'work-speaker-summary','section'=>'Corporate Speaker','title_en' => 'How We Work (Corporate Speaker) [Summary]','title_id' => 'Cara Kerja Kami (Corporate Speaker) [Summary]','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'work-therapist-summary','section'=>'Certified Therapist','title_en' => 'How We Work (Certified Therapist) [Summary]','title_id' => 'Cara Kerja Kami (Certified Therapist) [Summary]','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'affirmation','section'=>'General','title_en' => 'Positive Affirmation','title_id' => 'Afirmasi Positif','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'speaker-training','section'=>'Corporate Speaker','title_en' => 'Training Program (Corporate Speaker)','title_id' => 'Program Training (Corporate Speaker)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'speaker-training','section'=>'Corporate Speaker','title_en' => 'Training Program (Certified Therapist)','title_id' => 'Program Training (Certified Therapist)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'therapy-group','section'=>'Certified Therapist','title_en' => 'Group Therapy Session','title_id' => 'Sesi Terapi Grup','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'therapy-personal','section'=>'Certified Therapist','title_en' => 'Personal Therapy Session','title_id' => 'Sesi Terapi Perorangan','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'therapist-association','section'=>'Certified Therapist','title_en' => 'Our Therapist Association','title_id' => 'Asosiasi Terapis Kami','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
	GeneralInfo::create(array('key' => 'customer-entertainer','section'=>'Corporate Entertainer','title_en' => 'Customer (Corporate Entertainer)','title_id' => 'Pelanggan (Corporate Entertainer)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'customer-speaker','section'=>'Corporate Speaker','title_en' => 'Customer (Corporate Speaker)','title_id' => 'Pelanggan (Corporate Speaker)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'customer-therapist','section'=>'Certified Therapist','title_en' => 'Customer (Certified Therapist)','title_id' => 'Pelanggan (Certified Therapist)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'show','section'=>'Corporate Entertainer','title_en' => 'Shows','title_id' => 'Jenis Show','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));

  }
}