<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Session;
use Exception;

class ProductController extends Controller
{
    public function index(Request $request) {
        $company = Session::get('company');
        $params = $request->all();
        $validate = Validator::make($request->all(), [
            'nowPage' => 'integer',
            'offset' => 'integer',
        ]);

        if($validate->fails()) {
            $res['status'] = false;
            $res['message'] = $validate->errors();
            return response()->json($res, 200);
        }
        $params['nowPage'] = isset($params['nowPage']) ? $params['nowPage'] : 1;
        $params['offset'] = isset($params['offset']) ? $params['offset'] : 10;
        $params['companyId'] = $company->id;
        $result = [
            'result' => true,
            'msg' => 'success',
            'nowPage' => $params['nowPage'],
            'offset' => $params['offset'],
        ];
        try {
            $productRepository = new ProductRepository();
            $result['products'] = $productRepository->lists($params);
            $result['amount'] = $productRepository->listsAmount($params);
        }
        catch(Exception $e) {
            $result['result'] = false;
            $result['msg'] = $e->getMessage();
        }
        return view('company.product.index', ['company' => $company, 'result' => $result, 'offset' => $result['offset'], 'nowPage' => $result['nowPage'], 'params' => $params]);
    }

    public function createPage(Request $request) {
        $company = Session::get('company');
        return view('company.product.create', ['company' => $company]);
    }

    public function create(Request $request) {
        $company = Session::get('company');
        $params = $request->all();
        $files = [];
        $result = [
            'result' => true,
            'msg' => 'success',
        ];
        if($request->hasFile('picture1'))
            $files['picture1'] = $request->file('picture1');
        if($request->hasFile('picture2'))
            $files['picture2'] = $request->file('picture2');
        if($request->hasFile('picture3'))
            $files['picture3'] = $request->file('picture3');
        if($request->hasFile('dm'))
            $files['dm'] = $request->file('dm');

        try {
            $productRepository = new ProductRepository();
            $productRepository->create($params, $company, $files);
        } catch (Exception $e) {
            $result['result'] = false;
            $result['msg'] = $e->getMessage();
        }
        return view('company.proccessResult', ['company' => $company, 'result' => $result]);
    }

    public function edit(Request $request, $id) {
        $company = Session::get('company');
        $params = $request->all();
        $files = [];
        $result = [
            'result' => true,
            'msg' => 'success',
        ];

        try {
            $productRepository = new ProductRepository();
            $result['product'] = $productRepository->getById($id);
        } catch (Exception $e) {
            $result['result'] = false;
            $result['msg'] = $e->getMessage();
        }
        return view('company.product.edit', ['company' => $company, 'result' => $result ]);
    }

    public function update(Request $request, $id) {
        $company = Session::get('company');
        $params = $request->all();
        $files = [];
        $result = [
            'result' => true,
            'msg' => 'success',
        ];
        if($request->hasFile('picture1'))
            $files['picture1'] = $request->file('picture1');
        if($request->hasFile('picture2'))
            $files['picture2'] = $request->file('picture2');
        if($request->hasFile('picture3'))
            $files['picture3'] = $request->file('picture3');
        if($request->hasFile('dm'))
            $files['dm'] = $request->file('dm');

        try {
            $productRepository = new ProductRepository();
            $productRepository->updateById($id, $params, $company, $files);
        } catch (Exception $e) {
            $result['result'] = false;
            $result['msg'] = $e->getMessage();
        }
        return view('company.proccessResult', ['company' => $company, 'result' => $result]);
    }

    public function remove(Request $request, $id) {
        $company = Session::get('company');
        $files = [];
        $result = [
            'result' => true,
            'msg' => 'success',
        ];

        try {
            $productRepository = new ProductRepository();
            $productRepository->del($id);
        } catch (Exception $e) {
            $result['result'] = false;
            $result['msg'] = $e->getMessage();
        }
        return view('company.proccessResult', ['company' => $company, 'result' => $result]);
    }

    public function removePic(Request $request, $id, $pictureId) {
        $company = Session::get('company');
        $files = [];
        $result = [
            'result' => true,
            'msg' => 'success',
        ];

        try {
            $productRepository = new ProductRepository();
            $productRepository->delPicByCompany($company->id, $id, $pictureId);
        } catch (Exception $e) {
            $result['result'] = false;
            $result['msg'] = $e->getMessage();
        }
        return view('company.proccessResult', ['company' => $company, 'result' => $result]);
    }
}
