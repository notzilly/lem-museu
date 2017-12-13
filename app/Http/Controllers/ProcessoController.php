<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessoController extends Controller
{
    public function show($id){

        $doc = new \DOMDocument();
        
        $doc->load(base_path('docs/museu.xml'));
    
        $processoTags = $doc->getElementsByTagName('Processo');

        $proc = [];
    
        foreach($processoTags as $processo) {
                
            if($processo->getElementsByTagName('numCM')->item(0)->nodeValue == $id){
                
                $proc[] = [
                    'numCM' => $id,
                    'numCMu' => $processo->getElementsByTagName('numCMu')->item(0)->nodeValue,
                    'numJE' => $processo->getElementsByTagName('numJE')->item(0)->nodeValue,
                    'ano' => $processo->getElementsByTagName('ano')->item(0)->nodeValue,
                    'idade' => $processo->getElementsByTagName('idade')->item(0)->nodeValue,
                    'estCivil' => $processo->getElementsByTagName('estCivil')->item(0)->nodeValue,
                    'paisDestino' => $processo->getElementsByTagName('paisDestino')->item(0)->nodeValue,
                    'localidadeDestino' => $processo->getElementsByTagName('localidadeDestino')->item(0)->nodeValue,
                    'dtExp' => $processo->getElementsByTagName('dtExp')->item(0)->nodeValue,
                    'oficioExp' => $processo->getElementsByTagName('oficioExp')->item(0)->nodeValue,
                    'passapExp' => $processo->getElementsByTagName('passapExp')->item(0)->nodeValue,
                    'tipoTranspEmb' => $processo->getElementsByTagName('tipoTranspEmb')->item(0)->nodeValue,
                    'desigTranspEmb' => $processo->getElementsByTagName('desigTranspEmb')->item(0)->nodeValue,
                    'ciaEmb' => $processo->getElementsByTagName('ciaEmb')->item(0)->nodeValue,
                    'dtEmb' => $processo->getElementsByTagName('dtEmb')->item(0)->nodeValue,
                    'passPagaEmb' => $processo->getElementsByTagName('passPagaEmb')->item(0)->nodeValue,
                    'localEmb' => $processo->getElementsByTagName('localEmb')->item(0)->nodeValue,
                    'portoDesemb' => $processo->getElementsByTagName('portoDesemb')->item(0)->nodeValue,
                    'irComEmb' => $processo->getElementsByTagName('irComEmb')->item(0)->nodeValue,
                    'profissaoHab' => $processo->getElementsByTagName('profissaoHab')->item(0)->nodeValue,
                    'habLiterariasHab' => $processo->getElementsByTagName('habLiterariasHab')->item(0)->nodeValue,
                    'localTrabHab' => $processo->getElementsByTagName('localTrabHab')->item(0)->nodeValue,
                    'remCondEco' => $processo->getElementsByTagName('remCondEco')->item(0)->nodeValue,
                    'numDiasTrabCondEco' => $processo->getElementsByTagName('numDiasTrabCondEco')->item(0)->nodeValue,
                    'motivoEmigCondEco' => $processo->getElementsByTagName('motivoEmigCondEco')->item(0)->nodeValue,
                    'despDeslCondEco' => $processo->getElementsByTagName('despDeslCondEco')->item(0)->nodeValue,
                    'julgadoAntPen' => $processo->getElementsByTagName('julgadoAntPen')->item(0)->nodeValue,
                    'procPendAntPen' => $processo->getElementsByTagName('procPendAntPen')->item(0)->nodeValue,
                    'procPendFamAntPen' => $processo->getElementsByTagName('procPendFamAntPen')->item(0)->nodeValue,
                    'nomeAuxPaisDestino' => $processo->getElementsByTagName('nomeAuxPaisDestino')->item(0)->nodeValue,
                    'parentescoAuxPaisDestino' => $processo->getElementsByTagName('parentescoAuxPaisDestino')->item(0)->nodeValue,
                    'residenciaAuxPaisDestino' => $processo->getElementsByTagName('residenciaAuxPaisDestino')->item(0)->nodeValue,
                    'profissaoAuxPaisDestino' => $processo->getElementsByTagName('profissaoAuxPaisDestino')->item(0)->nodeValue,
                    'auxPrestadosAuxPaisDestino' => $processo->getElementsByTagName('auxPrestadosAuxPaisDestino')->item(0)->nodeValue,
                    'obtenContratoTrab' => $processo->getElementsByTagName('obtenContratoTrab')->item(0)->nodeValue,
                    'profissaoContratoTrab' => $processo->getElementsByTagName('profissaoContratoTrab')->item(0)->nodeValue,
                    'salarioContratoTrab' => $processo->getElementsByTagName('salarioContratoTrab')->item(0)->nodeValue,
                    'jaTrabalhouMulherMenor' => $processo->getElementsByTagName('jaTrabalhouMulherMenor')->item(0)->nodeValue,
                    'familiaresMulherMenor' => $processo->getElementsByTagName('familiaresMulherMenor')->item(0)->nodeValue,
                    'qtTempoMulherMenor' => $processo->getElementsByTagName('qtTempoMulherMenor')->item(0)->nodeValue,
                    'ocupacaoMulherMenor' => $processo->getElementsByTagName('ocupacaoMulherMenor')->item(0)->nodeValue,
                    'temConhecimentoDeclMulher' => $processo->getElementsByTagName('temConhecimentoDeclMulher')->item(0)->nodeValue,
                    'consideraDeclMulher' => $processo->getElementsByTagName('consideraDeclMulher')->item(0)->nodeValue,
                    'parentescoComChamante' => $processo->getElementsByTagName('parentescoComChamante')->item(0)->nodeValue
                ];
                break;

            }
            
        }

        return view('processo.show', compact('proc'));

    }
}
