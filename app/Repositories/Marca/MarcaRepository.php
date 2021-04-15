<?php

namespace App\Repositories\Marca;

use App\Models\Brand;
use App\Repositories\BaseRepository;

class MarcaRepository extends BaseRepository
{
    public function getModel()
    {
        return new Brand();
    }

}
