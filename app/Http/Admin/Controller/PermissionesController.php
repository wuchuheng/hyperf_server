<?php
/**
 * Created by PhpStorm
 * Author Wuchuheng<wuchuheng@163.com>
 * Licence MIT
 * DATE 2020/4/15
 */

namespace App\Http\Admin\Controller;

use App\Http\Admin\Validation\PermissionesValidation;
use App\Model\PermissionModel;
use Hyperf\DbConnection\Db;

class PermissionesController extends AbstractController
{
    /**
     * 权限列表.
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(PermissionModel $PermissionModel)
    {
        $limit = $this->Request->input('limit', 10);
        $Permissiones = $PermissionModel->paginate((int) $limit);
        $map  = [];
        $tree = [];
        $items = $Permissiones->items();
        $items = array_map(function ($El) {
            return $El->toArray();
        }, $items);
        foreach ($items as &$it){
            $el = &$it;
            $map[$it['id']] = &$it;
        }  //数据的ID名生成新的引用索引树
        foreach ($items as &$it){
            $parent = &$map[$it['pid']];
            if($parent) {
                $parent['children'][] = &$it;
            }else{
                $tree[] = &$it;
            }
        }
        return $this->responseSuccessData([
            'total' => $Permissiones->total(),
            'items' => $tree
        ]);
    }

    /**
     * 新增权限
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function store(PermissionesValidation $PermissionesValidation, PermissionModel $PermissionModel)
    {
        $PermissionesValidation->scene('add_permission')->goCheck();
        $Permission = new PermissionModel();
        if ($this->Request->input('pid') !== 0) {
            $ParentNote = $PermissionModel->where('id', $this->Request->input('pid'))->first();
            $Permission->level_path = $ParentNote->level_path . '-' . $ParentNote->id;
            $Permission->pid = $ParentNote->id;
        } else {
            $Permission->level_path = 0;
            $Permission->pid = 0;
        }
        $Permission->note = $this->Request->input('note', '');
        $Permission->name = $this->Request->input('name');
        $Permission->http_methods = implode(',', $this->Request->input('http_methods'));
        $Permission->http_path = $this->Request->input('http_path');
        $Permission->slug = $this->Request->input('slug');
        if ($Permission->save()) {
            return $this->responseSuccessMsg();
        } else {
            return $this->responseFailDate();
        }
    }

    /**
     * @param PermissionModel $PermissionModel
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function treeIndex(PermissionModel $PermissionModel)
    {
        $all_nodes = $PermissionModel->select('id', 'pid', Db::raw(" CONCAT(`level_path`,'-', `order_num`) as path, `name` as label"))
            ->where('pid', 0)
            ->orderBy('path')
            ->get()
            ->toArray();
        $map = [];
        $tree = [];
        foreach ($all_nodes as &$it) {
            $map[$it['id']] = &$it;
        }  //数据的ID名生成新的引用索引树
        foreach ($all_nodes as &$it) {
            $parent = &$map[$it['pid']];
            unset($it['path'], $it['pid']);
            if ($parent) {
                $parent['children'][] = &$it;
            } else {
                $tree[] = &$it;
            }
        }
        $tree = [[
            'id' => 0,
            'label' => '根目录',
            'children' => $tree]];
        return $this->responseSuccessData($tree);
    }


    public function destroy($id, PermissionesValidation $PermissionesValidation)
    {
        $PermissionesValidation->scene('destroy')->goCheck();
        var_dump($id);
    }
}
