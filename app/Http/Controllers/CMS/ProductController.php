<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Banner::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('banner.show', $row->id) . '" class="edit btn btn-info btn-sm">View</a>';
                    $btn .= ' <a href="' . route('banner.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <form action="' . route('banner.destroy', $row->id) . '" method="POST" style="display:inline-block;">';
                    $btn .= csrf_field();
                    $btn .= method_field('DELETE');
                    $btn .= '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
                    $btn .= '</form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.cms.top-up.index');
    }

    public function create()
    {
        return view('dashboard.cms.top-up.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Banner::create($request->all());
        return redirect()->route('dashboard.cms.banner.index')->with('success', 'Banner created successfully.');
    }

    public function show(Banner $banner)
    {
        return view('dashboard.cms.banner.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('dashboard.cms.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $banner->update($request->all());
        return redirect()->route('dashboard.cms.banner.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('dashboard.cms.banner.index')->with('success', 'Banner deleted successfully.');
    }
}
