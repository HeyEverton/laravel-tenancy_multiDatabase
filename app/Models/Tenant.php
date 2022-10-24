<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\{HasDatabase, HasDomains};
use Stancl\Tenancy\Database\Models\Tenant as TenantBase;

class Tenant extends TenantBase implements TenantWithDatabase
{
    use HasFactory, HasDatabase, HasDomains;
}
