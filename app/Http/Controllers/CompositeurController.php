<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CompositeurRepository;

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
        $compositeurs = $this->compositeurRepository->getPaginate($this->nbrPerPage);
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
        return view('Compositeur/create');
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
        $compositeur = $this->compositeurRepository->store($request->all());

        return redirect('compositeur')->withOk("Le compositeur " . $compositeur->nom . " a été créé.");
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

        return view('Compositeur/edit',  compact('compositeur'));
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
        $this->compositeurRepository->update($id, $request->all());
        
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
