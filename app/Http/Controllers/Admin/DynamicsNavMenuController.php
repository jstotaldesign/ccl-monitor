<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDynamicsNavMenuRequest;
use App\Http\Requests\StoreDynamicsNavMenuRequest;
use App\Http\Requests\UpdateDynamicsNavMenuRequest;
use App\Models\DynamicsNavMenu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DynamicsNavMenuController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dynamics_nav_menu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dynamicsNavMenus = DynamicsNavMenu::all();

        return view('admin.dynamicsNavMenus.index', compact('dynamicsNavMenus'));
    }

    public function create()
    {
        abort_if(Gate::denies('dynamics_nav_menu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dynamicsNavMenus.create');
    }

    public function store(StoreDynamicsNavMenuRequest $request)
    {
        $dynamicsNavMenu = DynamicsNavMenu::create($request->all());

        return redirect()->route('admin.dynamics-nav-menus.index');
    }

    public function edit(DynamicsNavMenu $dynamicsNavMenu)
    {
        abort_if(Gate::denies('dynamics_nav_menu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dynamicsNavMenus.edit', compact('dynamicsNavMenu'));
    }

    public function update(UpdateDynamicsNavMenuRequest $request, DynamicsNavMenu $dynamicsNavMenu)
    {
        $dynamicsNavMenu->update($request->all());

        return redirect()->route('admin.dynamics-nav-menus.index');
    }

    public function show(DynamicsNavMenu $dynamicsNavMenu)
    {
        abort_if(Gate::denies('dynamics_nav_menu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dynamicsNavMenus.show', compact('dynamicsNavMenu'));
    }

    public function destroy(DynamicsNavMenu $dynamicsNavMenu)
    {
        abort_if(Gate::denies('dynamics_nav_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dynamicsNavMenu->delete();

        return back();
    }

    public function massDestroy(MassDestroyDynamicsNavMenuRequest $request)
    {
        $dynamicsNavMenus = DynamicsNavMenu::find(request('ids'));

        foreach ($dynamicsNavMenus as $dynamicsNavMenu) {
            $dynamicsNavMenu->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
