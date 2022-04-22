<?php
declare(strict_types = 1);

namespace BeeAZ\OneBlockScore\listeners;

use BeeAZ\OneBlockScore\Main;
use Ifera\ScoreHud\event\PlayerTagUpdateEvent;
use Ifera\ScoreHud\scoreboard\ScoreTag;
use lenlenlL6\oneblock\event\TierChangeEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\Server;

use function is_null;
use function strval;

class EventListener implements Listener{

    /** @var Main */
    private $plugin;

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }

    public function onTierChange(TierChangeEvent $event){
        $name = $event->getPlayer()->getName();

        if(is_null($name)){
            return;
        }
        if($this->plugin->getServer()->getPlayerByPrefix($name) !== null){
        $player = $this->plugin->getServer()->getPlayerByPrefix($name);

        if($player instanceof Player && $player->isOnline()){
            (new PlayerTagUpdateEvent($player, new ScoreTag("oneblockscore.tier", strval($event->getTier()))))->call();
        }
    }
}
}