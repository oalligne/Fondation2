<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CompositeurRepository;
use App\Repositories\MorceauRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MorceauController extends Controller
{

    protected $morceauRepository;

    protected $nbrPerPage = 10;


    public function __construct(MorceauRepository $morceauRepository)
    {
        $this->morceauRepository = $morceauRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $morceaux = $this->morceauRepository->getPaginate($this->nbrPerPage);
        $links = $morceaux->render();

        return view('Morceau/index', compact('morceaux', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $compositeurs = DB::table('compositeurs')->select('nom','prenom','id')->get();
        return view('Morceau/create', compact('compositeurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $inputs = array_merge($request->all());

        $morceau = $this->morceauRepository->store($inputs);

        return redirect(route('morceau.index'));
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
        $morceau = $this->morceauRepository->getById($id);        

        return view('Morceau/show',  compact('morceau'));
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
        $morceau = $this->morceauRepository->getById($id);
        
        $compositeurs = DB::table('compositeurs')->select('nom','prenom','id')->get();

        return view('Morceau/edit',  compact('morceau','compositeurs'));
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
        $this->morceauRepository->update($id, $request->all(),Input::get('compositeurs'));
        
        return redirect('morceau')->withOk("Le morceau " . $request->input('nom') . " a été modifié.");
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
        $this->morceauRepository->destroy($id);

        return back();
    }
}
