<?php
$data = $taobaoapi->allQuanList($q,$p, 100, $platform, $cat, $pid);
        $ret_tmp = objtoarr($data);
        $ret_tmp_tbk_coupon = $ret_tmp['results']['tbk_coupon'];
        $sort = [];
        foreach ($ret_tmp_tbk_coupon as $k=>$v){
            $ret_tmp_tbk_coupon[$k]['sales'] =  $v['coupon_total_count'] - $v['coupon_remain_count'];

//            $ret_tmp_tbk_coupon[$k]['coupon_price'] =  substr($v['coupon_info'],strpos($v['coupon_info'],'减')-1,-1);
            preg_match("/[\x{4e00}-\x{9fa5}]{2,4}(\d+)/u", $v['coupon_info'], $matches);
            $ret_tmp_tbk_coupon[$k]['coupon_price'] = $matches[1];
            $ret_tmp_tbk_coupon[$k]['discount'] =  sprintf('%.3f',$matches[1]/$ret_tmp_tbk_coupon[$k]['zk_final_price']);
        }
        $sort = [1=>'sales',2=>'discount',3=>'zk_final_price',4=>'coupon_price'];
        $sort_type = [1=>SORT_DESC,2=>SORT_DESC,3=>SORT_ASC,4=>SORT_DESC];
        foreach ($ret_tmp_tbk_coupon as $key => $row) {
            $sales[$key]  = $row['sales'];
            $discount[$key] = $row['discount'];
            $zk_final_price[$key] = $row['zk_final_price'];
            $coupon_price[$key] = $row['coupon_price'];
        }
 ?>
