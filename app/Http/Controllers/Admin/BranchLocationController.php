<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BranchLocation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BranchLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $branches = BranchLocation::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.branches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'address_lines' => ['required', 'string', 'max:2000'],
            'is_main' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $isMain = (bool) ($data['is_main'] ?? false);

        if ($isMain) {
            BranchLocation::query()->update(['is_main' => false]);
        }

        BranchLocation::query()->create([
            'label' => $data['label'],
            'address_lines' => $data['address_lines'],
            'is_main' => $isMain,
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.branches.index')->with('status', 'Branch added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): RedirectResponse
    {
        return redirect()->route('admin.branches.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BranchLocation $branch): View
    {
        return view('admin.branches.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BranchLocation $branch): RedirectResponse
    {
        $data = $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'address_lines' => ['required', 'string', 'max:2000'],
            'is_main' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $isMain = (bool) ($data['is_main'] ?? false);

        if ($isMain) {
            BranchLocation::query()->whereKeyNot($branch->getKey())->update(['is_main' => false]);
        }

        $branch->label = $data['label'];
        $branch->address_lines = $data['address_lines'];
        $branch->is_main = $isMain;
        $branch->sort_order = $data['sort_order'] ?? 0;
        $branch->save();

        return redirect()->route('admin.branches.index')->with('status', 'Branch updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchLocation $branch): RedirectResponse
    {
        $branch->delete();

        return redirect()->route('admin.branches.index')->with('status', 'Branch removed.');
    }
}
