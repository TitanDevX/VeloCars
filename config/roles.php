<?php
/**
 * Available permission keys:
 * 
 * car
 * car_detail
 * user
 * branch
 * car_issue
 * car_issue_template
 * rental
 * installment
 * installment_plan
 * invoice
 *
 */
return [
  'roles' => [
    'admin' => ['*'],
    'accounter' => [
      'inherit' => 'technician',
      'userinstallment.view',
      'userinstallment.delete',
      'userinstallment.create',
      'userinstallment.view',
      'userinstallment.index',
      'userinstallment.alerts',

      'rental.view',
      'rental.delete',
      'rental.create',
      'rental.view',
      'rental.index',
      'rental.alerts',

      'statistics.view',

      'car.update',

      'invoice.index',
      'invoice.view',
      'invoice.create',
      'invoice.delete',
      'invoice.update',

      'installmentplan.create',
      'installmentplan.update',
      'installmentplan.delete',

    ],
    'technician' => [
      'inherit' => 'user',
      'car.info.update', # Update everything about a car but things related to buy & rent.
      'cardetail.create',
      'cardetail.update',
      'carissue.create',
      'carissue.delete',
      'carissue.view',
      'carissue.update',
      'carissuetemplate.view',
      'carissuetemplate.create',
      'carissuetemplate.delete',
      'carissuetemplate.update',
    ],
    'user' => [
      'car.index',
      'car.search',
      'car.view',
      'cardetail.view',
      'branch.index',
      'branch.view',
      'invoice.view.own',
      'userinstallment.own.create',
      'userinstallment.own.index',
      'userinstallment.own.view',
      'rental.own.create',
      'rental.own.index',
      'rental.own.view',
      'installmentplan.index',
      'installmentplan.view'
    ]


  ],
  'mappings' =>
    [
      'c' => 'create',
      'r' => 'reterive',
      'u' => 'update',
      'd' => 'delete',
    ]
];

