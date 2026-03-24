<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeadershipMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class LeadershipMemberController extends Controller
{
    public function index(): View
    {
        $members = LeadershipMember::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.leadership.index', compact('members'));
    }

    public function create(): View
    {
        return view('admin.leadership.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'qualifications' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:5120'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('leadership', 'public');
        }

        LeadershipMember::query()->create([
            'name' => $data['name'],
            'designation' => $data['designation'],
            'qualifications' => $data['qualifications'] ?? null,
            'image_path' => $path,
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.leadership.index')->with('status', 'Member added.');
    }

    public function edit(LeadershipMember $leadership_member): View
    {
        return view('admin.leadership.edit', ['member' => $leadership_member]);
    }

    public function update(Request $request, LeadershipMember $leadership_member): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'qualifications' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:5120'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('image')) {
            if ($leadership_member->image_path) {
                Storage::disk('public')->delete($leadership_member->image_path);
            }
            $leadership_member->image_path = $request->file('image')->store('leadership', 'public');
        }

        $leadership_member->name = $data['name'];
        $leadership_member->designation = $data['designation'];
        $leadership_member->qualifications = $data['qualifications'] ?? null;
        $leadership_member->sort_order = $data['sort_order'] ?? 0;
        $leadership_member->save();

        return redirect()->route('admin.leadership.index')->with('status', 'Member updated.');
    }

    public function destroy(LeadershipMember $leadership_member): RedirectResponse
    {
        if ($leadership_member->image_path) {
            Storage::disk('public')->delete($leadership_member->image_path);
        }
        $leadership_member->delete();

        return redirect()->route('admin.leadership.index')->with('status', 'Member removed.');
    }
}
