<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Отображает список всех компаний.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index', compact('companies'));
    }

    /**
     * Показывает форму для создания новой компании.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Сохраняет новую компанию, созданную пользователем.
     *
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompanyRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logotype')) {
            $logotype = $request->file('logotype');
            $logoPath = $logotype->store('companies', 'public');
            $data['logotype'] = $logoPath;
            $data['logotype_original_name'] = $logotype->getClientOriginalName();
        }

        Company::create($data);

        return redirect()->route('company.index');
    }

    /**
     * Показывает форму для редактирования указанной компании.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\View\View
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Обновляет указанную компанию в БД.
     *
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $data = $request->validated();

        if ($request->hasFile('logotype')) {
            $logotype = $request->file('logotype');
            $logoPath = $logotype->store('companies', 'public');
            $data['logotype'] = $logoPath;
            $data['logotype_original_name'] = $logotype->getClientOriginalName();
        }

        $company->update($data);

        return redirect()->route('company.index');
    }

    /**
     * Удаляет указанную компанию из БД.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company)
    {
        if ($company->logotype) {
            Storage::delete('public/' . $company->logotype);
        }
        $company->delete();
        return redirect()->route('company.index');
    }
}
