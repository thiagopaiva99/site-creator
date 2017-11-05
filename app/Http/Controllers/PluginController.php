<?php

namespace App\Http\Controllers;

use App\Plugin;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    public function index() {
        $plugins = Plugin::paginate(10);
        return view('plugins.index')
                ->with('plugins', $plugins);
    }

    public function create() {
        return view('plugins.create');
    }

    public function store(Request $request) {
        $input = $request->all();

        if ( Plugin::create($input) ) {
            flash('Plugin adicionado')->success();
        } else {
            flash('Ocorreu um erro ao adicionar o plugin')->error();
        }

        return redirect(url('site-plugins'));
    }
}
