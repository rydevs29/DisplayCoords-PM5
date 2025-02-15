<?php
declare(strict_types=1);

namespace Fred;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\network\mcpe\protocol\GameRulesChangedPacket;
use pocketmine\network\mcpe\protocol\types\BoolGameRule;

class CoordinateListener implements Listener {

    public function onJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        $pk = new GameRulesChangedPacket();
        $pk->gameRules = ["showcoordinates" => new BoolGameRule(true, false)];
        $player->getNetworkSession()->sendDataPacket($pk);
    }
}