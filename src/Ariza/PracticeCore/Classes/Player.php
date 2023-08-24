<?php

namespace Ariza\PracticeCore\Classes;

use pocketmine\entity\Location;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\player\PlayerInfo;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\utils\TextFormat as C;
use pocketmine\network\mcpe\NetworkSession;


class ArizaPlayer extends Player {

    public function __construct(Server $server, NetworkSession $session, PlayerInfo $playerInfo, bool $authenticated, ?Location $spawnLocation = null, ?CompoundTag $namedTag = null) {
        parent::__construct($server, $session, $playerInfo, $authenticated, $spawnLocation, $namedTag);
    }
}