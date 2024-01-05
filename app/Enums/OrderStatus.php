<?php


namespace App\Enums;


enum OrderStatus : string{

    case PENDING = 'pending';
    case PROCESSED = 'processed';
    case DELIVERY = 'delivery';
    case DONE = 'done';
}
