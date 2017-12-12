<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index(){

        $doc = new \DOMDocument();

        $doc->load(base_path('docs/MuseuEmigracaoBD.xml'));

        $acomps = $doc->getElementsByTagName('table');

        $nomes = [];

        foreach($acomps as $acomp) {

            if($acomp->getAttribute('name') == 'IdentificacaoEmigrante'){
                
                $column = $acomp->getElementsByTagName('column')->item(1);
    
                if($column->getAttribute('name') == 'nome'){
                    $nomes[] = $column->nodeValue;
                }

            }
        }
        return view('welcome', compact('nomes'));
    }
}
