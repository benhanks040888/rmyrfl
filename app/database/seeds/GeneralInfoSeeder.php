<?php

use App\Models\GeneralInfo;

class GeneralInfoSeeder extends Seeder
{
  public function run()
  {
    GeneralInfo::truncate();
    GeneralInfo::create(array('key' => 'romy','title_en' => 'About Romy Rafael','title_id' => 'Tentang Romy Rafael','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'management','title_en' => 'Management Team','title_id' => 'Tim Manajemen','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'work-entertainer','title_en' => 'How We Work (Corporate Entertainer)','title_id' => 'Cara Kerja Kami (Corporate Entertainer)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'work-speaker','title_en' => 'How We Work (Corporate Speaker)','title_id' => 'Cara Kerja Kami (Corporate Speaker)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'work-therapist','title_en' => 'How We Work (Certified Therapist)','title_id' => 'Cara Kerja Kami (Certified Therapist)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'work-entertainer-summary','title_en' => 'How We Work (Corporate Entertainer) [Summary]','title_id' => 'Cara Kerja Kami (Corporate Entertainer) [Summary]','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'work-speaker-summary','title_en' => 'How We Work (Corporate Speaker) [Summary]','title_id' => 'Cara Kerja Kami (Corporate Speaker) [Summary]','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'work-therapist-summary','title_en' => 'How We Work (Certified Therapist) [Summary]','title_id' => 'Cara Kerja Kami (Certified Therapist) [Summary]','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'affirmation','title_en' => 'Positive Affirmation','title_id' => 'Afirmasi Positif','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'speaker-training','title_en' => 'Training Program (Corporate Speaker)','title_id' => 'Program Training (Corporate Speaker)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'speaker-training','title_en' => 'Training Program (Certified Therapist)','title_id' => 'Program Training (Certified Therapist)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'therapy-group','title_en' => 'Group Therapy Session','title_id' => 'Sesi Terapi Grup','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'therapy-personal','title_en' => 'Personal Therapy Session','title_id' => 'Sesi Terapi Perorangan','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'therapist-association','title_en' => 'Our Therapist Association','title_id' => 'Asosiasi Terapis Kami','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
	GeneralInfo::create(array('key' => 'customer-entertainer','title_en' => 'Customer (Corporate Entertainer)','title_id' => 'Pelanggan (Corporate Entertainer)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'customer-speaker','title_en' => 'Customer (Corporate Speaker)','title_id' => 'Pelanggan (Corporate Speaker)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));
    GeneralInfo::create(array('key' => 'customer-therapist','title_en' => 'Customer (Certified Therapist)','title_id' => 'Pelanggan (Certified Therapist)','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')));

  }
}