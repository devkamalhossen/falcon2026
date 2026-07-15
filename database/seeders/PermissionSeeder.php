<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Role Manage
        $rolesManage = PermissionGroup::updateOrCreate([
            'name' => 'Roles Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $rolesManage->id,
            'name' => 'Access Roles',
            'slug' => 'role.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $rolesManage->id,
            'name' => 'Create Roles',
            'slug' => 'role.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $rolesManage->id,
            'name' => 'Edit Roles',
            'slug' => 'role.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $rolesManage->id,
            'name' => 'Destroy Roles',
            'slug' => 'role.destroy',
        ]);
        //Role Manage
        $adminUser = PermissionGroup::updateOrCreate([
            'name' => 'User Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $adminUser->id,
            'name' => 'Access User',
            'slug' => 'admin.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $adminUser->id,
            'name' => 'Create User',
            'slug' => 'admin.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $adminUser->id,
            'name' => 'Edit User',
            'slug' => 'admin.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $adminUser->id,
            'name' => 'Destroy User',
            'slug' => 'admin.destroy',
        ]);

        //Banner Manage
        $banner = PermissionGroup::updateOrCreate([
            'name' => 'Home Banner Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $banner->id,
            'name' => 'Access Home Banner',
            'slug' => 'banner.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $banner->id,
            'name' => 'Create Home Banner',
            'slug' => 'banner.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $banner->id,
            'name' => 'Edit Home Banner',
            'slug' => 'banner.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $banner->id,
            'name' => 'Destroy Home Banner',
            'slug' => 'banner.destroy',
        ]);

        //Social Manage
        $social = PermissionGroup::updateOrCreate([
            'name' => 'Social Media Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $social->id,
            'name' => 'Access Social Media',
            'slug' => 'social.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $social->id,
            'name' => 'Create Social Media',
            'slug' => 'social.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $social->id,
            'name' => 'Edit Social Media',
            'slug' => 'social.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $social->id,
            'name' => 'Destroy Social Media',
            'slug' => 'social.destroy',
        ]);

        //Client Manage
        $client = PermissionGroup::updateOrCreate([
            'name' => 'Client Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $client->id,
            'name' => 'Access Client',
            'slug' => 'client.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $client->id,
            'name' => 'Create Client',
            'slug' => 'client.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $client->id,
            'name' => 'Edit Client',
            'slug' => 'client.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $client->id,
            'name' => 'Destroy Client',
            'slug' => 'client.destroy',
        ]);

        
        //Team Type Manage
        $teamType = PermissionGroup::updateOrCreate([
            'name' => 'Team Type Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $teamType->id,
            'name' => 'Access Team Type',
            'slug' => 'team.type.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $teamType->id,
            'name' => 'Create Team Type',
            'slug' => 'team.type.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $teamType->id,
            'name' => 'Edit Team Type',
            'slug' => 'team.type.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $teamType->id,
            'name' => 'Destroy Team Type',
            'slug' => 'team.type.destroy',
        ]);


        //Team Manage
        $team = PermissionGroup::updateOrCreate([
            'name' => 'Team Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $team->id,
            'name' => 'Access Team',
            'slug' => 'team.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $team->id,
            'name' => 'Create Team',
            'slug' => 'team.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $team->id,
            'name' => 'Edit Team',
            'slug' => 'team.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $team->id,
            'name' => 'Destroy Team',
            'slug' => 'team.destroy',
        ]);

        //Company Files Manage
        $companyFile = PermissionGroup::updateOrCreate([
            'name' => 'Company File Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $companyFile->id,
            'name' => 'Access Company File',
            'slug' => 'company.file.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $companyFile->id,
            'name' => 'Create Company File',
            'slug' => 'company.file.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $companyFile->id,
            'name' => 'Edit Company File',
            'slug' => 'company.file.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $companyFile->id,
            'name' => 'Destroy Company File',
            'slug' => 'company.file.destroy',
        ]);

        //WhyChoose  Manage
        $whychoose = PermissionGroup::updateOrCreate([
            'name' => 'Why Choose content Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $whychoose->id,
            'name' => 'Access Why Choose content',
            'slug' => 'why.choose.us.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $whychoose->id,
            'name' => 'Create Why Choose content',
            'slug' => 'why.choose.us.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $whychoose->id,
            'name' => 'Edit Why Choose content',
            'slug' => 'why.choose.us.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $whychoose->id,
            'name' => 'Destroy Why Choose content',
            'slug' => 'why.choose.us.destroy',
        ]);

        //Client Page Manage
        $clientPage = PermissionGroup::updateOrCreate([
            'name' => 'Client Page Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $clientPage->id,
            'name' => 'Access Client Page',
            'slug' => 'page.client.access',
        ]);

        Permission::updateOrCreate([
            'permission_group_id' => $clientPage->id,
            'name' => 'Edit Client Page',
            'slug' => 'page.client.edit',
        ]);

        //Team Page Manage
        $teamPage = PermissionGroup::updateOrCreate([
            'name' => 'Team Page Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $teamPage->id,
            'name' => 'Access Team Page',
            'slug' => 'page.team.access',
        ]);

        Permission::updateOrCreate([
            'permission_group_id' => $teamPage->id,
            'name' => 'Edit Team Page',
            'slug' => 'page.team.edit',
        ]);

        //Our Story Page Manage
        $ourStoryPage = PermissionGroup::updateOrCreate([
            'name' => 'Our Story Page Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $ourStoryPage->id,
            'name' => 'Access Our Story Page',
            'slug' => 'page.our.story.access',
        ]);

        Permission::updateOrCreate([
            'permission_group_id' => $ourStoryPage->id,
            'name' => 'Edit Our Story Page',
            'slug' => 'page.our.story.edit',
        ]);

        //About Content  Manage
        $aboutContent = PermissionGroup::updateOrCreate([
            'name' => 'About Content Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $aboutContent->id,
            'name' => 'Access About Content',
            'slug' => 'about.content.access',
        ]);

        Permission::updateOrCreate([
            'permission_group_id' => $aboutContent->id,
            'name' => 'Edit About Content',
            'slug' => 'about.content.edit',
        ]);
        //achievment Content  Manage
        $achievementContent = PermissionGroup::updateOrCreate([
            'name' => 'Achievement Content Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $achievementContent->id,
            'name' => 'Access Achievement Content',
            'slug' => 'achievement.content.access',
        ]);

        Permission::updateOrCreate([
            'permission_group_id' => $achievementContent->id,
            'name' => 'Edit Achievement Content',
            'slug' => 'achievement.content.edit',
        ]);

        //Contact Page Files Manage
        $contactPage = PermissionGroup::updateOrCreate([
            'name' => 'Contact Page Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $contactPage->id,
            'name' => 'Access Contact Page',
            'slug' => 'page.contact.access',
        ]);

        Permission::updateOrCreate([
            'permission_group_id' => $contactPage->id,
            'name' => 'Edit Contact Page',
            'slug' => 'page.contact.edit',
        ]);

        //Service Area Page Files Manage
        $serviceAreaPage = PermissionGroup::updateOrCreate([
            'name' => 'Service Area Page Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $serviceAreaPage->id,
            'name' => 'Access Service Area Page',
            'slug' => 'page.service.area.access',
        ]);

        Permission::updateOrCreate([
            'permission_group_id' => $serviceAreaPage->id,
            'name' => 'Edit Service Area Page',
            'slug' => 'page.service.area.edit',
        ]);

        //WHyCHoose Page Files Manage
        $pageWhyChoose = PermissionGroup::updateOrCreate([
            'name' => 'Why Choose Page Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $pageWhyChoose->id,
            'name' => 'Access Why Choose Page',
            'slug' => 'page.why.choose.access',
        ]);

        Permission::updateOrCreate([
            'permission_group_id' => $pageWhyChoose->id,
            'name' => 'Edit why.choose Page',
            'slug' => 'page.why.choose.edit',
        ]);

        //Service Page Manage
        $servicePage = PermissionGroup::updateOrCreate([
            'name' => 'Service Page Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $servicePage->id,
            'name' => 'Access Service Page',
            'slug' => 'page.service.access',
        ]);

        Permission::updateOrCreate([
            'permission_group_id' => $servicePage->id,
            'name' => 'Edit Service Page',
            'slug' => 'page.service.edit',
        ]);

        //Blog Category Manage
        $blogCategory = PermissionGroup::updateOrCreate([
            'name' => 'Blog Category Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $blogCategory->id,
            'name' => 'Access Blog Category',
            'slug' => 'blog.category.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $blogCategory->id,
            'name' => 'Create Blog Category',
            'slug' => 'blog.category.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $blogCategory->id,
            'name' => 'Edit Blog Category',
            'slug' => 'blog.category.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $blogCategory->id,
            'name' => 'Destroy Blog Category',
            'slug' => 'blog.category.destroy',
        ]);

        //Blog Manage
        $blog = PermissionGroup::updateOrCreate([
            'name' => 'Blog Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $blog->id,
            'name' => 'Access Blog',
            'slug' => 'blog.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $blog->id,
            'name' => 'Create Blog',
            'slug' => 'blog.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $blog->id,
            'name' => 'Edit Blog',
            'slug' => 'blog.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $blog->id,
            'name' => 'Destroy Blog',
            'slug' => 'blog.destroy',
        ]);
        //Importer Manage
        $importer = PermissionGroup::updateOrCreate([
            'name' => 'Importer Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $importer->id,
            'name' => 'Access Importer',
            'slug' => 'importer.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $importer->id,
            'name' => 'Create Importer',
            'slug' => 'importer.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $importer->id,
            'name' => 'Edit Importer',
            'slug' => 'importer.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $importer->id,
            'name' => 'Destroy Importer',
            'slug' => 'importer.destroy',
        ]);
        //Location Manage
        $location = PermissionGroup::updateOrCreate([
            'name' => 'Location Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $location->id,
            'name' => 'Access Location',
            'slug' => 'location.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $location->id,
            'name' => 'Create Location',
            'slug' => 'location.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $location->id,
            'name' => 'Edit Location',
            'slug' => 'location.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $location->id,
            'name' => 'Destroy Location',
            'slug' => 'location.destroy',
        ]);
        //Setting Manage
        $setting = PermissionGroup::updateOrCreate([
            'name' => 'Setting Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $setting->id,
            'name' => 'Access Setting',
            'slug' => 'setting.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $setting->id,
            'name' => 'Edit Setting',
            'slug' => 'setting.edit',
        ]);

        //Service Area Manage
        $serviceArea = PermissionGroup::updateOrCreate([
            'name' => 'Service Area Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $serviceArea->id,
            'name' => 'Access Service Area',
            'slug' => 'service.area.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $serviceArea->id,
            'name' => 'Create Service Area',
            'slug' => 'service.area.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $serviceArea->id,
            'name' => 'Edit Service Area',
            'slug' => 'service.area.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $serviceArea->id,
            'name' => 'Destroy Service Area',
            'slug' => 'service.area.destroy',
        ]);

          //Achievement Manage
        $Achievement = PermissionGroup::updateOrCreate([
            'name' => 'Achievement Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $Achievement->id,
            'name' => 'Access Achievement',
            'slug' => 'achievement.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $Achievement->id,
            'name' => 'Create Achievement',
            'slug' => 'achievement.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $Achievement->id,
            'name' => 'Edit Achievement',
            'slug' => 'achievement.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $Achievement->id,
            'name' => 'Destroy Achievement',
            'slug' => 'achievement.destroy',
        ]);

        //Product Category Manage
        $productCategory = PermissionGroup::updateOrCreate([
            'name' => 'Product Category Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $productCategory->id,
            'name' => 'Access Product Category',
            'slug' => 'product.category.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $productCategory->id,
            'name' => 'Create Product Category',
            'slug' => 'product.category.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $productCategory->id,
            'name' => 'Edit Product Category',
            'slug' => 'product.category.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $productCategory->id,
            'name' => 'Destroy Product Category',
            'slug' => 'product.category.destroy',
        ]);
        //Product Manage
        $product = PermissionGroup::updateOrCreate([
            'name' => 'Product Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $product->id,
            'name' => 'Access Product ',
            'slug' => 'product.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $product->id,
            'name' => 'Create Product ',
            'slug' => 'product.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $product->id,
            'name' => 'Edit Product ',
            'slug' => 'product.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $product->id,
            'name' => 'Destroy Product ',
            'slug' => 'product.destroy',
        ]);
        //Service Category Manage
        $serviceCategory = PermissionGroup::updateOrCreate([
            'name' => 'Service Category Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $serviceCategory->id,
            'name' => 'Access Service Category ',
            'slug' => 'service.category.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $serviceCategory->id,
            'name' => 'Create Service Category ',
            'slug' => 'service.category.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $serviceCategory->id,
            'name' => 'Edit Service Category ',
            'slug' => 'service.category.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $serviceCategory->id,
            'name' => 'Destroy Service Category ',
            'slug' => 'service.category.destroy',
        ]);
        
        // Service  Manage
        $service = PermissionGroup::updateOrCreate([
            'name' => 'Service Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $service->id,
            'name' => 'Access Service',
            'slug' => 'service.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $service->id,
            'name' => 'Create Service',
            'slug' => 'service.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $service->id,
            'name' => 'Edit Service',
            'slug' => 'service.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $service->id,
            'name' => 'Destroy Service',
            'slug' => 'service.destroy',
        ]);

        //Gallery  Manage
        $gallery = PermissionGroup::updateOrCreate([
            'name' => 'Gallery Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $gallery->id,
            'name' => 'Access Gallery',
            'slug' => 'gallery.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $gallery->id,
            'name' => 'Create Gallery',
            'slug' => 'gallery.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $gallery->id,
            'name' => 'Edit Gallery',
            'slug' => 'gallery.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $gallery->id,
            'name' => 'Destroy Gallery',
            'slug' => 'gallery.destroy',
        ]);

        //Project  Manage
        $project = PermissionGroup::updateOrCreate([
            'name' => 'Project Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $project->id,
            'name' => 'Access Project',
            'slug' => 'project.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $project->id,
            'name' => 'Create Project',
            'slug' => 'project.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $project->id,
            'name' => 'Edit Project',
            'slug' => 'project.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $project->id,
            'name' => 'Destroy Project',
            'slug' => 'project.destroy',
        ]);

        //Page  Manage
        $page = PermissionGroup::updateOrCreate([
            'name' => 'Page Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $page->id,
            'name' => 'Access Page',
            'slug' => 'page.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $page->id,
            'name' => 'Create Page',
            'slug' => 'page.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $page->id,
            'name' => 'Edit Page',
            'slug' => 'page.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $page->id,
            'name' => 'Destroy Page',
            'slug' => 'page.destroy',
        ]);
        //Page  Manage
        $googleReview = PermissionGroup::updateOrCreate([
            'name' => 'Google Review Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $googleReview->id,
            'name' => 'Access Google Review',
            'slug' => 'google.review.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $googleReview->id,
            'name' => 'Create Google Review',
            'slug' => 'google.review.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $googleReview->id,
            'name' => 'Edit Google Review',
            'slug' => 'google.review.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $googleReview->id,
            'name' => 'Destroy Google Review',
            'slug' => 'google.review.destroy',
        ]);

        //Home Intro Manage
        $homeIntro = PermissionGroup::updateOrCreate([
            'name' => 'Home Intro Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $homeIntro->id,
            'name' => 'Access Home Intro',
            'slug' => 'home.intro.access',
        ]);

        Permission::updateOrCreate([
            'permission_group_id' => $homeIntro->id,
            'name' => 'Edit Home Intro',
            'slug' => 'home.intro.edit',
        ]);
        //Home Intro Manage
        $pageOurBusiness = PermissionGroup::updateOrCreate([
            'name' => 'Our Business page Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $pageOurBusiness->id,
            'name' => 'Access Our Business page',
            'slug' => 'page.our.business.access',
        ]);

        Permission::updateOrCreate([
            'permission_group_id' => $pageOurBusiness->id,
            'name' => 'Edit Our Business page',
            'slug' => 'page.our.business.edit',
        ]);
        //Home Intro Manage
        $homeCategoryIntro = PermissionGroup::updateOrCreate([
            'name' => 'Home Category Intro Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $homeCategoryIntro->id,
            'name' => 'Access Home Category Intro',
            'slug' => 'home.category.intro.access',
        ]);

        Permission::updateOrCreate([
            'permission_group_id' => $homeCategoryIntro->id,
            'name' => 'Edit Home Category Intro',
            'slug' => 'home.category.intro.edit',
        ]);

        $certificateBadge = PermissionGroup::updateOrCreate([
            'name' => 'Certificate Badge Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $certificateBadge->id,
            'name' => 'Access Certificate Badge',
            'slug' => 'certificate.badge.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $certificateBadge->id,
            'name' => 'Create Certificate Badge',
            'slug' => 'certificate.badge.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $certificateBadge->id,
            'name' => 'Edit Certificate Badge',
            'slug' => 'certificate.badge.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $certificateBadge->id,
            'name' => 'Destroy Certificate Badge',
            'slug' => 'certificate.badge.destroy',
        ]);

        $bCategory = PermissionGroup::updateOrCreate([
            'name' => 'Business Category Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $bCategory->id,
            'name' => 'Access Business Category',
            'slug' => 'business.category.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $bCategory->id,
            'name' => 'Create Business Category',
            'slug' => 'business.category.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $bCategory->id,
            'name' => 'Edit Business Category',
            'slug' => 'business.category.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $bCategory->id,
            'name' => 'Destroy Business Category',
            'slug' => 'business.category.destroy',
        ]);
        $business = PermissionGroup::updateOrCreate([
            'name' => 'Business Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $business->id,
            'name' => 'Access Business',
            'slug' => 'business.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $business->id,
            'name' => 'Create Business',
            'slug' => 'business.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $business->id,
            'name' => 'Edit Business',
            'slug' => 'business.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $business->id,
            'name' => 'Destroy Business',
            'slug' => 'business.destroy',
        ]);
        $vision = PermissionGroup::updateOrCreate([
            'name' => 'Vision Mission Manage',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $vision->id,
            'name' => 'Access vision',
            'slug' => 'vision.access',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $vision->id,
            'name' => 'Create vision',
            'slug' => 'vision.create',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $vision->id,
            'name' => 'Edit vision',
            'slug' => 'vision.edit',
        ]);
        Permission::updateOrCreate([
            'permission_group_id' => $vision->id,
            'name' => 'Destroy vision',
            'slug' => 'vision.destroy',
        ]);
    }
}
