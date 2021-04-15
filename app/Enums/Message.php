<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */

final class Message extends Enum
{
    const STORED = "Datos registrado correctamente!";
    const DELETED = "Registro eliminado!";
    const UPDATED = "Registros actualizados correctamente!";
    const ASSIGN = "Usuario asignado correctamente!";
}
