<?php

namespace App\Http\Controllers\MiniCRM;
use App\Company;
use App\Employee;
use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyLogoUploadRequest;
use App\Http\Requests\CompanyUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Mail;
use DataTables;
use Storage;
use App\Mail\CompanyVerifyByEmail;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if ($request->ajax()) {
        $data = company::latest()->get();
        return Datatables::of($data)
          ->addIndexColumn()
          ->addColumn('action', function($row){

                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm viewCompany">View</a>';

                // $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCompany">Delete</a>';

                return $btn;
          })
          ->rawColumns(['action'])
          ->make(true);
      }

      $companies = Company::where(function ($query) {
        $query->where('name', 'like', '%'.request('q').'%');
      })->paginate();

      return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorize('create', new Company);
      return view('companies.create');
    }

    /**
     * Store a newly created company in storage.
     *
     * @param \App\Http\Requests\CompanyCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyCreateRequest $request)
    {
      $newCompany = $request->validated();
      $newCompany['creator_id'] = auth()->id();
      $company = Company::create($newCompany);

      $name = $company->name;
      Mail::to($company->email)->send(new CompanyVerifyByEmail($name));

      return redirect()->route('companies.show', $company);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        // DB::enableQueryLog();
        $employees = $company->employees()->where(function ($query) {
            $searchQuery = request('q');
            $query->where('first_name', 'like', '%'.$searchQuery.'%');
            $query->orWhere('last_name', 'like', '%'.$searchQuery.'%');
        })->paginate();

        return view('companies.show', compact('company', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
      $this->authorize('update', $company);
      return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified company in storage.
     *
     * @param \App\Http\Requests\CompanyUpdateRequest $request
     * @param \App\Company                            $company
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {
      $company->update($request->validated());
      return redirect()->route('companies.show', $company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
      $this->authorize('delete', $company);

      $this->validate(request(), [
          'company_id' => 'required',
      ]);

      $routeParam = request()->only('page', 'q');

      if (request('company_id') == $company->id && $company->delete()) {
          return redirect()->route('companies.index', $routeParam);
      }

      return back();
    }

    /**
     * Company logo upload action.
     *
     * @param \App\Http\Requests\CompanyLogoUploadRequest $request
     * @param \App\Company                                $company
     *
     * @return \Illuminate\Http\Response
     */
    public function logoUpload(CompanyLogoUploadRequest $request, Company $company)
    {
      $disk = env('APP_ENV') == 'testing' ? 'avatars' : 'public';

      if (Storage::disk($disk)->exists($company->logo)) {
          Storage::disk($disk)->delete($company->logo);
      }

      $company->logo = $request->logo->store('', $disk);
      $company->save();

      return back();
    }
}
