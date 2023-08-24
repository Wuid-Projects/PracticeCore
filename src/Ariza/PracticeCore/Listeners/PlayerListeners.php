<?php

namespace Ariza\PracticeCore\Listeners;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCreationEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\player\GameMode;
use pocketmine\item\VanillaItems;
use pocketmine\utils\TextFormat as C;
use Ariza\PracticeCore\Classes\ArizaPlayer;

class PlayerListeners implements Listener {

    public function onCreate(PlayerCreationEvent $event) {
        $event->setPlayerClass(ArizaPlayer::class);
    }

    public function onJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        $player->sendMessage(C::GREEN . "Welcome to the server!");
        $player->getInventory()->clearAll();
        $player->getArmorInventory()->clearAll();
        $player->setGamemode(GameMode::ADVENTURE());
        $compass = VanillaItems::COMPASS();
        $compass->setCustomName(C::GREEN . "Select Gamemode!\n" . C::GRAY . "Right Click for PC\nClick the air for Mobile");
        $player->getInventory()->setItem(0, $compass);
        $player->getInventory()->setHeldItemIndex(0);
    }
}