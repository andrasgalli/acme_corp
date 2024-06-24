<?php

namespace App\Enums;

enum ControllerResultEnum: string {
    case SUCCESS = 'success';
    case ERROR = 'error';
    case WARNING = 'warning';
}
