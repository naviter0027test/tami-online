<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ContactRepository;
use Session;
use Exception;

class ApiController extends Controller
{
    public function companys(Request $request) {
        $params = $request->all();
        $result = [
            'result' => true,
            'msg' => 'success',
        ];
        try {
            $companyRepository = new CompanyRepository();
            $result['data'] = $companyRepository->frontList($params);
        } catch(Exception $e) {
            $result = [
                'result' => false,
                'msg' => $e->getMessage(),
            ];
        }
        return json_encode($result);
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
            $result['products'] = $productRepository->lists($params);
        } catch(Exception $e) {
            $result = [
                'result' => false,
                'msg' => $e->getMessage(),
            ];
        }
        return json_encode($result);
    }
}
