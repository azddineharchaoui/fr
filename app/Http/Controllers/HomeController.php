<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CompanyProfile;
use App\Models\JobOffer;
use App\Models\Location;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $jobOffers = JobOffer::with(['CompanyProfile', 'category', 'location'])
            ->latest()
            ->take(5)
            ->get();

      

        $locations = Location::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $footerCategories = Category::orderBy('name')->take(5)->get();

        // $testimonials = Testimonial::with('user')
        //     ->featured()
        //     ->take(3)
        //     ->get();

        $stats = [
            'clients' => 12000,
            'resumes' => 20000,
            'companies' => 18000,
        ];

        return view('job-search', compact(
            'jobOffers',
            'locations',
            'categories',
            'footerCategories',
            // 'testimonials',
            'stats'
        ));
    }
}