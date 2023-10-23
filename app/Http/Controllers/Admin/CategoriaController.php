<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoriaController extends Controller
{

    private $token = 'a0738e49a20c421881851bf8d1fa82cb';
    private $domainName = 'http://localhost/moodle';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $functionname = 'core_course_get_categories';
        $serverurl = $this->domainName . '/webservice/rest/server.php' . '?wstoken=' . $this->token . '&wsfunction=' . $functionname . '&moodlewsrestformat=json';
        //return ($serverurl);
        $categorias = Http::get($serverurl);
        //return $categorias;
        return view('admin.categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $functionname = 'core_course_get_categories';
        $serverurl = $this->domainName . '/webservice/rest/server.php' . '?wstoken=' . $this->token . '&wsfunction=' . $functionname . '&moodlewsrestformat=json';
        $categorias = Http::get($serverurl);
        return view('admin.categoria.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'scategoria' => 'required',
            'idnumber' => 'required',
            'description' => 'required'

        ]);
        $name = $request->input('name');
        $parent = $request->input('scategoria');
        $idnumber = $request->input('idnumber');
        $description = $request->input('description');
        $descriptionformat = 1;
        $functionname = 'core_course_create_categories';

        $serverurl = $this->domainName . '/webservice/rest/server.php'
            . '?wstoken=' . $this->token
            . '&wsfunction=' . $functionname
            . '&moodlewsrestformat=json
            &categories[0][name]='. $name
            . '&categories[0][parent]='. $parent
            . '&categories[0][idnumber]='. $idnumber
            . '&categories[0][description]='. $description
            . '&categories[0][descriptionformat]='. $descriptionformat;

        $createcategory = Http::get($serverurl);
        return redirect()->route('admin.categoria.index')->with('info', 'categoria criada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $functionname = 'core_course_get_categories';
        //Listar todas categorias
        $serverurl = $this->domainName . '/webservice/rest/server.php' . '?wstoken=' . $this->token . '&wsfunction=' . $functionname . '&moodlewsrestformat=json';
        //Listar categoria selecionada

        $serverurl2 = $this->domainName . '/webservice/rest/server.php'
            . '?wstoken=' .$this->token
            . '&wsfunction=' .$functionname
            . '&moodlewsrestformat=json&addsubcategories=0&criteria[0][key]=id&criteria[0][value]=' . $id;

        $categorias = Http::get($serverurl);
        $ecategoria = Http::get($serverurl2);
//        return $ecategoria;

        return view('admin.categoria.edit', compact('categorias', 'ecategoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'scategoria' => 'required',
            'idnumber' => 'required',
            'description' => 'required'

        ]);
        //$id = $request->input('id');
        $name = $request->input('name');
        $parent = $request->input('scategoria');
        $idnumber = $request->input('idnumber');
        $description = $request->input('description');
        $descriptionformat = 1;

        $functionname = 'core_course_update_categories';

        $serverurl = $this->domainName . '/webservice/rest/server.php'
            . '?wstoken=' . $this->token
            . '&wsfunction=' . $functionname
            . '&moodlewsrestformat=json&categories[0][id]=' . $id
            . '&categories[0][name]='. $name
            . '&categories[0][parent]='. $parent
            . '&categories[0][idnumber]='. $idnumber
            . '&categories[0][description]='. $description
            . '&categories[0][descriptionformat]='. $descriptionformat;


        $upcategorias = Http::get($serverurl);
        //return $serverurl;

        return redirect()->route('admin.categoria.index')->with('info', 'categoria editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'scategoria' => 'required',
            'idnumber' => 'required',
            'description' => 'required'

        ]);
        $name = $request->input('name');
        $parent = $request->input('scategoria');
        $idnumber = $request->input('idnumber');
        $description = $request->input('description');
        $descriptionformat = 1;
        $functionname = 'core_course_create_categories';

        $serverurl = $this->domainName . '/webservice/rest/server.php'
            . '?wstoken=' . $this->token
            . '&wsfunction=' . $functionname
            . '&moodlewsrestformat=json
            &categories[0][name]='. $name
            . '&categories[0][parent]='. $parent
            . '&categories[0][idnumber]='. $idnumber
            . '&categories[0][description]='. $description
            . '&categories[0][descriptionformat]='. $descriptionformat;

        $createcategory = Http::get($serverurl);
        return redirect()->route('admin.categoria.index')->with('info', 'categoria criada com sucesso');

    }

    public function delete($id)
    {


        $functionname = 'core_course_get_categories';
        $functionname2 = 'core_course_get_courses_by_field';

        //Listar todas categorias
        $serverurl = $this->domainName . '/webservice/rest/server.php' . '?wstoken=' . $this->token . '&wsfunction=' . $functionname . '&moodlewsrestformat=json';

        //Listar categoria selecionada sem mostrar subcategorias, mesmo se existirem
        $serverurl2 = $this->domainName . '/webservice/rest/server.php'
            . '?wstoken=' .$this->token
            . '&wsfunction=' .$functionname
            . '&moodlewsrestformat=json&addsubcategories=0&criteria[0][key]=id&criteria[0][value]=' . $id;

        //Listar categoria selecionada com subcategorias, se existirem
        $serverurl3 = $this->domainName . '/webservice/rest/server.php'
            . '?wstoken=' .$this->token
            . '&wsfunction=' .$functionname
            . '&moodlewsrestformat=json&addsubcategories=1&criteria[0][key]=id&criteria[0][value]=' . $id;

//        Quantos cursos tem na categoria

        $serverurl4 = $this->domainName . '/webservice/rest/server.php'
            . '?wstoken=' .$this->token
            . '&wsfunction=' . $functionname2
            . '&moodlewsrestformat=json&field=category&value=' . $id;

        $categorias = Http::get($serverurl);
        $ecategoria = Http::get($serverurl2);
        $subcategoria = Http::get($serverurl3);
        $ncursos = Http::get($serverurl4);
        $contador = 0;
        $contadorCurso = 0;
        foreach (json_decode($subcategoria) as $item) {
            $contador = $contador + 1;
        }
        foreach (json_decode($ncursos)->courses as $item) {
            $contadorCurso +=  + 1;
        }
        //return $contador;
        //return $ecategoria;
        //return $subcategoria;
        //return $contadorCurso;

        return view('admin.categoria.delete', compact('categorias', 'ecategoria',
                                                    'subcategoria', 'contador', 'contadorCurso'));
    }


    public function remove(Request $request, $id){

        $recursive = $request->input('recursive');
        $newparent = $request->input('newparent');
        $functionname = 'core_course_delete_categories';
        $serverurl = $this->domainName . '/webservice/rest/server.php'
            . '?wstoken=' . $this->token
            . '&wsfunction=' . $functionname
            . '&moodlewsrestformat=json&categories[0][id]=' . $id
            . '&categories[0][newparent]=' . $newparent
            . '&categories[0][recursive]=' . $recursive;
        //return $serverurl;
        Http::get($serverurl);

        return redirect()->route('admin.categoria.index')->with('info', 'categoria excluida com sucesso');


    }
}
