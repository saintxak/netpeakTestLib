<?php
namespace saintxak;

use saintxak\reports\types\CSV;
use saintxak\reports\types\XML;
use saintxak\reports\types\JSON;
use saintxak\reports\IType;

class ReportBuilder{
    static public function createReport(array &$elements, $type, $fileName){
        $file = '';
        
        switch ($type){
            case 'csv': $file = self::createCSVFile($elements, $fileName); break;
            case 'xml': $file = self::createXMLFile($elements, $fileName); break;
            case 'json': $file = self::createJSONFile($elements, $fileName); break;
            default: break;
        }

        return $file;
    }

    static public function createCSVFile(array &$elements, $fileName){
        $csv = new CSV();
        return self::createReportFile($elements,$csv,$fileName);
    }

    static public function createJSONFile(array &$elements){
        $json = new JSON();
        return self::createReportFile($elements,$json,$fileName);
    }

    static public function createXMLFile(array &$elements){
        $xml = new XML();
        return self::createReportFile($elements,$xml,$fileName);
    }

    static public function createReportFile(array &$elements, IType $type, $fileName){
        foreach ($elements as $element){
            $type->appendElement($element);
        }

        file_put_contents($fileName,$type->getData());

        return $fileName;
    }
}