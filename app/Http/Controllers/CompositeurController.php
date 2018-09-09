<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CompositeurRepository;
use App\Repositories\StyleRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CompositeurController extends Controller
{

    protected $compositeurRepository;

    protected $nbrPerPage = 4;


    public function __construct(CompositeurRepository $compositeurRepository)
    {
        $this->compositeurRepository = $compositeurRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $compositeurs = $this->compositeurRepository->getWithCompositeurAndStylesPaginate($this->nbrPerPage);
        $links = $compositeurs->render();

        return view('Compositeur/index', compact('compositeurs', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$styles = Style::pluck('nom', 'id');
        $styles = DB::table('styles')->select('nom', 'id')->get();
        return view('Compositeur/create', compact('styles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,StyleRepository $styleRepository)
    {
        //
        //dd(Input::get('styles'));
        $inputs = array_merge($request->all());

        $compositeur = $this->compositeurRepository->store($inputs);

        $styleRepository->store($compositeur, Input::get('styles'));


        return redirect(route('compositeur.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $compositeur = $this->compositeurRepository->getById($id);

        return view('Compositeur/show',  compact('compositeur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $compositeur = $this->compositeurRepository->getById($id);
        //$styles = DB::table('styles')->select('nom', 'id')->get();
        $styles = DB::table('styles')->pluck('nom', 'id');

        return view('Compositeur/edit',  compact('compositeur','styles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //dd(Input::get('styles'));
        $this->compositeurRepository->update($id, $request->all(),Input::get('styles'));
        
        return redirect('compositeur')->withOk("Le compositeur " . $request->input('nom') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->compositeurRepository->destroy($id);

        return back();
    }
}
