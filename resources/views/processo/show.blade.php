<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dados do Processo</title>

    </head>
    <body>
        <a href="{{ route('home') }}">Voltar para index</a>
        <h3>Dados do processo {{ $proc[0]['numCM'] }}:</h3>
        <p>{{ $proc[0]['numCMu'] }}</p>
        <p>{{ $proc[0]['numJE'] }}</p>
        <p>{{ $proc[0]['ano'] }}</p>
        <p>{{ $proc[0]['idade'] }}</p>
        <p>{{ $proc[0]['estCivil'] }}</p>
        <p>{{ $proc[0]['paisDestino'] }}</p>
        <p>{{ $proc[0]['localidadeDestino'] }}</p>
        <p>{{ $proc[0]['dtExp'] }}</p>
        <p>{{ $proc[0]['oficioExp'] }}</p>
        <p>{{ $proc[0]['passapExp'] }}</p>
        <p>{{ $proc[0]['tipoTranspEmb'] }}</p>
        <p>{{ $proc[0]['desigTranspEmb'] }}</p>
        <p>{{ $proc[0]['ciaEmb'] }}</p>
        <p>{{ $proc[0]['dtEmb'] }}</p>
        <p>{{ $proc[0]['passPagaEmb'] }}</p>
        <p>{{ $proc[0]['localEmb'] }}</p>
        <p>{{ $proc[0]['portoDesemb'] }}</p>
        <p>{{ $proc[0]['irComEmb'] }}</p>
        <p>{{ $proc[0]['profissaoHab'] }}</p>
        <p>{{ $proc[0]['habLiterariasHab'] }}</p>
        <p>{{ $proc[0]['localTrabHab'] }}</p>
        <p>{{ $proc[0]['remCondEco'] }}</p>
        <p>{{ $proc[0]['numDiasTrabCondEco'] }}</p>
        <p>{{ $proc[0]['motivoEmigCondEco'] }}</p>
        <p>{{ $proc[0]['despDeslCondEco'] }}</p>
        <p>{{ $proc[0]['julgadoAntPen'] }}</p>
        <p>{{ $proc[0]['procPendAntPen'] }}</p>
        <p>{{ $proc[0]['procPendFamAntPen'] }}</p>
        <p>{{ $proc[0]['nomeAuxPaisDestino'] }}</p>
        <p>{{ $proc[0]['parentescoAuxPaisDestino'] }}</p>
        <p>{{ $proc[0]['residenciaAuxPaisDestino'] }}</p>
        <p>{{ $proc[0]['profissaoAuxPaisDestino'] }}</p>
        <p>{{ $proc[0]['auxPrestadosAuxPaisDestino'] }}</p>
        <p>{{ $proc[0]['obtenContratoTrab'] }}</p>
        <p>{{ $proc[0]['profissaoContratoTrab'] }}</p>
        <p>{{ $proc[0]['salarioContratoTrab'] }}</p>
        <p>{{ $proc[0]['jaTrabalhouMulherMenor'] }}</p>
        <p>{{ $proc[0]['familiaresMulherMenor'] }}</p>
        <p>{{ $proc[0]['qtTempoMulherMenor'] }}</p>
        <p>{{ $proc[0]['ocupacaoMulherMenor'] }}</p>
        <p>{{ $proc[0]['temConhecimentoDeclMulher'] }}</p>
        <p>{{ $proc[0]['consideraDeclMulher'] }}</p>
        <p>{{ $proc[0]['parentescoComChamante'] }}</p>
    </body>
</html>
