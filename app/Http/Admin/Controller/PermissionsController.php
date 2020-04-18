<?php
/**
 * Created by PhpStorm
 * Author Wuchuheng<wuchuheng@163.com>
 * Licence MIT
 * DATE 2020/4/15
 */

namespace App\Http\Admin\Controller;

use App\Model\PermissionModel;
use Hyperf\DbConnection\Db;

class PermissionsController extends AbstractController
{
    /**
     * 权限列表.
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index()
    {
        $json_str = '{
            "total": 100,
            "items": [
              {
                "id": 1,
                "timestamp": 449592564102,
                "author": "Joseph",
                "reviewer": "Charles",
                "title": "Jjdskymv Xndtok Sdcedpisqx Ubnzd Hwdzoonio Yveylz Xez Txcilhxx",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 56.04,
                "importance": 2,
                "type": "US",
                "status": "draft",
                "display_time": "1975-10-27 16:14:37",
                "comment_disabled": true,
                "pageviews": 2327,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 2,
                "timestamp": 195817587005,
                "author": "Cynthia",
                "reviewer": "Nancy",
                "title": "Csmirkdow Xmknqiqvpt Bkpbbmmv Gckwxbt Ouibjoyly Ufxnoktu Yvmqwqibss Tlo Fwcz",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 87.31,
                "importance": 1,
                "type": "EU",
                "status": "draft",
                "display_time": "1975-05-23 23:35:39",
                "comment_disabled": true,
                "pageviews": 1545,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 3,
                "timestamp": 85082146239,
                "author": "Margaret",
                "reviewer": "Linda",
                "title": "Xuhx Ttuaj Atgsrbqan Bqeglo Oifvrxnydk Cwddbdoyto Oujpegr Awiyprvbym",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 64.43,
                "importance": 2,
                "type": "JP",
                "status": "published",
                "display_time": "2000-09-12 21:04:54",
                "comment_disabled": true,
                "pageviews": 2820,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 4,
                "timestamp": 331607364692,
                "author": "Angela",
                "reviewer": "David",
                "title": "Bikc Crrvdz Adwytcu Tfnitqmxs Ufzrkw Ksdjuu Yymrq Xeqrqh",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 76.25,
                "importance": 2,
                "type": "EU",
                "status": "draft",
                "display_time": "1990-06-26 03:04:20",
                "comment_disabled": true,
                "pageviews": 3292,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 5,
                "timestamp": 731104631839,
                "author": "Michael",
                "reviewer": "Sandra",
                "title": "Swqfumlw Pptvpt Nklx Irk Slk",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 92.51,
                "importance": 2,
                "type": "JP",
                "status": "draft",
                "display_time": "1975-07-04 09:47:10",
                "comment_disabled": true,
                "pageviews": 1936,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 6,
                "timestamp": 1237508814756,
                "author": "Melissa",
                "reviewer": "Eric",
                "title": "Nfxm Hdjwq Kwbcl Pltqnyl Trrohivhg Hnpo Uktxotync",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 45.24,
                "importance": 3,
                "type": "JP",
                "status": "published",
                "display_time": "1970-05-17 01:50:32",
                "comment_disabled": true,
                "pageviews": 4031,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 7,
                "timestamp": 851259393038,
                "author": "Paul",
                "reviewer": "Jose",
                "title": "Ljv Sinrmtt Tdihkwe Jbstxvevgi Pgoeuvrxu Nnmszntoy Ogbfssyw Hjfxyajca",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 23.68,
                "importance": 3,
                "type": "EU",
                "status": "published",
                "display_time": "2018-12-04 15:15:35",
                "comment_disabled": true,
                "pageviews": 2858,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 8,
                "timestamp": 894333270264,
                "author": "Jeffrey",
                "reviewer": "Kimberly",
                "title": "Jmnicqbdsd Ivwghrsgg Jqhfkylbe Fkvh Tvbk Mdrveqnogl Ybtg",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 59.35,
                "importance": 1,
                "type": "JP",
                "status": "draft",
                "display_time": "1998-06-30 12:27:09",
                "comment_disabled": true,
                "pageviews": 1650,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 9,
                "timestamp": 719346979029,
                "author": "Angela",
                "reviewer": "Kenneth",
                "title": "Tol Tzet Tertjntcvg Mskftmq Lcli Yrvmxfuiai",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 55.62,
                "importance": 1,
                "type": "CN",
                "status": "published",
                "display_time": "2008-11-23 03:27:52",
                "comment_disabled": true,
                "pageviews": 4618,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 10,
                "timestamp": 1438860702799,
                "author": "Helen",
                "reviewer": "Donald",
                "title": "Usk Wdgcrikc Sdd Hspdxk Jqoafnr Zwmmcwwyy Oiiq Ntzigc Kqwqh",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 60.73,
                "importance": 3,
                "type": "JP",
                "status": "draft",
                "display_time": "1985-07-02 06:25:07",
                "comment_disabled": true,
                "pageviews": 1917,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 11,
                "timestamp": 69273650387,
                "author": "Mary",
                "reviewer": "Brian",
                "title": "Jiydqcc Gsucwmrm Hsyzhdwyx Qzaalq Xqelcjj",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 48.37,
                "importance": 2,
                "type": "US",
                "status": "draft",
                "display_time": "2019-12-28 15:42:16",
                "comment_disabled": true,
                "pageviews": 523,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 12,
                "timestamp": 1312085340651,
                "author": "Mark",
                "reviewer": "Amy",
                "title": "Rqeks Rmo Yxnthg Mbehfmb Ktqelw Mhreq Pmgzzro Gpyihwo Xjlickjbk Hroxfmkojx",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 93.23,
                "importance": 3,
                "type": "JP",
                "status": "draft",
                "display_time": "2010-01-23 20:07:38",
                "comment_disabled": true,
                "pageviews": 1978,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 13,
                "timestamp": 535754772592,
                "author": "Sandra",
                "reviewer": "Eric",
                "title": "Rhoc Egugr Ybivscbdq Kuizzc Yzmrq Gsutvx",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 33.54,
                "importance": 2,
                "type": "JP",
                "status": "draft",
                "display_time": "1989-05-21 16:47:35",
                "comment_disabled": true,
                "pageviews": 2802,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 14,
                "timestamp": 481408774581,
                "author": "Scott",
                "reviewer": "Kimberly",
                "title": "Krlmeqhtt Sckdnyuj Gulzrygp Hdo Xhrflmru Eoamlhjr Lgwfmb Genukjets Bce",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 99.07,
                "importance": 2,
                "type": "EU",
                "status": "draft",
                "display_time": "1984-01-30 07:40:38",
                "comment_disabled": true,
                "pageviews": 3486,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 15,
                "timestamp": 93333333696,
                "author": "Eric",
                "reviewer": "Matthew",
                "title": "Ghyy Hhbdt Vkxildei Ytayk Xikib Kqvgd Wcpkmmjga Noplarqp",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 78.17,
                "importance": 1,
                "type": "JP",
                "status": "draft",
                "display_time": "2002-11-19 07:25:33",
                "comment_disabled": true,
                "pageviews": 4249,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 16,
                "timestamp": 1007609688648,
                "author": "Christopher",
                "reviewer": "Mark",
                "title": "Wjovhtgv Mckimoeq Dvwckmpjb Vffu Yfjclpuva",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 21.66,
                "importance": 2,
                "type": "JP",
                "status": "published",
                "display_time": "1978-04-02 14:51:56",
                "comment_disabled": true,
                "pageviews": 4184,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 17,
                "timestamp": 1001275435622,
                "author": "Scott",
                "reviewer": "Jessica",
                "title": "Lufov Lwobuhpnv Qwbbmstm Iveyeawcmu Mdy Kzowbiot",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 68.21,
                "importance": 2,
                "type": "US",
                "status": "draft",
                "display_time": "1995-05-27 10:42:11",
                "comment_disabled": true,
                "pageviews": 1612,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 18,
                "timestamp": 1350404550052,
                "author": "Frank",
                "reviewer": "Amy",
                "title": "Xgffro Smknuah Epyxh Cgbdvzq Flrz Emgu Ptwbmw",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 34.58,
                "importance": 2,
                "type": "CN",
                "status": "published",
                "display_time": "1984-04-07 13:05:59",
                "comment_disabled": true,
                "pageviews": 4180,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 19,
                "timestamp": 274613989848,
                "author": "Dorothy",
                "reviewer": "Eric",
                "title": "Vmngrxpjj Brmjdtxbj Jjptl Gorwwlltge Jrk Urixcdzl",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 66.03,
                "importance": 1,
                "type": "US",
                "status": "published",
                "display_time": "1980-02-19 06:56:03",
                "comment_disabled": true,
                "pageviews": 346,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              },
              {
                "id": 20,
                "timestamp": 688460796591,
                "author": "Anna",
                "reviewer": "Charles",
                "title": "Lralq Odfu Lkhei Tbewmx Fsvddh Ovbewpvgk",
                "content_short": "mock data",
                "content": "<p>I am testing data, I am testing data.</p><p><img src=\"https://wpimg.wallstcn.com/4c69009c-0fd4-4153-b112-6cb53d1cf943\"></p>",
                "forecast": 72.33,
                "importance": 3,
                "type": "US",
                "status": "draft",
                "display_time": "1985-09-29 14:00:49",
                "comment_disabled": true,
                "pageviews": 2572,
                "image_uri": "https://wpimg.wallstcn.com/e4558086-631c-425c-9430-56ffb46e70b3",
                "platforms": [
                  "a-platform"
                ]
              }
            ]
        }';
        return $this->responseSuccessData(json_decode($json_str, true));
    }

    /**
     * 新增权限
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function store()
    {
        return $this->responseSuccessData([]);
    }

    /**
     * @param PermissionModel $PermissionModel
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function treeIndex(PermissionModel $PermissionModel)
    {
        $all_nodes = $PermissionModel->select('id', 'pid', Db::raw(" CONCAT(`level_path`,'-', `order_num`) as path, `name` as label"))
            ->orderBy('path')
            ->get()
            ->toArray();
        $map  = [];
        $tree = [];
        foreach ($all_nodes as &$it){
            $map[$it['id']] = &$it;
        }  //数据的ID名生成新的引用索引树
        foreach ($all_nodes as &$it){
            $parent = &$map[$it['pid']];
            unset($it['path'], $it['pid']);
            if($parent) {
                $parent['children'][] = &$it;
            }else{
                $tree[] = &$it;
            }
        }
        array_unshift($tree, [
            'id' => 0,
            'lable' => '根目录'
        ]);
        return $this->responseSuccessData($tree);
    }
}