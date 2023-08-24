<?php

namespace Ariza\PracticeCore\Listeners;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCreationEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\TextFormat as C;
use Ariza\PracticeCore\Classes\ArizaPlayer;

class PlayerListeners implements Listener {

    public function onCreate(PlayerCreationEvent $event) {
        $event->setPlayerClass(ArizaPlayer::class);
    }

    public function onJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        $player->sendMessage(C::GREEN . "Welcome to the server!");
    }
}