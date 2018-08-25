<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\StyleRepository;

class StyleController extends Controller
{

    protected $StyleRepository;

    protected $nbrPerPage = 4;


    public function __construct(StyleRepository $StyleRepository)
    {
        $this->StyleRepository = $StyleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Styles = $this->StyleRepository->getPaginate($this->nbrPerPage);
        $links = $Styles->render();

        return view('Style/index', compact('Styles', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Style/create');
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
        $Style = $this->StyleRepository->store($request->all());

        return redirect('style')->withOk("Le Style " . $Style->nom . " a été créé.");
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
        $Style = $this->StyleRepository->getById($id);

        return view('Style/show',  compact('Style'));
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
        $Style = $this->StyleRepository->getById($id);

        return view('Style/edit',  compact('Style'));
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
        $this->StyleRepository->update($id, $request->all());
        
        return redirect('style')->withOk("Le Style " . $request->input('nom') . " a été modifié.");
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
        $this->StyleRepository->destroy($id);

        return back();
    }
}
