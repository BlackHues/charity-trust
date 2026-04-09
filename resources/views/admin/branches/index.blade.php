@extends('layouts.admin')

@section('title', 'Branches')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-gray-900">Branches</h1>
        <a href="{{ route('admin.branches.create') }}" class="btn btn-primary">
            Add branch
        </a>
    </div>

    @if (session('status'))
        <div class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-800">
            {{ session('status') }}
        </div>
    @endif

    @if ($branches->isEmpty())
        <p class="text-sm text-gray-600">No branches yet. Click “Add branch” to create one.</p>
    @else
        <div class="overflow-x-auto rounded-lg border border-gray-200 bg-white">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Label</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Address</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Main?</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Sort order</th>
                    <th class="px-4 py-2 text-right font-semibold text-gray-700">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach ($branches as $branch)
                    <tr>
                        <td class="px-4 py-2 align-top">
                            <div class="font-medium text-gray-900">{{ $branch->label }}</div>
                        </td>
                        <td class="px-4 py-2 align-top">
                            <pre class="whitespace-pre-wrap text-xs text-gray-700">{{ $branch->address_lines }}</pre>
                        </td>
                        <td class="px-4 py-2 align-top">
                            @if ($branch->is_main)
                                <span class="inline-flex items-center rounded-full bg-green-100 px-2 py-0.5 text-xs font-medium text-green-800">
                                    Main
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-2 align-top text-gray-700">
                            {{ $branch->sort_order }}
                        </td>
                        <td class="px-4 py-2 align-top text-right">
                            <a href="{{ route('admin.branches.edit', $branch) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-900">
                                Edit
                            </a>
                            <form action="{{ route('admin.branches.destroy', $branch) }}" method="POST" class="mt-1 inline-block"
                                  onsubmit="return confirm('Delete this branch?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

