<?php

namespace Modules\pkgBlog\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    use HasRoles ;
}
