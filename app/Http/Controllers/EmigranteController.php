<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmigranteController extends Controller
{

    public function index(){
        
        $lugarTags = new \DOMDocument();
    
        $doc->load(base_path('docs/museu.xml'));
    
        $emigrantesTags = $doc->getElementsByTagName('IdentificacaoEmigrante');
    
        $emigrantes = [];

        foreach($emigrantesTags as $emigr) {
            
            $emigrantes[] = [
                'id' => $emigr->getElementsByTagName('idEmigrante')->item(0)->nodeValue,
                'nome' => $emigr->getElementsByTagName('nome')->item(0)->nodeValue
            ];

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
    
        $doc->load(base_path('docs/museu.xml'));
    
        $emigrantesTags = $doc->getElementsByTagName('IdentificacaoEmigrante');
    
        $emigrante = [];
    
        foreach($emigrantesTags as $emigr) {
                
            if($emigr->getElementsByTagName('idEmigrante')->item(0)->nodeValue == $id){
                
                $emigrante[] = [
                    'id' => $id,
                    'nome' => $emigr->getElementsByTagName('nome')->item(0)->nodeValue,
                    'dtNasc' => $emigr->getElementsByTagName('dtNasc')->item(0)->nodeValue,
                    'nomeConj' => $emigr->getElementsByTagName('nomeConj')->item(0)->nodeValue,
                    'filiacao' => self::filiacao($doc, $emigr->getElementsByTagName('idFiliacao')->item(0)->nodeValue),
                    'naturalidade' => self::naturalidade($doc, $emigr->getElementsByTagName('idNaturalidade')->item(0)->nodeValue),
                    'processos' => self::processos($doc, $id)
                ];
                break;

            }
    
            
        }
        dd($emigrante);
        return view('emigrantes.show', compact('emigrante'));

    }

    private function filiacao($doc, $id){

        $filiacaoTags = $doc->getElementsByTagName('Filiacao');
        
        foreach($filiacaoTags as $filiacao) {

            if($filiacao->getElementsByTagName('idFiliacao')->item(0)->nodeValue == $id){
                
                return [
                    'pai' => $filiacao->getElementsByTagName('nomePai')->item(0)->nodeValue,
                    'mae' => $filiacao->getElementsByTagName('nomeMae')->item(0)->nodeValue
                ];

            }

        }

    }

    private function naturalidade($doc, $id){

        $localidadeTags = $doc->getElementsByTagName('Localidade');
        
        foreach($localidadeTags as $localidade) {

            if($localidade->getElementsByTagName('idLocalidade')->item(0)->nodeValue == $id){
                
                return [
                    'freguesia' => $localidade->getElementsByTagName('freguesia')->item(0)->nodeValue,
                    'concelho' => $localidade->getElementsByTagName('concelho')->item(0)->nodeValue,
                    'distrito' => $localidade->getElementsByTagName('distrito')->item(0)->nodeValue,
                    'lugar' => self::lugar($doc, $id)
                ];

            }

        }

    }

    private function lugar($doc, $id){

        $lugarTags = $doc->getElementsByTagName('Lugar');

        foreach($lugarTags as $lugar) {

            if($lugar->getElementsByTagName('idLocalidade')->item(0)->nodeValue == $id){
                
                return [
                    'id' => $id,
                    'nome' => $lugar->getElementsByTagName('lugar')->item(0)->nodeValue
                ];

            }

        }

    }

    private function processos($doc, $id){

        $processoTags = $doc->getElementsByTagName('Processo');
        
        $processos = [];

        foreach($processoTags as $processo) {

            if($processo->getElementsByTagName('idEmigrante')->item(0)->nodeValue == $id){
                
                $processos[] = [
                    'id' => $processo->getElementsByTagName('numCM')->item(0)->nodeValue
                ];

            }

        }

        return $processos;

    }

}
