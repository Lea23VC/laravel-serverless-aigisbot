<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PS2()
 * @method static static PSP()
 * @method static static N3DS()
 * @method static static GBA()
 * @method static static GBC()
 * @method static static GB()
 * @method static static NES()
 * @method static static SNES()
 * @method static static N64()
 * @method static static GAMECUBE()
 * @method static static DS()
 * @method static static PSX()
 * @method static static DREAMCAST()
 * @method static static WII()
 * @method static static SWITCH()
 * @method static static GENESIS()
 */

final class ConsoleEnum extends Enum
{
    const PS2 = 'ps2';
    const PSP = 'psp';
    const N3DS = '3ds';
    const GBA = 'gba';
    const GBC = 'gbc';
    const GB = 'gb';
    const NES = 'nes';
    const SNES = 'snes';
    const N64 = '64';
    const GAMECUBE = 'gamecube';
    const DS = 'ds';
    const PSX = 'psx';
    const DREAMCAST = 'dreamcast';
    const WII = 'wii';
    const SWITCH = 'switch';
    const GENESIS = 'genesis';
}
