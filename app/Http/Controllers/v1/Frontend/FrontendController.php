<?php

namespace App\Http\Controllers\v1\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ContactQueryRequest;
use App\Models\BlogCategory;
use App\Services\Backend\CMS\GalleryCategoryService;
use App\Services\Frontend\FrontendService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    protected FrontendService $service;
    protected GalleryCategoryService $galleryCategoryService;

    public function __construct(FrontendService $service, GalleryCategoryService $galleryCategoryService)
    {
        $this->service = $service;
        $this->galleryCategoryService = $galleryCategoryService;
    }

    public function home()
    {
        try {
            $achievementData = $this->service->getHomeAchievementData();
            $latestServices = $this->service->getHomePageServices();
            $featuredProjects = $this->service->getFeaturedProjects();
            $importers = $this->service->getImporters();
            $bannerSlider = $this->service->getBannerSliders();
            $homeIntro = $this->service->getHomeIntroContent();
            $googleReviews = $this->service->getGoogleReviews();
            $homeCategoryIntro = $this->service->getHomeCategoryIntro();
            $homeCategoryContent = $this->service->getHomeCategoryContent();
            $certficateBadges = $this->service->getCertficateBadges();
            $businesses = $this->service->getHomeBusinesses();
            return view('frontend.home', compact('businesses', 'certficateBadges', 'homeCategoryIntro', 'homeCategoryContent', 'homeIntro', 'bannerSlider', 'achievementData', 'latestServices', 'featuredProjects', 'importers', 'googleReviews'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function services(Request $request)
    {
        try {
            $data = $this->service->getServiceData($request->search);

            // If AJAX request, return just HTML + next_page_url
            if ($request->ajax()) {
                return response()->json([
                    'html' => view('frontend.includes.service-card', ['services' => $data['services']])->render(),
                    'next_page_url' => $data['services']->nextPageUrl(),
                ]);
            }
            return view('frontend.services', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
    // public function categoryServices(Request $request, string $category_slug)
    // {
    //     try {
    //         $data = $this->service->getCategoryServiceData($category_slug);

    //         // If AJAX request, return just HTML + next_page_url
    //         if ($request->ajax()) {
    //             return response()->json([
    //                 'html' => view('frontend.includes.service-card', ['services' => $data['services']])->render(),
    //                 'next_page_url' => $data['services']->nextPageUrl(),
    //             ]);
    //         }
    //         return view('frontend.services', compact('data'));
    //     } catch (Exception $e) {
    //         return abort($e->getCode());
    //     }
    // }

    public function serviceDetail(string $slug)
    {
        try {
            $data = $this->service->getSingleService($slug);
            if (!$data['service']) {
                return throw new Exception('Not Found', 404);
            }

            // কেস স্টাডিগুলো ফেচ করুন
        $caseStudies = \App\Models\CaseStudy::all();

        // ডাটা অ্যারেতে কেস স্টাডিগুলো যোগ করে দিন
        $data['caseStudies'] = $caseStudies;

        // dd($data);

            return view('frontend.service-detail', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }



    public function projects(Request $request)
    {

        try {
            $data = $this->service->getProjectData($request->all());

            // If AJAX request, return just HTML + next_page_url
            if ($request->ajax()) {
                return response()->json([
                    'html' => view('frontend.includes.project-card', ['projects' => $data['projects']])->render(),
                    'next_page_url' => $data['projects']->nextPageUrl(),
                ]);
            }
            return view('frontend.projects', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function projectDetail(string $slug)
    {
        try {
            $data = $this->service->getSingleProject($slug);
            if (!$data['project']) {
                return throw new Exception('Not Found', 404);
            }
            return view('frontend.project-details', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function clients(Request $request)
    {
        try {
            $data = $this->service->getClientData();

            // If AJAX request, return just HTML + next_page_url
            if ($request->ajax()) {
                return response()->json([
                    'html' => view('frontend.includes.client-images', ['clients' => $data['clients']])->render(),
                    'next_page_url' => $data['clients']->nextPageUrl(),
                ]);
            }
            return view('frontend.our-clients', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
    public function whyChoose()
    {
        try {
            $data = $this->service->getWhyChooseData();
            return view('frontend.why-us', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function contactUs()
    {
        try {
            $data = $this->service->getContactData();
            return view('frontend.contact', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
    public function team()
    {
        try {
            $data = $this->service->getTeamData();
            return view('frontend.team', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
    public function ourBusiness()
    {
        try {
            $data = $this->service->getOurBusinessData();
            return view('frontend.our-business', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function contactSubmit(ContactQueryRequest $request): JsonResponse
    {
        try {
            $message = $this->service->storeContactQuery($request->validated());
            return response()->json([
                'message' => $message
            ]);
        } catch (Exception $e) {
            return abort($e->getCode(), $e->getMessage());
        }
    }

    public function serviceArea()
    {
        try {
            $data = $this->service->getServiceAreaData();
            return view('frontend.service-area', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function singleServiceArea(string $area_slug)
    {
        try {
            $data = $this->service->getSingleServiceArea($area_slug);
            if (!$data) {
                return throw new Exception('Not Found', 404);
            }
            return view('frontend.single-service-area', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function blogs()
    {
        try {
            $data = $this->service->getBlogData();
            return view('frontend.blogs', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
    public function categoryBlog(Request $request, string $slug)
    {
        try {
            $category =  BlogCategory::where('slug', $slug)->select('id', 'name')->firstOrFail();
            $blogs = $this->service->getCategoryBlogData($slug, $category->id);
            if ($request->ajax()) {
                return response()->json([
                    'html' => view('frontend.includes.category-blog-card', ['blogs' => $blogs])->render(),
                    'next_page_url' => $blogs->nextPageUrl(),
                ]);
            }
            return view('frontend.category-blog', compact('blogs', 'category'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
    public function gallery(Request $request)
    {
        try {

            // $galleries = $this->service->getGalleryData($request->all());
            $galleryCategories = $this->galleryCategoryService->getActiveGalleryCategories();
            // dd($galleryCategories);
            // If AJAX request, return just HTML + next_page_url
            if ($request->ajax()) {
                return response()->json([
                    'html' => view('frontend.includes.gallery-card', ['galleryCategories' => $galleryCategories])->render(),
                    'next_page_url' => $galleryCategories->nextPageUrl(),
                ]);
            }
            return view('frontend.gallery', compact('galleryCategories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
    public function singleBlog(string $slug)
    {
        try {
            $blog = $this->service->getSingleBlogData($slug);

            return view('frontend.single-blog', compact('blog'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function ourStory()
    {
        try {
            $data = $this->service->getOurStoryPageData();
            return view('frontend.our-story', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function productList()
    {
        try {
            $data = $this->service->getProductList();
            return view('frontend.product-list', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function getPage(string $slug)
    {
        try {
            $data = $this->service->getCustomPageData($slug);
            if (!$data) {
                return throw new Exception('Not Found', 404);
            }
            return view('frontend.custom-page', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function getCartificatePage()
    {
        try {
            $data = $this->service->getCertificationsData();
            return view('frontend.certifications', compact('data'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
