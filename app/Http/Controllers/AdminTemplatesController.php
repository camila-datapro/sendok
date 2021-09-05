<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioModel;
use App\PlantillaModel;
use App\TemplateModel;
use Illuminate\Support\Facades\Log;
use Auth;
use Illuminate\Support\Facades\Crypt;

class AdminTemplatesController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    /**
     * index
     * Método wrapper que permite obtener todo el listado de regiones existente en base de datos
     * @group RegionController
     * @return array array Listado de regiones
     */
    public function admin_grapes(){
        return view('templates/template_inicial')
        ->with("titulo","Mis Plantillas");
    }

     /**
     * getRegiones
     * Permite obtener el listado de regiones desde el modelo de Region
     * @group RegionController
     * @return array array Listado de regiones
     */
    public function admin_wysiwyg(){

        return view('templates/template_inicial_ck')
        ->with("titulo","Editor HTML");
    }
    /**
     * uploadTemplates
     * Permite guardar el html de los templates de cada usuario
     * @
     * @return ok si es valido el guardado del html, false en caso contrario 
     */
    public function uploadTemplate(Request $request){
        htmlentities($request["html"]);
        if(isset($request['templateId'])  && (!empty($request['templateId'])) ){
            $template =   TemplateModel::find($request['templateId']);
            $template->html_cont = htmlentities($request["html"]);

        }else{
            $template = new TemplateModel;
            $template->nombretemplate = $request["nombreli"];
            $template->id_user = Auth::user()->id;
            $template->tipo = 1;
            $template->html_cont = htmlentities($request["html"]);


        }
         
        $template->save();
		
        return json_encode(array("status" => "ok", "html" => html_entity_decode(htmlentities($request["html"]))));
    }
    /**
     *getTemplatesUser
     * Permite obtener los templates del usuario
     * @Parámetros id Usuario
    */
    public function getTemplatesUser()
    {
        $val = TemplateModel::getTemplatesUser(Auth::user()->id);
        return json_encode(array("datos"=> $val, "status" => "ok"));
    }

    public static function getTemplateId(Request $request){ 
        $array = TemplateModel::selectTemplate($request["idtemp"]);       
        return json_encode(array("temp" => $array[1], "tipo" => $array[0], "status" => "ok"));
    }

    public function deleteTemplateId(Request $request)
    {
        $val = false;
        $affectedRows = TemplateModel::where('id', '=', $request["idtemp"])->update(array('estado' => 0));
        if($affectedRows)
        {
            $val = "ok"; 
        }
        return json_encode(array("status" => $val));
    }
     
}