<?php
/**
 *
 * User: lskj03
 * Date: 2019/12/24
 */

$arr = [
    '参考号码',
    '订单号码',
    '合同号码',
    '订单日期',
    '供应商名称',
    '产品名称',
    '产品标准',
    '数量',
    '单位',
    '单价（人民币）',
    '单价（美元）',
    '退税率',
    '付款方式',
    '交货期',
    '总价（人民币）',
    '总价（美元）',
    '是否付款',
    '付款日期',
];
$arr2 = [
    'reference_no',
    'order_no',
    'contract_no',
    'order_date',
    'supplier_name',
    'product_name',
    'product_standard',
    'product_quantity',
    'unit',
    'price_yuan',
    'price_dollar',
    'refund_rate',
    'pay_type',
    'delivery_date',
    'total_price_yuan',
    'total_price_dollar',
    'is_paid',
    'pay_date',
];
$html = '';
foreach ($arr as $key => $item) {
    $html .= "<FormItem
              {...formItemLayout}
              label=\"${item}\"
            >
              {
                getFieldDecorator('${arr2[$key]}', {
                  initialValue: ${arr2[$key]},
                })(<Input />)
              }
            </FormItem>\n";
}
print_r($html);
