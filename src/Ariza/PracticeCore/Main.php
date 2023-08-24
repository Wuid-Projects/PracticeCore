<?php

declare(strict_types=1);

namespace Ariza\PracticeCore;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase {

    public function onLoad(): void {
        $this->getLogger()->info(C::GREEN . "Loading...");
    }

    public function onEnable(): void {
        $this->getLogger()->info(C::GREEN . "Enabled!");
    }

    public function onDisable(): void {
        $this->getLogger()->info(C::RED . "Disabled!");
    }
}