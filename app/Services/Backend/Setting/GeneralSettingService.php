<?php

namespace App\Services\Backend\Setting;

use Exception;

class GeneralSettingService
{
    const SWW = "Something went wrong.";

    public function updateGeneralSetting(array $data): string
    {
        try {
            if (isset($data['site_logo'])) {
                $data['site_logo'] = uploadImage($data['site_logo'], null, null, 'logo', 'images/logo');
            } else {
                $data['site_logo'] = get_option('site_logo');
            }
            if (isset($data['favicon'])) {
                $data['favicon'] = uploadImage($data['favicon'], 48, 48, 'favicon', 'images/logo');
            } else {
                $data['favicon'] = get_option('favicon');
            }
            if (isset($data['home_feature_video'])) {
                $data['home_feature_video'] = uploadFile($data['home_feature_video'], 'home_video', 'documents/home/');
            } else {
                $data['home_feature_video'] = get_option('home_feature_video');
            }
            update_option('site_name', $data['site_name']);
            update_option('hotline', $data['hotline']);
            update_option('phone', $data['phone']);
            update_option('email', $data['email']);
            update_option('address', $data['address']);
            update_option('google_map_location', $data['google_map_location']);
            update_option('copyright_text', $data['copyright_text']);
            update_option('site_logo', $data['site_logo']);
            update_option('favicon', $data['favicon']);
            update_option('quick_contact', $data['quick_contact']);
            update_option('site_banner_title', $data['site_banner_title']);
            update_option('site_banner_sub_title', $data['site_banner_sub_title']);
            update_option('home_feature_video', $data['home_feature_video']);
            return "Updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updateGeneralMetaSEO(array $data): string
    {
        try {
            update_option('meta_title', $data['meta_title']);
            update_option('meta_description', $data['meta_description']);
            update_option('meta_keywords', $data['meta_keywords']);
            return "Updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updateGeneralFBPixel(array $data): string
    {
        try {
            update_option('fb_pixel_meta_tags', $data['fb_pixel_meta_tags']);
            update_option('fb_pixel_scripts', $data['fb_pixel_scripts']);
            return "Updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updateGeneralGoogleTag(array $data): string
    {
        try {
            update_option('google_meta_tags', $data['google_meta_tags']);
            update_option('google_scripts', $data['google_scripts']);
            return "Updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updateGeneralMail(array $data): string
    {
        try {
            update_option('mail_mailer', $data['mail_mailer']);
            update_option('mail_host', $data['mail_host']);
            update_option('mail_port', $data['mail_port']);
            update_option('mail_username', $data['mail_username']);
            update_option('mail_password', $data['mail_password']);
            return "Updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
}
