<?php
/**
 * Created by PhpStorm
 * Author Wuchuheng<wuchuheng@163.com>
 * Licence MIT
 * DATE 2020/4/15
 */

namespace App\Http\Admin\Controller;


class DashboardsController extends AbstractController
{
    public function index()
    {
        $json_str = "{
            \"total\": 20,
            \"items\": [
              {
                \"order_no\": \"a10Cb71A-edA4-f3CA-db11-eeBfD7eF9A94\",
                \"timestamp\": 61659234886,
                \"username\": \"Kenneth Miller\",
                \"price\": 9788.5,
                \"status\": \"success\"
              },
              {
                \"order_no\": \"fc8ad191-B728-B5e9-3B44-1a463De46EBA\",
                \"timestamp\": 61659234886,
                \"username\": \"Sandra Rodriguez\",
                \"price\": 4511,
                \"status\": \"success\"
              },
              {
                \"order_no\": \"7AE3579B-3FAa-7dB6-f8DE-Ce809c8b7f1f\",
                \"timestamp\": 61659234886,
                \"username\": \"Larry Lewis\",
                \"price\": 10275.3,
                \"status\": \"success\"
              },
              {
                \"order_no\": \"E497Df3D-aB4B-f786-4CaA-1b505e5A8bFf\",
                \"timestamp\": 61659234886,
                \"username\": \"Scott White\",
                \"price\": 13253.73,
                \"status\": \"success\"
              },
              {
                \"order_no\": \"44765b1b-8fBD-83f2-507d-7eF08eA6E97c\",
                \"timestamp\": 61659234886,
                \"username\": \"Shirley Smith\",
                \"price\": 10180.2,
                \"status\": \"pending\"
              },
              {
                \"order_no\": \"E9afeb70-a5D3-2E76-D9EB-55cA4E0cF91E\",
                \"timestamp\": 61659234886,
                \"username\": \"Jason Brown\",
                \"price\": 10816.38,
                \"status\": \"pending\"
              },
              {
                \"order_no\": \"ce1edFa5-4Edc-7eb5-95F7-c2ddEDfd9b35\",
                \"timestamp\": 61659234886,
                \"username\": \"Sandra Robinson\",
                \"price\": 11282.3,
                \"status\": \"pending\"
              },
              {
                \"order_no\": \"CDB1B7c2-7c59-7795-5A21-3B0FDFFe8785\",
                \"timestamp\": 61659234886,
                \"username\": \"Eric Thompson\",
                \"price\": 2430.34,
                \"status\": \"success\"
              },
              {
                \"order_no\": \"beE97BB9-3EF8-FDD5-115F-D3eB115fd48A\",
                \"timestamp\": 61659234886,
                \"username\": \"Melissa Gonzalez\",
                \"price\": 8282.38,
                \"status\": \"success\"
              },
              {
                \"order_no\": \"AC8bCf59-4cBb-B9f8-FcE1-91db1FebbA3e\",
                \"timestamp\": 61659234886,
                \"username\": \"Donna Brown\",
                \"price\": 9699.7,
                \"status\": \"success\"
              },
              {
                \"order_no\": \"6B7e9fb9-fAdB-b2eF-e59d-F1d8cD8B9d2a\",
                \"timestamp\": 61659234886,
                \"username\": \"John Martin\",
                \"price\": 2250,
                \"status\": \"success\"
              },
              {
                \"order_no\": \"7fD3E2EA-C7AF-fE88-dFCD-D6eB5ebc8401\",
                \"timestamp\": 61659234886,
                \"username\": \"Deborah Clark\",
                \"price\": 12735.51,
                \"status\": \"success\"
              },
              {
                \"order_no\": \"FA83c5bf-c2A8-76Ab-C3A3-4408DfC8dcef\",
                \"timestamp\": 61659234886,
                \"username\": \"Steven Perez\",
                \"price\": 6237.6,
                \"status\": \"pending\"
              },
              {
                \"order_no\": \"85c4edd9-Cd5c-CF57-cAFa-3aDdF05ADc03\",
                \"timestamp\": 61659234886,
                \"username\": \"David Lewis\",
                \"price\": 9079,
                \"status\": \"success\"
              },
              {
                \"order_no\": \"33a822EA-E133-FE27-BAc9-7E825Cf8E60f\",
                \"timestamp\": 61659234886,
                \"username\": \"Steven Johnson\",
                \"price\": 1857.76,
                \"status\": \"success\"
              },
              {
                \"order_no\": \"cBB5aFdB-5c6A-CFf4-E7ad-53E51235331F\",
                \"timestamp\": 61659234886,
                \"username\": \"Susan Moore\",
                \"price\": 11778.4,
                \"status\": \"success\"
              },
              {
                \"order_no\": \"E60e8bc1-B179-a84b-D5Ce-dF3cF502aE8F\",
                \"timestamp\": 61659234886,
                \"username\": \"Matthew Jackson\",
                \"price\": 12196.7,
                \"status\": \"pending\"
              },
              {
                \"order_no\": \"dEfBD8c2-aE4F-FbFc-c427-De6D7db6FA77\",
                \"timestamp\": 61659234886,
                \"username\": \"Charles Miller\",
                \"price\": 14556.5,
                \"status\": \"pending\"
              },
              {
                \"order_no\": \"8F1f9F27-AdAe-2a9b-dfc5-f8A57Ec6DEEc\",
                \"timestamp\": 61659234886,
                \"username\": \"Laura Young\",
                \"price\": 6505.6,
                \"status\": \"success\"
              },
              {
                \"order_no\": \"cD4d793d-D574-A6E5-bD19-E6C2A4CD159d\",
                \"timestamp\": 61659234886,
                \"username\": \"Jeffrey Thompson\",
                \"price\": 7411.74,
                \"status\": \"success\"
              }
            ]
        }";
        return $this->responseSuccessData(json_decode($json_str, true));
    }
}