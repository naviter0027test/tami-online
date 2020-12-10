<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ContactRepository;
use App\Repositories\SysConfigRepository;
use Session;
use Exception;

class ApiController extends Controller
{
    public function companys(Request $request) {
        $params = $request->all();
        $sysConfigRepository = new SysConfigRepository();
        $watchAmount = $sysConfigRepository->getWatchAmount();
        $sysConfigRepository->setWatchAmount(++$watchAmount);
        $result = [
            'result' => true,
            'msg' => 'success',
            'visitorCount' => $watchAmount
        ];
        try {
            $companyRepository = new CompanyRepository();
            $result['data'] = $companyRepository->frontList($params);
            foreach ($result['data'] as $i => $company) {
                if(trim($result['data'][$i]->logo) != '')
                    $result['data'][$i]->logo = "/uploads". $result['data'][$i]->logo;
                if(trim($result['data'][$i]->logo2) != '')
                    $result['data'][$i]->logo2 = "/uploads". $result['data'][$i]->logo2;
                if(trim($result['data'][$i]->infoPath1) != '')
                    $result['data'][$i]->infoPath1 = "/uploads". $result['data'][$i]->infoPath1;
                if(trim($result['data'][$i]->infoPath2) != '')
                    $result['data'][$i]->infoPath2 = "/uploads". $result['data'][$i]->infoPath2;
                if(trim($result['data'][$i]->infoPath3) != '')
                    $result['data'][$i]->infoPath3 = "/uploads". $result['data'][$i]->infoPath3;
                if(trim($result['data'][$i]->infoPath4) != '')
                    $result['data'][$i]->infoPath4 = "/uploads". $result['data'][$i]->infoPath4;
                if(trim($result['data'][$i]->infoPath5) != '')
                    $result['data'][$i]->infoPath5 = "/uploads". $result['data'][$i]->infoPath5;
                if(trim($result['data'][$i]->companyRightInfo) != '')
                    $result['data'][$i]->companyRightInfo = "/uploads". $result['data'][$i]->companyRightInfo;
            }
        } catch(Exception $e) {
            $result = [
                'result' => false,
                'msg' => $e->getMessage(),
            ];
        }
        return response(json_encode($result))
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTINS')
            ->header('Access-Control-Allow-Headers', 'X-Access-Token, X-Application-Name, X-Request-Sent-Time');
    }

    public function company(Request $request, $companyId = 0) {
        $params = $request->all();
        $params['nowPage'] = 1;
        $params['offset'] = 1000;
        $params['companyId'] = $companyId;
        $result = [
            'result' => true,
            'msg' => 'success',
        ];
        try {
            $companyRepository = new CompanyRepository();
            $productRepository = new ProductRepository();
            $result['company'] = $companyRepository->getById($companyId);
            unset($result['company']->password);
            if(trim($result['company']->logo) != '')
                $result['company']->logo = "/uploads". $result['company']->logo;
            if(trim($result['company']->logo2) != '')
                $result['company']->logo2 = "/uploads". $result['company']->logo2;
            if(trim($result['company']->infoPath1) != '')
                $result['company']->infoPath1 = "/uploads". $result['company']->infoPath1;
            if(trim($result['company']->infoPath2) != '')
                $result['company']->infoPath2 = "/uploads". $result['company']->infoPath2;
            if(trim($result['company']->infoPath3) != '')
                $result['company']->infoPath3 = "/uploads". $result['company']->infoPath3;
            if(trim($result['company']->infoPath4) != '')
                $result['company']->infoPath4 = "/uploads". $result['company']->infoPath4;
            if(trim($result['company']->infoPath5) != '')
                $result['company']->infoPath5 = "/uploads". $result['company']->infoPath5;
            if(trim($result['company']->companyRightInfo) != '')
                $result['company']->companyRightInfo = "/uploads". $result['company']->companyRightInfo;
            $result['products'] = $productRepository->lists($params);
            foreach($result['products'] as $j => $product) {
                if(trim($result['products'][$j]->picture1) != '')
                    $result['products'][$j]->picture1 = "/product". $result['products'][$j]->picture1;
                if(trim($result['products'][$j]->picture2) != '')
                    $result['products'][$j]->picture2 = "/product". $result['products'][$j]->picture2;
                if(trim($result['products'][$j]->picture3) != '')
                    $result['products'][$j]->picture3 = "/product". $result['products'][$j]->picture3;
                if(trim($result['products'][$j]->dm) != '')
                    $result['products'][$j]->dm = "/product". $result['products'][$j]->dm;
            }
        } catch(Exception $e) {
            $result = [
                'result' => false,
                'msg' => $e->getMessage(),
            ];
        }
        return response(json_encode($result))
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTINS')
            ->header('Access-Control-Allow-Headers', 'X-Access-Token, X-Application-Name, X-Request-Sent-Time');
    }

    public function setEnvironmentValue(array $values) {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {

                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }

            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;

    }
}
