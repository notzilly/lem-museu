<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Xml extends Controller
{

    /**
     * Convert the given XML and saves output into file
     *
     * @return \Illuminate\Http\Response
     */
    public function convertXML($filename)
    {

        echo "Abrindo arquivo!<br/>";
        $doc = new \DOMDocument();
        $doc->resolveExternals = true;
        $doc->substituteEntities = false;
        $doc->load(utf8_decode(base_path('docs/MuseuEmigracaoBD.xml')));

        echo "Convertendo arquivo XML...<br/>";

        $xml = "<?xml version='1.0' encoding='utf-8'?>\n<Museu>\n";

        $tables = $doc->getElementsByTagName('table');

        foreach($tables as $table) {

            $xml .= "\t<" . $table->getAttribute('name') . ">\n";

            $columns = $table->getElementsByTagName('column');

            foreach($columns as $column) {
                
                $xml .= "\t\t<" . $column->getAttribute('name') . ">";

                $xml .= htmlspecialchars($column->nodeValue);

                $xml .= "</" . $column->getAttribute('name') . ">\n";

            }

            $xml .= "\t</" . $table->getAttribute('name') . ">\n";

        }

        $xml .= "</Museu>";

        $file = fopen($filename, "w");
        fwrite($file, $xml);
        fclose($file);

        echo "Arquivo convertido com sucesso!<br/>";

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}
