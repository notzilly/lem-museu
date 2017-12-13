<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XmlController extends Controller
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

        $file = fopen(base_path('docs/' . $filename), "w");
        fwrite($file, $xml);
        fclose($file);

        echo "Arquivo convertido com sucesso!<br/>";

    }

}
