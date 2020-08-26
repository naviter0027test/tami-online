<?php

namespace App\Repositories;

use App\Contact;
use App\Company;
use App\Product;
use App\Industry;
use App\IndustryContactRelation;
use App\JobTitle;
use Exception;
use Config;

class ContactRepository
{
    public function lists($params) {
        $nowPage = isset($params['nowPage']) ? (int) $params['nowPage'] : 1;
        $offset = isset($params['offset']) ? (int) $params['offset'] : 10;
        if(isset($params['companyId']) == false)
            throw new Exception('please input company id');

        $contactQuery = Contact::orderBy('id', 'desc')
            ->where('companyId', '=', $params['companyId'])
            ->skip(($nowPage-1) * $offset)
            ->take($offset);
        $contacts = $contactQuery->get();
        return $contacts;
    }

    public function listsAmount($params) {
        if(isset($params['companyId']) == false)
            throw new Exception('please input company id');
        $contactQuery = Contact::orderBy('id', 'desc')
            ->where('companyId', '=', $params['companyId']);
        return $contactQuery->count();
    }

    public function getById($id) {
        $contact = Contact::where('id', '=', $id)
            ->first();
        if(isset($contact->id) == false) {
            throw new Exception("資料不存在 id:[$id]");
        }
        return $contact;
    }

    public function getByIdCompany($id, $companyId) {
        $contact = Contact::where('id', '=', $id)
            ->where('companyId', '=', $companyId)
            ->first();
        if(isset($contact->id) == false) {
            throw new Exception("資料不存在 id:[$id]");
        }
        return $contact;
    }

    public function updateById($id, $params, $admin = null) {
        $contact = Contact::where('id', '=', $id)
            ->first();
        if(isset($contact->id) == false)
            throw new Exception("資料不存在 id:[$id]");
        $contact->active = isset($params['active']) ? $params['active'] : '未處理';
        $contact->save();
    }

    public function amountList($params = []) {
        if(isset($params['companyId']) == false)
            throw new Exception('please input company id');
        $countArr = [];
        $countArr['not'] = Contact::where('active', '=', '未處理')
            ->where('companyId', '=', $params['companyId'])
            ->count();
        $countArr['ing'] = Contact::where('active', '=', '處理中')
            ->where('companyId', '=', $params['companyId'])
            ->count();
        $countArr['been'] = Contact::where('active', '=', '已處理')
            ->where('companyId', '=', $params['companyId'])
            ->count();
        return $countArr;
    }

    public function listsByAdmin($params) {
        $nowPage = isset($params['nowPage']) ? (int) $params['nowPage'] : 1;
        $offset = isset($params['offset']) ? (int) $params['offset'] : 10;

        $contactQuery = Contact::orderBy('id', 'desc')
            ->skip(($nowPage-1) * $offset)
            ->take($offset);
        $contacts = $contactQuery->get();
        return $contacts;
    }

    public function listsAmountByAdmin($params) {
        $contactQuery = Contact::orderBy('id', 'desc');
        return $contactQuery->count();
    }

    public function amountListByAdmin() {
        $countArr = [];
        $countArr['not'] = Contact::where('active', '=', '未處理')
            ->count();
        $countArr['ing'] = Contact::where('active', '=', '處理中')
            ->count();
        $countArr['been'] = Contact::where('active', '=', '已處理')
            ->count();
        return $countArr;
    }

    public function create($params) {
        if(isset($params['productId']) == false)
            throw new Exception('product no data');

        $contact = new Contact();
        $contact->name = isset($params['name']) ? $params['name'] : '';
        $contact->companyName = isset($params['companyName']) ? $params['companyName'] : '';
        $contact->email = isset($params['email']) ? $params['email'] : '';
        $contact->phone = isset($params['phone']) ? $params['phone'] : '';
        $contact->content = isset($params['content']) ? $params['content'] : '';
        $contact->companyId = isset($params['companyId']) ? $params['companyId'] : 0;
        $contact->productId = isset($params['productId']) ? $params['productId'] : 0;
        $contact->jobTitleId = isset($params['radio_position']) ? $params['radio_position'] : 0;
        $contact->save();

        if(isset($params['industryRelations']))
            foreach($params['industryRelations'] as $industryRelationId) {
                $industryRelation = new IndustryContactRelation();
                $industryRelation->contactId = $contact->id;
                $industryRelation->industryId = $industryRelationId;
                $industryRelation->save();
            }

        $params['contactId'] = $contact->id;
        $this->notify($params);
    }

    public function notify($params) {
        if(isset($params['companyId']) == false)
            throw new Exception('please input companyId');
        if(isset($params['contactId']) == false)
            throw new Exception('please input contactId');
        if(isset($params['productId']) == false)
            throw new Exception('please input productId');
        $company = Company::where('id', '=', $params['companyId'])
            ->first();
        $product = Product::where('id', '=', $params['productId'])
            ->first();
        if(trim($product->email) != '')
            \Mail::send('email.contactNotify', ['company' => $company, 'params' => $params], function($message) use ($company, $product) {
                $fromAddr = Config::get('mail.from.address');
                $fromName = Config::get('mail.from.name');
                $testTitle = env('APP_ENV') == 'local' ? '[Test] ' : '';
                $appSmall = env('APP_SMALL');
                $message->from($fromAddr, $fromName);
                \Log::info('mail product');
                $message->to($product->email, $company->name)->subject("$testTitle <$appSmall 台湾鞋机线上展 询问信函>");
            });
        else
            \Log::info('product id:['. $product->id. '], name:['. $product->name. '] email is empty');
    }

    public function statisticsJobTitleListByAdmin() {
        $jobTitles = JobTitle::orderBy('sort', 'asc')
            ->get();
        foreach($jobTitles as $i => $jobTitle) {
            $jobTitles[$i]['count'] = Contact::where('jobTitleId' ,'=', $jobTitle->id)
                ->count();
        }
        return $jobTitles;
    }
}
