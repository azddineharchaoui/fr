<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobOffer;
use App\Models\Location;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobOffers = JobOffer::with(['company', 'category', 'location'])
            ->latest()
            ->paginate(10);

        $categories = Category::orderBy('name')->get();
        $locations = Location::orderBy('name')->get();
        $footerCategories = Category::orderBy('name')->take(5)->get();

        return view('jobs.index', compact('jobOffers', 'categories', 'locations', 'footerCategories'));
    }

    public function show(JobOffer $job)
    {
        $job->load(['company', 'category', 'location']);
        
        $similarJobs = JobOffer::with(['company', 'category', 'location'])
            ->where('id', '!=', $job->id)
            ->where(fn ($query) => $query->where('category_id', $job->category_id)
                ->orWhere('company_id', $job->company_id))
            ->take(3)
            ->get();
            
        $footerCategories = Category::orderBy('name')->take(5)->get();

        return view('jobs.show', compact('job', 'similarJobs', 'footerCategories'));
    }

    public function search(Request $request)
    {
        $query = JobOffer::with(['company', 'category', 'location']);

        if ($request->filled('query')) {
            $query->search($request->input('query'));
        }

        if ($request->filled('category')) {
            $query->byCategory($request->input('category'));
        }

        if ($request->filled('location')) {
            $query->byLocation($request->input('location'));
        }

        if ($request->filled('employment_type')) {
            $query->byEmploymentType($request->input('employment_type'));
        }

        $jobOffers = $query->latest()->paginate(10);
        $categories = Category::orderBy('name')->get();
        $locations = Location::orderBy('name')->get();
        $footerCategories = Category::orderBy('name')->take(5)->get();

        return view('jobs.index', compact('jobOffers', 'categories', 'locations', 'footerCategories'));
    }

    public function byCategory(Category $category)
    {
        $jobOffers = JobOffer::with(['company', 'category', 'location'])
            ->byCategory($category->id)
            ->latest()
            ->paginate(10);

        $categories = Category::orderBy('name')->get();
        $locations = Location::orderBy('name')->get();
        $footerCategories = Category::orderBy('name')->take(5)->get();

        return view('jobs.index', compact('jobOffers', 'categories', 'locations', 'category', 'footerCategories'));
    }
    public function apply(JobOffer $job)
    {
        $job->load(['company', 'category', 'location']);
        $footerCategories = Category::orderBy('name')->take(5)->get();
        
        return view('jobs.apply', compact('job', 'footerCategories'));
    }
    public function submitApplication(Request $request, JobOffer $job)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|string',
        ]);
        
        // Store the resume file
        $resumePath = $request->file('resume')->store('resumes', 'public');
        
        // Create the application
        $application = new \App\Models\Application([
            'job_offer_id' => $job->id,
            'candidate_profile_id' => auth()->user()->candidateProfile->id ?? null,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'resume_path' => $resumePath,
            'cover_letter' => $validated['cover_letter'],
            'status' => 'pending',
        ]);
        
        $application->save();
        
        return redirect()->route('jobs.show', $job->id)
            ->with('success', 'Your application has been submitted successfully!');
    }

    /**
 * Affiche le formulaire de création d'une offre d'emploi
 */
public function create()
    {
        // Vérifier si l'utilisateur est connecté et est un recruteur
        if (!auth()->check() || !auth()->user()->isRecruiter()) {
            return redirect()->route('login')
                ->with('error', 'Vous devez être connecté en tant que recruteur pour publier une offre d\'emploi.');
        }
        
        $categories = Category::orderBy('name')->get();
        $locations = Location::orderBy('name')->get();
        $footerCategories = Category::orderBy('name')->take(5)->get();
        
        return view('jobs.create', compact('categories', 'locations', 'footerCategories'));
    }

    /**
     * Enregistre une nouvelle offre d'emploi
     */
    public function store(Request $request)
    {
        // Vérifier si l'utilisateur est connecté et est un recruteur
        if (!auth()->check() || !auth()->user()->isRecruiter()) {
            return redirect()->route('login')
                ->with('error', 'Vous devez être connecté en tant que recruteur pour publier une offre d\'emploi.');
        }
        
        // Valider les données du formulaire
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'responsibilities' => 'required|string',
            'benefits' => 'nullable|string',
            'salary' => 'required|numeric|min:0',
            'employment_type' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'is_featured' => 'nullable|boolean',
            'is_remote' => 'nullable|boolean',
            'application_deadline' => 'required|date|after:today',
            'experience_level' => 'required|string',
        ]);
        
        // Récupérer le profil de l'entreprise de l'utilisateur
        $companyProfile = auth()->user()->companyProfile;
        
        // Créer l'offre d'emploi
        $jobOffer = new JobOffer([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'requirements' => $validated['requirements'],
            'responsibilities' => $validated['responsibilities'],
            'benefits' => $validated['benefits'] ?? null,
            'salary' => $validated['salary'],
            'employment_type' => $validated['employment_type'],
            'company_id' => $companyProfile->id,
            'category_id' => $validated['category_id'],
            'location_id' => $validated['location_id'],
            'is_featured' => $request->has('is_featured'),
            'is_remote' => $request->has('is_remote'),
            'application_deadline' => $validated['application_deadline'],
            'experience_level' => $validated['experience_level'],
        ]);
        
        $jobOffer->save();
        
        // Rediriger vers la page de détails du job
        return redirect()->route('jobs.show', $jobOffer->id)
            ->with('success', 'Votre offre d\'emploi a été publiée avec succès!');
    }
}