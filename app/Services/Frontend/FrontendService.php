<?php

namespace App\Services\Frontend;

use App\Models\AboutContent;
use App\Models\Achievement;
use App\Models\AchievementContent;
use App\Models\AchievementSlider;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\CertificateBadge;
use App\Models\Certifications;
use App\Models\Client;
use App\Models\CompanyFile;
use App\Models\CoreValue;
use App\Models\CustomerQuery;
use App\Models\FounderMessage;
use App\Models\Gallery;
use App\Models\GoogleReview;
use App\Models\Home\HomeBanner;
use App\Models\HomeCategoryIntro;
use App\Models\HomeIntro;
use App\Models\Importer;
use App\Models\Location;
use App\Models\Pages\CertificatePage;
use App\Models\Pages\Page;
use App\Models\Pages\PageClient;
use App\Models\Pages\PageContact;
use App\Models\Pages\PageOurBusiness;
use App\Models\Pages\PageOurStory;
use App\Models\Pages\PageService;
use App\Models\Pages\PageServiceArea;
use App\Models\Pages\PageTeam;
use App\Models\Pages\PageWhyChoose;
use App\Models\ProductCategory;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceArea;
use App\Models\ServiceCategory;
use App\Models\Team;
use App\Models\TeamType;
use App\Models\VisionMission;
use App\Models\WhyChooseUs;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class FrontendService
{
    const ERROR_MESSAGE = "Something went wrong.";

    public function getClientData(): array
    {
        try {
            $pageData = PageClient::select('title', 'image', 'section_title', 'section_description', 'meta_title', 'meta_description', 'meta_keywords')->first();
            $clients = Client::where('is_active', true)
                ->select('image', 'alt_name')
                ->orderBy('id', 'desc')
                ->paginate(config('app.front_paginate'));
            return [
                'pageData' => $pageData,
                'clients' => $clients
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }

    public function getCertificationsData(): array
    {
        try {
            $pageData = CertificatePage::select('title', 'image', 'section_title', 'section_description', 'meta_title', 'meta_description', 'meta_keywords')->first();
            $certifications = Certifications::where('is_active', true)
                ->select('image')
                ->orderBy('id', 'desc')
                ->paginate(config('app.front_paginate'));
            return [
                'pageData' => $pageData,
                'certifications' => $certifications
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }

    public function getHomeIntroContent(): ?HomeIntro
    {
        try {
            return HomeIntro::select('title', 'description', 'video_id')->first();
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
    public function getHomeCategoryIntro(): ?HomeCategoryIntro
    {
        try {
            return HomeCategoryIntro::select('title', 'description')->first();
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
    public function getHomeCategoryContent(): Collection
    {
        try {
            return ServiceCategory::select('name', 'image', 'description')->get();
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
    public function getCertficateBadges(): Collection
    {
        try {
            return CertificateBadge::where('is_active', true)->select('image')->get();
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }

    public function getFeaturedProjects(): Collection
    {
        try {
            return Project::where('is_active', true)
                ->where('is_featured', true)
                ->select('image', 'name', 'slug', 'video', 'status')
                ->orderBy('id', 'desc')
                ->limit(5)
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
    public function getBannerSliders(): Collection
    {
        try {
            return HomeBanner::where('is_active', true)
                ->select('image', 'alt_name')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
    public function getImporters(): Collection
    {
        try {
            return Importer::where('is_active', true)
                ->select('image', 'name', 'type')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }

    public function getHomeBusinesses(): Collection
    {
        try {
            return BusinessCategory::with(['businesses' => function ($q) {
                $q->select('id', 'category_id', 'name', 'link')
                    ->where('is_active', true);
            }])
                ->select('id', 'name', 'thumbnail')
                ->where('is_active', true)
                ->orderBy('created_at', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }

    public function getHomePageServices(): array
    {
        try {
            $services = Service::where('is_active', true)
                ->select('image', 'title', 'slug', 'video')
                ->orderBy('id', 'desc')
                ->limit(10)
                ->get();

            $servicePage = PageService::select('section_description')->first();
            return [
                'latestServices' => $services,
                'servicePage' => $servicePage
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
    public function getServiceData(string | null  $search): array
    {
        try {
            $pageData = PageService::select('section_title', 'section_description', 'meta_title', 'meta_description', 'meta_keywords')->first();
            $services = Service::with('category:id,name')
                ->where('is_active', true)
                ->select('image', 'title', 'slug', 'service_category_id')
                ->orderBy('created_at', 'asc')
                ->DataFilter($search)
                ->paginate(config('app.front_paginate'));
            return [
                'pageData' => $pageData,
                'services' => $services
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }

    public function getBlogData(): array
    {
       try {
            $blogs = Blog::with(['category:id,name'])
                ->select('image', 'title', 'slug', 'blog_excerpt', 'blog_category_id', 'created_at')
                ->orderBy('id', 'desc')
                ->where('is_active', true)
                ->take(8)
                ->get();
            $mostPopulars = Blog::with(['category:id,name'])
                ->select('image', 'title', 'slug', 'blog_excerpt', 'blog_category_id', 'created_at')
                ->orderBy('view_count', 'desc')
                ->where('is_active', true)
                ->take(5)
                ->get();
                
            $categories = BlogCategory::select('id', 'name', 'slug')
    ->where('is_active', true)
    ->orderBy('id', 'desc')
    ->get();

$categoryWiseBlogs = $categories->map(function ($category) {

    $category->blogs = Blog::with('category:id,name')
        ->select(
            'image',
            'title',
            'slug',
            'blog_excerpt',
            'blog_category_id',
            'created_at'
        )
        ->where('blog_category_id', $category->id)
        ->where('is_active', true)
        ->orderBy('id', 'desc')
        ->take(4)
        ->get();

    return $category;
});
            return [
                'blogs' => $blogs,
                'categoryWiseBlogs' => $categoryWiseBlogs,
                'mostPopulars' => $mostPopulars
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
    public function getCategoryBlogData(string $slug, $categoryId): LengthAwarePaginator
    {
        try {
            return Blog::with(['category:id,name'])
                ->select('image', 'title', 'slug', 'blog_excerpt', 'blog_category_id', 'created_at')
                ->orderBy('id', 'desc')
                ->where('blog_category_id', $categoryId)
                ->where('is_active', true)
                ->paginate(config('app.front_paginate'));
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }

    // public function getGalleryData(array $data): LengthAwarePaginator
    // {
    //     try {
    //         return Gallery::select('image', 'type', 'video_id', 'category_id')
    //             ->where('is_active', true)
    //             ->whereNull('service_id')
    //             ->when(!empty($data['category']), function ($query) use ($data) {
    //                 $query->where('category_id', $data['category']);
    //             })
    //             ->orderBy('id', 'desc')
    //             ->paginate(config('app.front_paginate'));
    //     } catch (Exception $e) {
    //         throw new Exception(self::ERROR_MESSAGE, 500);
    //     }
    // }

    public function getSingleService(string $slug): array
    {
        try {
            $service = Service::with([
                'features' => function ($q) {
                    $q->select('id', 'title', 'image', 'short_description', 'service_id');
                    $q->where('is_active', true);
                },
                'benefits' => function ($q) {
                    $q->select('id', 'image', 'title', 'short_description', 'service_id');
                    $q->where('is_active', true);
                },
                'usageAreas' => function ($q) {
                    $q->select('id', 'image', 'title', 'short_description', 'service_id');
                    $q->where('is_active', true);
                },
                'galleries' => function ($q) {
                    $q->select('id', 'image', 'service_id');
                    $q->where('is_active', true);
                },
                'descriptions' => function ($q) {
                    $q->select('title', 'image', 'description', 'service_id');
                    $q->where('is_active', true);
                },
                'faqs' => function ($q) {
                    $q->select('title', 'description', 'service_id');
                    $q->where('is_active', true);
                }
            ])
                ->select('id', 'image', 'title', 'description', 'meta_title', 'meta_description', 'meta_keywords', 'meta_scripts')
                ->where('slug', $slug)
                ->first();

            if (!$service) {
                return throw new Exception('Not Found', 404);
            }
            $moreServices = Service::where('slug', '!=', $slug)->select('id', 'image', 'title', 'slug')->get();
            return [
                'service' => $service,
                'moreServices' => $moreServices
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, $e->getCode() == 404 ? 404 : 500);
        }
    }

    public function getProjectData(array $data): array
    {
        try {
            $projects = Project::where('is_active', true)
                ->select('image', 'name', 'slug', 'status')
                ->orderBy('id', 'desc')
                ->DataFilter($data)
                ->paginate(config('app.front_paginate'));

            return [
                'projects' => $projects
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }

    public function getSingleProject(string $slug): array
    {
        try {
            $project = Project::with([

                'galleries' => function ($q) {
                    $q->select('id', 'image', 'project_id');
                    $q->where('is_active', true);
                }
            ])
                ->select('id', 'image', 'name', 'video_id', 'description', 'meta_title', 'meta_description', 'meta_keywords')
                ->where('slug', $slug)
                ->first();

            if (!$project) {
                return throw new Exception('Not Found', 404);
            }
            $moreProjects = Project::where('slug', '!=', $slug)->where('service_id', $project->service_id)
                ->select('id', 'image', 'name', 'slug')
                ->get();
            return [
                'project' => $project,
                'moreProjects' => $moreProjects
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, $e->getCode() == 404 ? 404 : 500);
        }
    }

    public function getSingleBlogData(string $slug): ?Blog
    {
        try {
            $blog = Blog::with(['category:id,name'])
    ->select(
        'id',
        'view_count',
        'image',
        'title',
        'blog_category_id',
        'created_at',
        'post_content',
        'meta_title',
        'meta_description',
        'meta_keywords'
    )
    ->where('slug', $slug)
    ->first();

if (!$blog) {
    throw new Exception('Not Found', 404);
}

Blog::where('id', $blog->id)->increment('view_count');

return $blog;
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, $e->getCode() == 404 ? 404 : 500);
        }
    }

    public function getWhyChooseData(): array
    {
        try {
            $pageData = PageWhyChoose::select('title', 'image', 'section_title', 'section_description', 'meta_title', 'meta_description', 'meta_keywords')->first();
            $why_choose = WhyChooseUs::where('is_active', true)
                ->select('image', 'title', 'short_description')
                ->get();
            return [
                'pageData' => $pageData,
                'why_choose' => $why_choose
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
    public function getOurBusinessData(): array
    {
        try {
            $pageData = PageOurBusiness::select('title', 'image', 'meta_title', 'meta_description', 'meta_keywords')->first();
            $categories = BusinessCategory::with(['businesses:id,name,link,category_id'])
                ->where('is_active', true)
                ->orderBy('created_at', 'desc')
                ->select('id', 'thumbnail', 'name')
                ->get();
            return [
                'pageData' => $pageData,
                'categories' => $categories
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }

    public function getContactData(): array
    {
        try {
            $pageData = PageContact::select('title', 'image', 'meta_title', 'meta_description', 'meta_keywords')->first();
            $branches = Location::where('is_active', true)
                ->select('name', 'location', 'emails', 'phone_numbers')
                ->get();
            return [
                'branches' => $branches,
                'pageData' => $pageData
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
    public function getTeamData(): array
    {
        try {
            $pageData = PageTeam::select('title', 'image', 'team_image', 'meta_title', 'meta_description', 'meta_keywords')->first();
            $teamTypes = TeamType::with(['teams' => function ($q) {
                $q->where('is_active', true);
                $q->orderBy('created_at', 'asc');
                $q->select('id', 'name', 'team_type_id', 'designation', 'educational_bg', 'image', 'bio');
            }])
                ->where('is_active', true)
                ->orderBy('order_by', 'asc')
                ->select('id', 'name')
                ->get();

            return [
                'teams' => $teamTypes,
                'pageData' => $pageData
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }

    public function storeContactQuery(array $data): string
    {
        try {
            CustomerQuery::create($data);
            return 'Message sended successfully.';
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }

    public function getServiceAreaData(): array
    {
        try {
            $pageData = PageServiceArea::select('title', 'image', 'section_title', 'section_description', 'meta_title', 'meta_description', 'meta_keywords')->first();
            $areas = ServiceArea::where('is_active', true)
                ->select('area_name', 'area_slug', 'image')
                ->get();
            return [
                'areas' => $areas,
                'pageData' => $pageData
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }

    public function getSingleServiceArea(string $area_slug): ?ServiceArea
    {
        try {
            return ServiceArea::where('area_slug', $area_slug)
                ->select('area_name', 'image', 'description', 'title', 'meta_title', 'meta_description', 'meta_keywords')
                ->first();
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }

    public function getOurStoryPageData(): array
    {
        try {
            $pageData = PageOurStory::select('title', 'image', 'meta_title', 'meta_description', 'meta_keywords')->first();
            $aboutData = AboutContent::select('title', 'description', 'image')->first();
            $coreValueContent = CoreValue::select('title', 'description', 'image')->first();
            $founderMessage = FounderMessage::select('title', 'name', 'designation', 'image', 'description', 'company')->first();
            $achievementData = AchievementContent::select('title', 'description')->first();
            $achievements = Achievement::where('is_active', true)->select('title', 'numbers')->get();
            $sliders = AchievementSlider::where('is_active', true)->select('id', 'image')->orderBy('created_at', 'desc')->get();
            $files = CompanyFile::where('is_active', true)
                ->whereIn('type', [1, 2])
                ->select('title', 'image', 'file', 'type')
                ->get()
                ->groupBy('type');

            $profiles = $files[1] ?? collect();
            $brochures = $files[2] ?? collect();

            $vision = VisionMission::where('is_active', true)->select('title', 'image', 'short_description')->orderBy('id', 'asc')->get();

            return [
                'pageData' => $pageData,
                'aboutData' => $aboutData,
                'achievementData' => $achievementData,
                'achievements' => $achievements,
                'achievementSlider' => $sliders,
                'files' => [
                    'profiles' => $profiles,
                    'brochures' => $brochures,
                ],
                'vision' => $vision,
                'coreValueContent' => $coreValueContent,
                'founderMessage' => $founderMessage
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
    public function getHomeAchievementData(): array
    {
        try {
            $achievementData = AchievementContent::select('title', 'description')->first();
            $achievements = Achievement::where('is_active', true)->select('title', 'numbers')->get();
            $sliders = AchievementSlider::where('is_active', true)->select('id', 'image')->orderBy('created_at', 'desc')->get();

            return [
                'achievementData' => $achievementData,
                'achievements' => $achievements,
                'sliders' => $sliders
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
    public function getGoogleReviews(): array
    {
        try {
            $reviews = GoogleReview::where('is_active', true)
                ->select('name', 'image', 'review', 'rating', 'review_date')
                ->get();

            $stats = GoogleReview::where('is_active', true)
                ->selectRaw('SUM(rating) as total_rating, AVG(rating) as avg_rating')
                ->first();

            return [
                'reviews'      => $reviews,
                'avg_rating'   => round($stats->avg_rating, 2),
                'total_rating' => $stats->total_rating,
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }

    public function getProductList(): Collection
    {
        try {
            return ProductCategory::with(['products' => function ($q) {
                $q->where('is_active', true);
                $q->select('id', 'product_category_id', 'name', 'datasheet');
            }])->where('is_active', true)
                ->select('id', 'name', 'image')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
    public function getCustomPageData(string $slug): ?Page
    {
        try {
            return Page::where('slug', $slug)->where('is_active', true)
                ->select('id', 'name', 'image', 'description', 'meta_title', 'meta_description')
                ->first();
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
}
