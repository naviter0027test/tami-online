<?php

namespace App\Repositories;

use App\Product;
use Exception;

class ProductRepository
{
    public function create($params, $company, $files) {
        $product = new Product();
        $product->name = isset($params['name']) ? $params['name'] : '';
        $product->info = isset($params['info']) ? $params['info'] : '';
        $product->active = isset($params['active']) ? $params['active'] : 1;
        $product->video = isset($params['video']) ? $params['video'] : '';
        $product->dm = isset($params['dm']) ? $params['dm'] : '';
        $product->companyId = $company->id;
        $product->save();

        $root = config('filesystems')['disks']['product']['root'];
        $path = date('/Y/m'). '/';
        if(isset($files['picture1'])) {
            $ext = $files['picture1']->getClientOriginalExtension();
            $filename = $product->id. "_picture1.$ext";
            $product->picture1 = $path. $filename;
            $product->save();
            $files['picture1']->move($root. $path, $filename);
        }
    }

    public function lists($params) {
        $nowPage = isset($params['nowPage']) ? (int) $params['nowPage'] : 1;
        $offset = isset($params['offset']) ? (int) $params['offset'] : 10;
        if(isset($params['companyId']) == false)
            throw new Exception('please input company id');

        $productQuery = Product::orderBy('id', 'desc')
            ->where('companyId', '=', $params['companyId'])
            ->skip(($nowPage-1) * $offset)
            ->take($offset);
        $companies = $productQuery->get();
        foreach($companies as $i => $product) {
            switch($product->active) {
            case 0:
                $companies[$i]->activeShow = '否';
                break;
            case 1:
                $companies[$i]->activeShow = '是';
                break;
            }
        }
        return $companies;
    }

    public function listsAmount($params) {
        if(isset($params['companyId']) == false)
            throw new Exception('please input company id');
        $productQuery = Product::orderBy('id', 'desc')
            ->where('companyId', '=', $params['companyId']);
        return $productQuery->count();
    }
}
