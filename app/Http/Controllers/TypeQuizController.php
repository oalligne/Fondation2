<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TypeQuizRepository;

class TypeQuizController extends Controller
{
    protected $TypeQuizRepository;

    protected $nbrPerPage = 4;

    public function __construct(TypeQuizRepository $TypeQuizRepository)
    {
        $this->TypeQuizRepository = $TypeQuizRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $TypeQuizs = $this->TypeQuizRepository->getPaginate($this->nbrPerPage);
        $links = $TypeQuizs->render();

        return view('TypeQuiz/index', compact('TypeQuizs', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('TypeQuiz/create');
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
        $TypeQuiz = $this->TypeQuizRepository->store($request->all());

        return redirect('typequiz')->withOk("Le TypeQuiz a été créé.");
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
        $TypeQuiz = $this->TypeQuizRepository->getById($id);

        return view('TypeQuiz/show',  compact('TypeQuiz'));
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
        $TypeQuiz = $this->TypeQuizRepository->getById($id);

        return view('TypeQuiz/edit',  compact('TypeQuiz'));
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
        $this->TypeQuizRepository->update($id, $request->all());
        
        return redirect('typequiz')->withOk("Le Type de Quiz " . $request->input('nom') . " a été modifié.");
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
        $this->TypeQuizRepository->destroy($id);

        return back();
    }
}
