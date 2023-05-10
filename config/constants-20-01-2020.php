<?php

return [
    'RESPONSE_CONSTANTS' => [
        'STATUS_ERROR'=> 0,
        'STATUS_SUCCESS'=> 1,
        'STATUS_OTHER_ERROR'=> 2,
        'STATUS_ACCOUNT_UNAUTHORIZED'=> 3,
        'STATUS_ACCOUNT_SUSPENDED'=> 4,
        'STATUS_ACCOUNT_DELETED'=> 5,
        'STATUS_INVALID_TOKEN'=> 6,
        'STATUS_INVALID_USER_TYPE'=> 7,
        'STATUS_EMAIL_NOT_VERIFIED'=> 8,
        'STATUS_INVALID_PRODUCT_QUANTITY' => 9,
        'STATUS_INVALID_ORDER_DATA' => 10,
        'STATUS_INVALID_COUPON_CODE' => 11,
        'INVALID_PARAMETERS'=> 'Invalid Request Parameters.',
        'ERROR_EMAIL_EXIST'=> 'Email Already In Use.',
        'ERROR_PHONE_EXIST'=> 'Phone Already In Use.',
        'ERROR_USER_NAME_EXIST'=> 'User Name Already In Use.',
        'ERROR_INVALID_CREDENTIALS'=> 'Invalid Email or Password.',
        'ERROR_ACCOUNT_SUSPENDED'=> 'Your Account Has Been Suspended.',
        'ERROR_ACCOUNT_DELETED'=> 'Your Account Has Been Deleted.',
        'ERROR_ACCOUNT_UNAUTHORIZED'=> 'Your Account Is Not Authorized Yet.',
        'ERROR_INVALID_EMAIL'=> 'Invalid Email Address.',
        'ERROR_INVALID_USER_TYPE'=> 'Invalid User Type.',
        'ERROR_INVALID_COUPON_CODE'=> 'Invalid Coupon Code.',
        'MSG_LOGGED_IN'=> 'Logged In Successfully.',
        'MSG_LOGGED_OUT'=> 'Logged Out Successfully.',
        'MSG_REGISTERED_SUCCESS'=> 'Registered Successfully.',
        'MSG_REGISTERED_OPERATOR'=> 'We have sent you an activation code. Check your email and click on the link to verify',
        'MSG_PROFILE_UPDATE'=> 'Profile Updated Successfully',
        'CATEGORY_ERROR'=> 'No Category Found',
        'MSG_REGISTERED_CUSTOMER'=> 'We have sent you an activation code. Check your email to verify your account.',
    ],

    //---------Constants for authorization/login
    'AUTH_CONSTANTS' => [
        'KEY_EMAIL'     =>  'email',
        'KEY_PASSWORD'  =>  'password',
        'KEY_DEVICE_TOKEN' => 'device_token',
    ],

    //---------Constants for customer
    'CUSTOMER_CONSTANTS' => [
        'KEY_EMAIL'     =>  'email',
        'KEY_PASSWORD'  =>  'password',
        'KEY_FULL_NAME'  =>  'full_name',
        'KEY_PHONE'  =>  'phone',
        'KEY_CITY_ID'  =>  'city_id',
        'KEY_DISTRICT_ID'  =>  'district_id',
        'KEY_VERIFICATION_CODE'  =>  'verification_code',
        'KEY_CUSTOMER_ID'  =>  'customer_id',
        'KEY_UPDATE_PASSWORD' => 'update_password',
        'KEY_PASSWORD' => 'password',
        'KEY_NEW_PASSWORD' => 'new_password',
        'KEY_PROFILE_IMAGE' => 'profile_image',
        'KEY_STATUS' => 'status',
        'KEY_DEVICE_TOKEN' => 'device_token',
        'KEY_RATING' => 'rating',
        'KEY_COMMENT' => 'comment',
        'KEY_PRODUCT_ID' => 'product_id',
        'KEY_MERCHANT_ID' => 'merchant_id',
        
    ],

    //----------Constants for Merchant Profile Update
    'MERCHANT_PEROFILE_CONSTANTS' => [
        'KEY_EMAIL'  =>  'email',
        'KEY_PASSWORD'  =>  'password',
        'KEY_CONFIRM_PASSWORD'  =>  'confirm_password',
        'KEY_PHONE'  =>  'phone',
        'KEY_CONTACT_PERSON'  =>  'contact_person',
        'KEY_COMPANY_ADDRESS'  =>  'company_address',
        'KEY_COMPANY_NAME_EN'  =>  'company_name_en',
        'KEY_COMPANY_NAME_AR'  =>  'company_name_ar',
        'KEY_LICENSE_NUMBER'  =>  'license_number',
        'KEY_REGISTERATION_NUMBER'  =>  'registeration_number',
        'KEY_REGISTERATION_EXPIRY'  =>  'registeration_expiry',
        'KEY_TAX_REGISTERATION_NUMBER'  =>  'tax_registeration_number',
        'KEY_TAX_REGISTERATION_EXPIRY'  =>  'tax_registeration_expiry',
        'KEY_DELIVERY_OPENING_TIME'  =>  'delivery_opening_time',
        'KEY_DELIVERY_CLOSING_TIME'  =>  'delivery_closing_time',
        'KEY_DELIVERY_OPENING_DAY'  =>  'delivery_opening_day',
        'KEY_DELIVERY_CLOSING_DAY'  =>  'delivery_closing_day',
        'KEY_OPENING_TIME'  =>  'opening_time',
        'KEY_CLOSING_TIME'  =>  'closing_time',
        'KEY_COMPANY_LOGO'  =>  'company_logo',
    ],

     //---------Constants for authorization/login
     'GENERAL_CONSTANTS' => [
        'KEY_LATITUDE' => 'latitude',
        'KEY_LONGITUDE' => 'longitude',
        'KEY_PRODUCT_ID' => 'product_id',
        'KEY_OFFER_ID' => 'offer_id',
        'KEY_MERCHANT_ID' => 'merchant_id',
        'KEY_CATEGORY_ID' => 'category_id',
        'KEY_KEYWORD' => 'keyword',
    ],

    'CATEGORY_CONSTANTS' => [
        'KEY_NAME'=> 'name',
        'KEY_CATEGORY_LEVEL_1_ID' => 'category_level_1_id',
        'KEY_CATEGORY_LEVEL_2_ID' => 'category_level_2_id',
        'KEY_CATEGORY_LEVEL_3_ID' => 'category_level_3_id',
    ],
    
    'ADDRESS_CONSTANTS' => [
        'KEY_ADDRESS_ID'=> 'address_id',
        'KEY_ADDRESS' => 'address',
        'KEY_CITY_ID' => 'city_id',
        'KEY_DISTRICT_ID' => 'district_id',
        'KEY_TYPE' => 'type',
        'KEY_LATITUDE' => 'latitude',
        'KEY_LONGITUDE' => 'longitude',
    ],
   
    'WISHLIST_CONSTANTS' => [
        'KEY_WISHLIST_ID'=> 'wishlist_id',
        'KEY_CUSTOMER_ID'=> 'customer_id',
        'KEY_PRODUCT_ID'=> 'product_id',
    ],
    
    'CART_WISHLIST_CONSTANTS' => [
        'KEY_CART_WISHLIST_ID'=> 'cart_wishlist_id',
        'KEY_CUSTOMER_ID'=> 'customer_id',
        'KEY_PRODUCTS' => 'products',
        'KEY_PRODUCT_ID'=> 'product_id',
        'KEY_PRODUCT_QUANTITY'=> 'quantity',
        'KEY_MERCHANT_ID'=> 'merchant_id',
        'KEY_BRANCH_ID'=> 'branch_id',
    ],

    'MERCHANT_CONSTANTS' => [
        'KEY_LATITUDE' => 'latitude',
        'KEY_LONGITUDE' => 'longitude',
        'KEY_MERCHANT_ID' => 'merchant_id',
    ],

    'OFFER_CONSTANTS' => [
        'KEY_LATITUDE' => 'latitude',
        'KEY_LONGITUDE' => 'longitude',
        'KEY_OFFER_ID' => 'offer_id',
    ],

    'PRODUCT_CONSTANTS' => [
        'KEY_LATITUDE' => 'latitude',
        'KEY_LONGITUDE' => 'longitude',
        'KEY_PRODUCT_ID' => 'product_id',
        'KEY_CATEGORY_ID' => 'category_id',
        'KEY_MERCHANT_ID' => 'merchant_id',
    ],

    'CART_CONSTANTS' => [
        'KEY_CART_ID' => 'cart_id',
        'KEY_CUSTOMER_ID' => 'customer_id',
        'KEY_PRODUCT_ID' => 'product_id',
        'KEY_QUANTITY' => 'quantity',
    ],
    
    'ORDER_CONSTANTS' => [
        'KEY_ORDER_ID' => 'order_id',
        'KEY_ITEMS' => 'items',
        'KEY_PRODUCTS' => 'products',
        'KEY_PRODUCT_ID' => 'product_id',
        'KEY_CUSTOMER_ID' => 'customer_id',
        'KEY_MERCHANT_ID' => 'merchant_id',
        'KEY_BRANCH_ID' => 'branch_id',
        'KEY_QUANTITY' => 'quantity',
        'KEY_DISCOUNT' => 'discount',
        'KEY_GROSS_TOTAL' => 'gross_total',
        'KEY_NET_TOTAL' => 'net_total',
        'KEY_SHIPPING_METHOD_ID' => 'shipping_method_id',
        'KEY_SHIPPING_ADDRESS_ID' => 'shipping_address_id',
        'KEY_BILLING_ADDRESS_ID' => 'billing_address_id',
        'KEY_ORDER_STATUS' => 'order_status',
        'KEY_COUPON_CODE' => 'coupon_code',
        'KEY_DELIVERY_TIME' => 'delivery_time',
    ],

    'DP_CONSTANTS' => [
        'KEY_ORDER_ID' => 'order_id',
        'KEY_ORDER_STATUS' => 'order_status',
        'KEY_PAYMENT_STATUS' => 'payment_status',
    ]
];
