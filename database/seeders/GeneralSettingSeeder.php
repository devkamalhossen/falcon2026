<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'key' => 'site_name',
                'value' => 'Falcon Solution Limited'
            ],
            [
                'key' => 'site_logo',
                'value' => 'frontend/assets/images/logo.png'
            ],
            [
                'key' => 'hotline',
                'value' => '+88 01329 74 22 00'
            ],
            [
                'key' => 'phone',
                'value' => '+880 1744-798865'
            ],
            [
                'key' => 'email',
                'value' => 'falconsolution18@gmail.com'
            ],
            [
                'key' => 'favicon',
                'value' => 'frontend/assets/images/favicon.png'
            ],
            [
                'key' => 'address',
                'value' => 'Flat#4/6, House#1/5 Mizan Tower, Kallyanpur Bus Stand, Kallyanpur, Dhaka-1207, Bangladesh.'
            ],
            [
                'key' => 'copyright_text',
                'value' => 'Falcon Solution BD. All Rights Reserved.'
            ],
            [
                'key' => 'meta_title',
                'value' => 'Epoxy and Pu Flooring in Bangladesh'
            ],
            [
                'key' => 'meta_description',
                'value' => 'Falcon Solution Ltd is a Green &amp; Sustainable Solutions for Industrial, Commercial and Residential Flooring &amp; Construction Chemicals Company. We are dealing with all types of Construction Chemicals like Waterproofing Solution, Floor Hardener, Fair Face Plaster, Epoxy Floor Chanting and all types of Industrial, Commercial &amp; Residential Flooring system like PU Flooring, Epoxy Flooring, Metallic Flooring, Self-leveling Epoxy Flooring, 3D epoxy Flooring, Vinyl Flooring, Polished Concrete etc.'
            ],
            [
                'key' => 'meta_keywords',
                'value' => 'PU Flooring In Bangladesh, Epoxy Flooring In Bangladesh, Waterproofing in Bangladesh'
            ],
            [
                'key' => 'google_map_location',
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d459.23563441218937!2d90.36146773674514!3d23.777942113567065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1eacabf291d%3A0x6055c88d64fb0dd6!2sFalcon%20Solution%20Ltd%20-%20PU%20%26%20Epoxy%20Flooring%20in%20Bangladesh!5e1!3m2!1sen!2sbd!4v1752762707801!5m2!1sen!2sbd'
            ],
        
            [
                'key' => 'fb_pixel_meta_tags',
                
            ],
            [
                'key' => 'fb_pixel_scripts',
                'value' => ''
            ],
            [
                'key' => 'google_meta_tags',
               
            ],
            [
                'key' => 'google_scripts',
                
            ],
            [
                'key' => 'mail_mailer',
                
            ],
            [
                'key' => 'mail_host',
                
            ],
            [
                'key' => 'mail_port',
                
            ],
            [
                'key' => 'mail_username',
                
            ],
            [
                'key' => 'mail_password',
                
            ],
            [
                'key' => 'quick_contact',
            ],
            [
                'key' => 'site_banner_title',
            ],
            [
                'key' => 'site_banner_sub_title',
            ],
            [
                'key' => 'home_feature_video',
            ],
        ];

        foreach ($data as $item) {
            GeneralSetting::insert($item);
        }
    }
}
