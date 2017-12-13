<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmigranteController extends Controller
{

    public function index(){
        
        $doc = new \DOMDocument();
    
        $doc->load(base_path('docs/MuseuEmigracaoBD.xml'));
    
        $table = $doc->getElementsByTagName('table');
    
        $emigrantes = [];

        foreach($table as $emigr) {
    
            if($emigr->getAttribute('name') == 'IdentificacaoEmigrante'){
                
                $emigr = $emigr->getElementsByTagName('column');
    
                $emigrantes[] = [
                    'id' => $emigr->item(0)->nodeValue,
                    'nome' => $emigr->item(1)->nodeValue
                ];
    
            }

        }

        usort($emigrantes, function($a, $b){
            $cmp = strcmp($a['nome'], $b['nome']);

            if ($cmp == 0) {
                return 0;
            }
            else if ($cmp > 0) {
                // "a ($a) is higher priority than b ($b), moving b down array\n";
                return 1;
            }
            else {
                // "b ($b) is higher priority than a ($a), moving b up array\n";                
                return -1;
            }
        });

        return view('emigrantes.index', compact('emigrantes'));

    }

    public function show($id){
        
        $doc = new \DOMDocument();
    
        $doc->load(base_path('docs/MuseuEmigracaoBD.xml'));
    
        $table = $doc->getElementsByTagName('table');
    
        $emigrante = [];
    
        foreach($table as $emigr) {
    
            if($emigr->getAttribute('name') == 'IdentificacaoEmigrante'){
                
                $emigr = $emigr->getElementsByTagName('column');

                if($emigr->item(0)->nodeValue == $id){
                    
                    $emigrante[] = [
                        'id' => $emigr->item(0)->nodeValue,
                        'nome' => $emigr->item(1)->nodeValue,
                        'dtNasc' => $emigr->item(2)->nodeValue,
                        'nomeConj' => $emigr->item(4)->nodeValue,
                        'filiacao' => self::filiacao($table, $emigr->item(5)->nodeValue),
                        'naturalidade' => self::naturalidade($table, $emigr->item(6)->nodeValue),
                        'processos' => self::processos($table, $emigr->item(0)->nodeValue)
                    ];
                    break;

                }
    
            }
            
        }
        dd($emigrante);
        return view('emigrantes.show', compact('emigrante'));

    }

    private function filiacao($table, $id){
        
        foreach($table as $emigr) {

            if($emigr->getAttribute('name') == 'Filiacao'){

                $emigr = $emigr->getElementsByTagName('column');

                if($emigr->item(0)->nodeValue == $id){
                    
                    return [
                        'pai' => $emigr->item(3)->nodeValue,
                        'mae' => $emigr->item(4)->nodeValue
                    ];

                }

            }

        }

    }

    private function naturalidade($table, $id){
        
        foreach($table as $emigr) {

            if($emigr->getAttribute('name') == 'Localidade'){

                $emigr = $emigr->getElementsByTagName('column');

                if($emigr->item(0)->nodeValue == $id){
                    
                    return [
                        'freguesia' => $emigr->item(1)->nodeValue,
                        'concelho' => $emigr->item(2)->nodeValue,
                        'distrito' => $emigr->item(3)->nodeValue,
                        'lugar' => self::lugar($table, $emigr->item(0)->nodeValue)
                    ];

                }

            }

        }

    }

    private function lugar($table, $id){

        foreach($table as $emigr) {
            
            if($emigr->getAttribute('name') == 'Lugar'){

                $emigr = $emigr->getElementsByTagName('column');

                if($emigr->item(2)->nodeValue == $id){
                    
                    return [
                        'id' => $emigr->item(0)->nodeValue,
                        'nome' => $emigr->item(1)->nodeValue
                    ];

                }

            }

        }

    }

    private function processos($table, $id){
        
        $processos = [];

        foreach($table as $emigr) {

            if($emigr->getAttribute('name') == 'Processo'){

                $emigr = $emigr->getElementsByTagName('column');

                if($emigr->item(44)->nodeValue == $id){
                    
                    $processos[] = [
                        'id' => $emigr->item(0)->nodeValue
                    ];

                }

            }

        }

        return $processos;

    }

}
